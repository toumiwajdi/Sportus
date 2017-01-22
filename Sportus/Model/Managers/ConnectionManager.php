<?php

/**
 * Created by PhpStorm.
 * User: Wassim
 * Date: 21/01/2017
 * Time: 18:00
 */
class ConnectionManager
{
    private $connection;
    private static $instance;
    //
    private $host = "localhost";
    private $username = "root";
    private $pwd = "";
    private $database = "sportus";

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->pwd, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}