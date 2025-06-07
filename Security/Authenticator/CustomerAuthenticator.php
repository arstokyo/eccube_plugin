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

use Eccube\Repository\CustomerRepository;
use Plugin\AceClient43\Bridge\CustomerBridge;
use Plugin\AceClient43\Repository\ConfigRepository;
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

class CustomerAuthenticator extends AbstractAuthenticator implements AuthenticationEntryPointInterface, InteractiveAuthenticatorInterface
{
    public const RESET_PASSWORD_CUSTOMER = 'ace_client.reset_password_customer';
    private FormLoginAuthenticator $innerAuthenticator;
    private ConfigRepository $configRepository;
    private CustomerRepository $customerRepository;
    private CustomerBridge $customerBridge;
    private LoggerInterface $logger;
    private RouterInterface $router;

    public function __construct(FormLoginAuthenticator $innerAuthenticator, RouterInterface $router, ConfigRepository $configRepository, CustomerRepository $customerRepository, CustomerBridge $customerBridge, LoggerInterface $logger)
    {
        $this->innerAuthenticator = $innerAuthenticator;
        $this->router = $router;
        $this->configRepository = $configRepository;
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
        $aceConfig = $this->configRepository->get();
        $customer = $this->customerRepository->findOneBy(['email' => $email]);

        try {
            if ($aceConfig->isRedirectToForgotCustomerIfExistsOnAce() && null === $customer) {
                if ($this->customerBridge->has($email)) {
                    $request->getSession()->set(CustomerAuthenticator::RESET_PASSWORD_CUSTOMER, $email);
                    throw new UserNotFoundIsExistingOnAce();
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
        return $this->innerAuthenticator->onAuthenticationSuccess($request, $token, $firewallName);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        if ($exception instanceof UserNotFoundIsExistingOnAce) {
            $aceConfig = $this->configRepository->get();
            $forGotPath = $aceConfig->hasForgotCustomerPath() ? $aceConfig->getForgotCustomerPath() : 'forgot';

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
}
