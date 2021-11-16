<?php

namespace ContainerBJ9T3h7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_7S_7XLuService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.7S.7XLu' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.7S.7XLu'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'maillerService' => ['privates', 'App\\Service\\MailerService', 'getMailerServiceService', true],
            'newsletterRepository' => ['privates', 'App\\Repository\\NewsLetterRepository', 'getNewsLetterRepositoryService', true],
        ], [
            'maillerService' => 'App\\Service\\MailerService',
            'newsletterRepository' => 'App\\Repository\\NewsLetterRepository',
        ]);
    }
}
