<?php

namespace ContainerBJ9T3h7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMailjetServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Service\MailjetService' shared autowired service.
     *
     * @return \App\Service\MailjetService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/MailjetService.php';

        return $container->privates['App\\Service\\MailjetService'] = new \App\Service\MailjetService(($container->privates['parameter_bag'] ?? ($container->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($container))), ($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()), ($container->privates['.debug.http_client'] ?? $container->get_Debug_HttpClientService()));
    }
}
