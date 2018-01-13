<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->post('/services/register','IndexController@register');
$router->get('/services','IndexController@allServices');
$router->get('/services/{serviceName}','IndexController@service');
$router->get('/',function (){
    return 'lumen in docker';
});
$router->get('/info',function (){
    phpinfo();
    return '';
});
//define('LOG_FILE',base_path('storage/logs/log_file.log'));
//define('LOG_ERROR',base_path('storage/logs/log_error.log'));
//
// function log_file ($message){
//  file_put_contents(LOG_FILE,date('Y-m-d H:i:s')." error {$message}\n",FILE_APPEND);
//};
//function log_error($message){
//    error_log(date('Y-m-d H:i:s')." error {$message}\n",3,LOG_ERROR);
//};
//$router->get('/log_file',function (){
//    for($i=0;$i<1000;$i++){
//        log_file('log_file:'.rand());
//    }
//    return 'ok';
//});
//$router->get('/log_error',function (){
//    for($i=0;$i<1000;$i++){
//        log_error('log_error:'.rand());
//    }
//    return 'ok';
//});