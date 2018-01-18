<?php
define('ROOT_PATH',__DIR__.'/../');
$opt = getopt('', ['host:','port:','pwd:']);
$s = file_get_contents(ROOT_PATH.'/.env.example');
$s = str_replace(['{CENTER_HOST_VALUE}','{CENTER_PORT_VALUE}','{CENTER_PWD_VALUE}'],[$opt['host']?:"",$opt['port']?:"",$opt['pwd']?:""],$s);
file_put_contents(ROOT_PATH.'/.env',$s);