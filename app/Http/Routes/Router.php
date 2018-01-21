<?php

namespace App\Http\Routes;

class Router
{
    function handle($router)
    {
        $router->group(['middleware' => 'check_pwd'], function () use ($router) {
            $router->post('/services/register', 'IndexController@register');
            $router->get('/services', 'IndexController@allServices');
            $router->get('/services/{serviceName}', 'IndexController@service');
            $router->get('/', function () {
                return 'lumen in docker:' . __DIR__;
            });
            $router->get('/info', function () {
                phpinfo();
                return '';
            });
        });
    }

}