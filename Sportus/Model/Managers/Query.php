<?php

/**
 * Created by PhpStorm.
 * User: Wassim
 * Date: 21/01/2017
 * Time: 18:24
 */
include_once("Model/Managers/ConnectionManager.php");

class Query extends ConnectionManager
{
    public static function run($query)
    {
        $result = ConnectionManager::getInstance()->getConnection()->query($query);
        if (mysqli_error(ConnectionManager::getInstance()->getConnection())) {
            echo "<br>ERROR: " . mysqli_error(ConnectionManager::getInstance()->getConnection())."<br>";
        }
        return $result;
    }
}