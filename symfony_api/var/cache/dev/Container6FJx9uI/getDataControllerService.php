<?php

namespace Container6FJx9uI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDataControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\DataController' shared autowired service.
     *
     * @return \App\Controller\DataController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/DataController.php';

        $container->services['App\\Controller\\DataController'] = $instance = new \App\Controller\DataController();

        $instance->setContainer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'router' => ['services', 'router', 'getRouterService', false],
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'http_kernel' => ['services', 'http_kernel', 'getHttpKernelService', false],
            'parameter_bag' => ['privates', 'parameter_bag', 'getParameterBagService', false],
        ], [
            'router' => '?',
            'request_stack' => '?',
            'http_kernel' => '?',
            'parameter_bag' => '?',
        ]))->withContext('App\\Controller\\DataController', $container));

        return $instance;
    }
}
