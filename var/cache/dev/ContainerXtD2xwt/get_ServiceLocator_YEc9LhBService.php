<?php

namespace ContainerXtD2xwt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_YEc9LhBService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.YEc9LhB' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.YEc9LhB'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'maillerService' => ['privates', 'App\\Service\\MailerService', 'getMailerServiceService', true],
        ], [
            'maillerService' => 'App\\Service\\MailerService',
        ]);
    }
}