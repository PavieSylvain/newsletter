<?php

namespace ContainerBJ9T3h7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_P6R5cY4Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.P6R5cY4' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.P6R5cY4'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'mailjetSerice' => ['privates', 'App\\Service\\MailjetService', 'getMailjetServiceService', true],
            'userRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'mailjetSerice' => 'App\\Service\\MailjetService',
            'userRepository' => 'App\\Repository\\UserRepository',
        ]);
    }
}
