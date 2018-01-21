<?php
define('ROOT_PATH', __DIR__ . '/../');
$centerIp = getenv('CENTER_IP');
$centerPwd = getenv('CENTER_PWD');
$centerPort = getenv('CENTER_PORT');
$center = getenv('CENTER');;
$s = file_get_contents(ROOT_PATH . '/.env.example');
$s = str_replace(
    ['{CENTER_HOST_VALUE}', '{CENTER_PORT_VALUE}', '{CENTER_PWD_VALUE}'],
    [$centerIp, $centerPort, $centerPwd],
    $s
);
$rs = file_put_contents(ROOT_PATH . '/.env', $s);
var_dump($s, ROOT_PATH . '/.env', $s, $rs);