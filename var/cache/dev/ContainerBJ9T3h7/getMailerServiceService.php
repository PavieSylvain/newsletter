<?php

namespace ContainerBJ9T3h7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMailerServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Service\MailerService' shared autowired service.
     *
     * @return \App\Service\MailerService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/MailerService.php';

        return $container->privates['App\\Service\\MailerService'] = new \App\Service\MailerService(($container->privates['parameter_bag'] ?? ($container->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($container))));
    }
}
