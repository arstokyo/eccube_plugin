<?php

namespace ContainerJeLjmue;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_EncoderFactory_GenericService extends Eccube_KernelProdContainer
{
    /*
     * Gets the private 'security.encoder_factory.generic' shared service.
     *
     * @return \Symfony\Component\Security\Core\Encoder\EncoderFactory
     *
     * @deprecated Since symfony/security-bundle 5.3: The "security.encoder_factory.generic" service is deprecated, use "security.password_hasher_factory" instead.
     */
    public static function do($container, $lazyLoad = true)
    {
        trigger_deprecation('symfony/security-bundle', '5.3', 'The "security.encoder_factory.generic" service is deprecated, use "security.password_hasher_factory" instead.');

        $a = ($container->privates['Eccube\\Security\\Core\\Encoder\\PasswordEncoder'] ?? $container->load('getPasswordEncoderService'));

        return $container->privates['security.encoder_factory.generic'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(['Eccube\\Entity\\Member' => $a, 'Eccube\\Entity\\Customer' => $a]);
    }
}
