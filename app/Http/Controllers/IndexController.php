<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PersistModel\Service;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 注册服务
     * service_name
     * server_location  ip:port
     * health_url 健康回调地址
     * data  自定义信息
     * auth md5
     */
    public function register(Request $request)
    {
        $service = Service::firstOrNew($request->get('service_name'));
        $service->setServer(
            $request->get('server_location'),
            $request->get('health_url'),
            json_decode($request->get('data'), true),
            Service::ACTIVE
        );
        $service->save();
    }


    /**
     * 查询服务对应的可用服务器
     * service_name
     */
    public function service($serviceName)
    {
        $base = $this->baseService();
        if (isset($base[$serviceName])) {
            return $base[$serviceName];
        }
        return Service::firstOrNew($serviceName)
            ->getServers(Service::ACTIVE);
    }

    /**
     * 查询所有服务
     * service_name
     */
    public function allServices()
    {
        $services = $this->baseService();
        Service::all()->map(function (Service $s, $key) use (&$services) {
            $services[$key] = $s->getServers(Service::ACTIVE);
        });

        return $services;
    }

    public function baseService()
    {
        $s = [];
        $location = '47.104.22.217:3306';
        $s['db'] = [
            $location => [
                'serverLocation' => $location,
                'healthUrl' => '',
                'data' => [
                    'DB_PORT' => 3306,
                    'DB_HOST' => '47.104.22.217',
                    'DB_USERNAME' => 'root',
                    'DB_PASSWORD' => 'anneng',
                ],
                'status' => Service::ACTIVE
            ]
        ];
        $location = env('REDIS_HOST') . ':' . env('REDIS_PORT');
        $s['redis'] = [
            $location => [
                'serverLocation' => $location,
                'healthUrl' => '',
                'data' => [
                    'REDIS_HOST' => env('REDIS_HOST'),
                    'REDIS_PASSWORD' => env('REDIS_PASSWORD'),
                    'REDIS_PORT' => env('REDIS_PORT'),
                ],
                'status' => Service::ACTIVE
            ]
        ];
        return $s;

    }
}
