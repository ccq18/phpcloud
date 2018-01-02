<?php

namespace PersistModel;


use Util\Persist\Persist;

/**
 * Class Url
 * @package PersistModel
 * @property $servers
 */
class Service extends Persist
{
    static $_table = 'service';

    const ACTIVE = 1;
    const BUSY = 2;
    const INVALID = 3;

    public function getServers($status = null)
    {
        if ($status == null) {
            return $this->servers;
        } else {
            return collect($this->servers)->filter(function ($v) use ($status) {
                return $v['status'] == $status;
            })->values();
        }


    }

    /**
     * @param $serverLocation
     * @param $healthUrl
     * @param $data
     * @param $status
     */
    public function setServer($serverLocation, $healthUrl, $data, $status)
    {

        $this->servers[$serverLocation] = ['serverLocation' => $serverLocation, 'healthUrl' => $healthUrl, 'data' => $data, 'status' => $status];
    }

    public function setStatus($serverLocation, $status)
    {
        if (isset($this->servers[$serverLocation])) {
            $this->servers[$serverLocation]['status'] = $status;
        }

    }

    public function structure()
    {
        return [
            'servers' => [],
            'key' => $this->_key,
        ];
    }
}