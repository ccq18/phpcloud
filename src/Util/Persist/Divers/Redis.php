<?php
namespace Util\Persist\Divers;

trait Redis
{
    public static function redis()
    {
        return app('redis.connection');
    }

    /**
     * @param $key
     * @return null|static
     */
    public static function first($key)
    {
        $v = static::redis()->hget(static::getPersistKey(), $key);
        if (empty($v)) {
            return null;
        }

        return static::getObj($key, $v, true);
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public static function all()
    {
        $rs = collect();

        $data = static::redis()->hgetall(static::getPersistKey());
        if (empty($data)) {
            return $rs;
        }
        foreach ($data as $k => $v) {
            $rs->push(static::getObj($k, $v, true));
        }

        return $rs;
    }

    /**
     * @throws \Exception
     */
    public function save()
    {
        if (empty($this->_key)) {
            throw new \Exception('key not exist');
        }
        if (empty(static::$_table)) {
            throw new \Exception('table not exist');
        }
        //若数据无变化则不存储
        if (json_encode($this->attributes) == json_encode($this->_baseAttributes)) {
            return;
        }
        static::redis()->hset($this->getPersistKey(), $this->_key, json_encode($this->attributes));
        $this->_baseAttributes = $this->attributes;
    }


    public static function saveAll()
    {
        foreach (Persist::$_objs as $v) {
            $v->save();
        }
    }

}