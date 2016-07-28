<?php

/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 19.07.2016
 * Time: 0:54
 */
class DB
{

    public static function getConnection(){
        $paramsPath=ROOT.'/config/db_params.php';
        $params=include ($paramsPath);

        $db=new PDO("mysql:host={$params['host']};dbname={$params['dbname']}",$params['user'],$params['password']);
        return $db;
    }
}