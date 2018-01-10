<?php

namespace Util\Persist;


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redis;
use Util\Fluent;


abstract class Persist extends Fluent
{
    use Divers\Redis;
    /**
     * @var Persist[]
     */
    static $_objs = [];
    static $_table = null;
    protected $_key = null;
    protected $_baseAttributes = null;
    static $_prefix = 'persist';


    public function __construct($key, $attributes = [], $persisted = false, $autoSave = true)
    {

        $this->init($attributes);
        $this->_key = $key;
        if ($persisted) {
            $this->_baseAttributes = $attributes;
        }
        if ($autoSave) {
            static::$_objs[] = $this;
        }
    }

    protected function init($attributes)
    {
        $structure = $this->structure();
        $this->attributes = array_merge($structure, $attributes);
    }

    public function only()
    {
        $structure = $this->structure();
        if (!empty($structure)) {
            $this->attributes = Arr::only($this->attributes, array_keys($structure));
        }
    }

    //返回基本表结构 方便重构
    public function structure()
    {
        return [];
    }

    public static function firstOrNew($key)
    {
        $v = static::first($key);
        if (empty($v)) {
            $v = new static($key);
        }

        return $v;
    }

    public static function getObj($k, $data, $persisted)
    {
        return new static($k, json_decode($data, true), $persisted);
    }

    public static function getPersistKey()
    {
        return static::$_prefix . ':' . static::$_table;
    }

    public function data($data)
    {
        $this->attributes = $data;
    }

    public function merge($data)
    {
        $this->attributes = array_merge($this->attributes, $data);
    }



}