<?php
define('ROOT_PATH',__DIR__.'/../');
$centerIp = getenv('CENTER_IP');
$centerPwd = getenv('CENTER_PWD');
$centerPort = getenv('CENTER_PORT');
$center= getenv('CENTER');
;



$opt = getopt('', ['center_ip:','center_port:','center_pwd:','hostip:']);
$s = file_get_contents(ROOT_PATH.'/.env.example');
$s = str_replace(['{CENTER_HOST_VALUE}','{CENTER_PORT_VALUE}','{CENTER_PWD_VALUE}'],[$opt['center_ip']?:"",$opt['center_port']?:"",$opt['center_pwd']?:""],$s);
$rs = file_put_contents(ROOT_PATH.'/.env',$s);
var_dump($s,ROOT_PATH.'/.env',$s,$rs);