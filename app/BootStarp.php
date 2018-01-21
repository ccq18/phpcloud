<?php

namespace App;

use
    Illuminate\Contracts\Debug\ExceptionHandler;
use App\Exceptions\Handler;
use Illuminate\Redis\RedisServiceProvider;
use \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use App\Http\Middleware\CheckPwd;
use \App\Http\Routes\Router;

class BootStarp
{
    /**
     * @param \Laravel\Lumen\Application $app
     * @return \Laravel\Lumen\Application
     */
    static function handle($app)
    {
        /*
        |--------------------------------------------------------------------------
        | Register Container Bindings
        |--------------------------------------------------------------------------
        |
        | Now we will register a few bindings in the service container. We will
        | register the exception handler and the console kernel. You may add
        | your own bindings here if you like or you can make another file.
        |
        */

        $app->singleton(
            ExceptionHandler::class,
            Handler::class
        );

        $app->singleton(
            \Illuminate\Contracts\Console\Kernel::class,
            \App\Console\Kernel::class
        );

        /*
        |--------------------------------------------------------------------------
        | Register Middleware
        |--------------------------------------------------------------------------
        |
        | Next, we will register the middleware with the application. These can
        | be global middleware that run before and after each request into a
        | route or middleware that'll be assigned to some specific routes.
        |
        */

// $app->middleware([
//    App\Http\Middleware\ExampleMiddleware::class
// ]);

// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

        /*
        |--------------------------------------------------------------------------
        | Register Service Providers
        |--------------------------------------------------------------------------
        |
        | Here we will register all of the application's service providers which
        | are used to bind services into the container. Service providers are
        | totally optional, so you are not required to uncomment this line.
        |
        */

// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);
        $app->register(RedisServiceProvider::class);

        if (!app()->environment('production')) {
            $app->register(IdeHelperServiceProvider::class);
        }
        $app->configure('database');

        /*
        |--------------------------------------------------------------------------
        | Load The Application Routes
        |--------------------------------------------------------------------------
        |
        | Next we will include the routes file so that they can all be added to
        | the application. This will provide all of the URLs the application
        | can respond to, as well as the controllers that may handle them.
        |
        */
        $app->routeMiddleware([
            'check_pwd' => CheckPwd::class
        ]);
        $app->router->group([
            'namespace' => 'App\Http\Controllers',
        ], function ($router) {
            (new  Router())->handle($router);
        });
        return $app;
    }
}