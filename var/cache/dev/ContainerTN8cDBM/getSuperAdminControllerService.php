<?php

namespace ContainerTN8cDBM;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSuperAdminControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\SuperAdminController' shared autowired service.
     *
     * @return \App\Controller\SuperAdminController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/SuperAdminController.php';

        $container->services['App\\Controller\\SuperAdminController'] = $instance = new \App\Controller\SuperAdminController();

        $instance->setContainer(($container->privates['.service_locator.CshazM0'] ?? $container->load('get_ServiceLocator_CshazM0Service'))->withContext('App\\Controller\\SuperAdminController', $container));

        return $instance;
    }
}
