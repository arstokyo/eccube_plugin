<?php

namespace ContainerVTFAYMC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authenticator_FormLogin_CustomerService extends Eccube_KernelInstallContainer
{
    /*
     * Gets the private 'security.authenticator.form_login.customer' shared service.
     *
     * @return \Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/AuthenticatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/AbstractAuthenticator.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/EntryPoint/AuthenticationEntryPointInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/InteractiveAuthenticatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/AbstractLoginFormAuthenticator.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/FormLoginAuthenticator.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticationSuccessHandlerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/CustomAuthenticationSuccessHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Util/TargetPathTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/DefaultAuthenticationSuccessHandler.php';
        include_once \dirname(__DIR__, 4).'/src/Eccube/Security/Http/Authentication/EccubeAuthenticationSuccessHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticationFailureHandlerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/CustomAuthenticationFailureHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/DefaultAuthenticationFailureHandler.php';
        include_once \dirname(__DIR__, 4).'/src/Eccube/Security/Http/Authentication/EccubeAuthenticationFailureHandler.php';

        $a = ($container->services['http_kernel'] ?? $container->getHttpKernelService());

        if (isset($container->privates['security.authenticator.form_login.customer'])) {
            return $container->privates['security.authenticator.form_login.customer'];
        }
        $b = ($container->privates['security.http_utils'] ?? $container->load('getSecurity_HttpUtilsService'));
        $c = ($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService());

        return $container->privates['security.authenticator.form_login.customer'] = new \Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator($b, ($container->privates['Eccube\\Security\\Core\\User\\CustomerProvider'] ?? $container->load('getCustomerProviderService')), new \Symfony\Component\Security\Http\Authentication\CustomAuthenticationSuccessHandler(new \Eccube\Security\Http\Authentication\EccubeAuthenticationSuccessHandler($b, [], $c), ['login_path' => 'mypage_login', 'default_target_path' => 'homepage', 'always_use_default_target_path' => false, 'target_path_parameter' => '_target_path', 'use_referer' => false], 'customer'), new \Symfony\Component\Security\Http\Authentication\CustomAuthenticationFailureHandler(new \Eccube\Security\Http\Authentication\EccubeAuthenticationFailureHandler($a, $b, [], $c), ['login_path' => 'mypage_login', 'failure_path' => NULL, 'failure_forward' => false, 'failure_path_parameter' => '_failure_path']), ['enable_csrf' => true, 'check_path' => 'mypage_login', 'login_path' => 'mypage_login', 'username_parameter' => 'login_email', 'password_parameter' => 'login_pass', 'use_forward' => false, 'require_previous_session' => false, 'csrf_parameter' => '_csrf_token', 'csrf_token_id' => 'authenticate', 'post_only' => true, 'form_only' => false]);
    }
}
