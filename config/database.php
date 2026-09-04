<?php

class Database
{
    public static function connect()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "mvc_demo";

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}