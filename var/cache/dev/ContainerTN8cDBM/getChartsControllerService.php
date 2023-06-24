<?php

namespace ContainerTN8cDBM;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getChartsControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ChartsController' shared autowired service.
     *
     * @return \App\Controller\ChartsController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/ChartsController.php';

        $container->services['App\\Controller\\ChartsController'] = $instance = new \App\Controller\ChartsController();

        $instance->setContainer(($container->privates['.service_locator.CshazM0'] ?? $container->load('get_ServiceLocator_CshazM0Service'))->withContext('App\\Controller\\ChartsController', $container));

        return $instance;
    }
}