<?php

namespace PersistModel;


use Util\Persist\Persist;

/**
 * Class User
 * @package PersistModel
 * @property $password
 */
class User extends Persist
{
    static $_table='user';

}