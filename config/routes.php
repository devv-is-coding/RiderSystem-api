<?php
declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use App\Middleware\TokenAuthMiddleware;

$routes->scope('/api', ['prefix' => 'Api'], function (RouteBuilder $builder) {
    $builder->setExtensions(['json']);

    // 🔓 Public routes (no token middleware)
    $builder->connect('/login', [
        'controller' => 'Auth',
        'action'     => 'login',
        '_namespace' => 'App\Controller\Api',
    ]);
    $builder->connect('/register', [
        'controller' => 'Auth',
        'action'     => 'register',
        '_namespace' => 'App\Controller\Api',
    ]);
});

// 🔐 Protected routes (with token middleware)
$routes->scope('/api', ['prefix' => 'Api'], function (RouteBuilder $builder) {
    $builder->setExtensions(['json']);

    $builder->registerMiddleware('tokenAuth', new TokenAuthMiddleware());
    $builder->applyMiddleware('tokenAuth');

    $builder->connect('/profile', [
        'controller' => 'Auth',
        'action'     => 'profile',
        '_namespace' => 'App\Controller\Api',
    ]);
    $builder->connect('/logout', [
        'controller' => 'Auth',
        'action'     => 'logout',
        '_namespace' => 'App\Controller\Api',
    ]);

    $builder->fallbacks(DashedRoute::class);
});
