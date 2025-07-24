<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Security\Authenticator;

use Eccube\Entity\Customer;
use Eccube\Repository\CustomerRepository;
use Plugin\AceClient43\Bridge\CustomerBridge;
use Plugin\AceClient43\Service\AceConfigService;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator;
use Symfony\Component\Security\Http\Authenticator\InteractiveAuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

/**
 * 顧客認証用のAuthenticator
 *
 * 通販Aceの顧客情報を参照して、ログイン処理を行う。
 * 顧客情報が存在しない場合は、通販Aceに顧客情報が存在するか確認し、存在する場合はパスワードリセット画面へリダイレクトする。
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CustomerAuthenticator extends AbstractAuthenticator implements AuthenticationEntryPointInterface, InteractiveAuthenticatorInterface
{
    public const RESET_PASSWORD_CUSTOMER = 'ace_client.reset_password_customer';

    protected FormLoginAuthenticator $innerAuthenticator;

    protected AceConfigService $configService;

    private CustomerRepository $customerRepository;

    protected CustomerBridge $customerBridge;

    protected LoggerInterface $logger;

    protected RouterInterface $router;

    public function __construct(
        FormLoginAuthenticator $innerAuthenticator,
        RouterInterface $router,
        AceConfigService $configService,
        CustomerRepository $customerRepository,
        CustomerBridge $customerBridge,
        LoggerInterface $logger,
    ) {
        $this->innerAuthenticator = $innerAuthenticator;
        $this->router = $router;
        $this->configService = $configService;
        $this->customerRepository = $customerRepository;
        $this->customerBridge = $customerBridge;
        $this->logger = $logger;
    }

    public function supports(Request $request): ?bool
    {
        return $this->innerAuthenticator->supports($request);
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->get('login_email') ?: $request->get('email') ?: $request->get('username');
        $aceConfig = $this->configService->getConfig();
        $customer = $this->customerRepository->findOneBy(['email' => $email]);

        try {
            if ($aceConfig->isRedirectForgot() && null === $customer) {
                if ($this->customerBridge->has($email)) {
                    $request->getSession()->set(CustomerAuthenticator::RESET_PASSWORD_CUSTOMER, $email);
                    throw new UserNotFoundIsExistingOnAce();
                }
            }

            if (null !== $customer) {
                if (!$customer instanceof Customer) {
                    throw new AuthenticationException('ユーザー情報が不正です。');
                }

                if (!$customer->hasAceCustomerId()) {
                    $this->logger->warning('通販Aceの顧客IDが存在しません。', [
                        'customer' => $customer,
                        'email' => $email,
                    ]);
                    throw new AuthenticationException('顧客情報が存在しません。');
                }
            }
        } catch (\Throwable $exception) {
            if ($exception instanceof UserNotFoundIsExistingOnAce) {
                throw $exception;
            }

            $this->logger->warning('通販Aceから顧客情報の取得に失敗しました。', [
                'exception' => $exception,
                'email' => $request->get('email'),
            ]);
        }

        return $this->innerAuthenticator->authenticate($request);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $this->syncCustomer($token);

        return $this->innerAuthenticator->onAuthenticationSuccess($request, $token, $firewallName);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        if ($exception instanceof UserNotFoundIsExistingOnAce) {
            $aceConfig = $this->configService->getConfig();
            $forGotPath = $aceConfig->hasForgotCustomerPath() ? $aceConfig->getForgotPath() : 'forgot';

            return new RedirectResponse($this->router->generate($forGotPath));
        }

        return $this->innerAuthenticator->onAuthenticationFailure($request, $exception);
    }

    public function start(Request $request, ?AuthenticationException $authException = null)
    {
        return $this->innerAuthenticator->start($request, $authException);
    }

    public function isInteractive(): bool
    {
        return $this->innerAuthenticator->isInteractive();
    }

    private function syncCustomer(TokenInterface $token): void
    {
        $customer = $token->getUser();

        // we expect Customer entity
        if (!$customer instanceof Customer) {
            return;
        }

        try {
            $this->customerBridge->syncCustomerFromAce($customer);
        } catch (\Throwable $e) {
            $this->logger->error('顧客情報の更新に失敗しました。', [
                'exception' => $e,
                'customer' => $customer,
            ]);

            throw new \RuntimeException('顧客情報の更新に失敗しました。', 0, $e);
        }
    }
}
