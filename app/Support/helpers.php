<?php
function anyRoute(Laravel\Lumen\Routing\Router $router, $methods, $uri, $action)
{
    foreach ($methods as $method) {
        $router->{$method}($uri, $action);
    }
}