<?php

namespace ContainerXtD2xwt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getBoControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\BoController' shared autowired service.
     *
     * @return \App\Controller\BoController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/BoController.php';

        $container->services['App\\Controller\\BoController'] = $instance = new \App\Controller\BoController();

        $instance->setContainer(($container->privates['.service_locator.W9y3dzm'] ?? $container->load('get_ServiceLocator_W9y3dzmService'))->withContext('App\\Controller\\BoController', $container));

        return $instance;
    }
}
