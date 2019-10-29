<?php
    function getConnection()
    {
        $host = 'mysql';
        $db_name = 'asistencia';
        $username = 'root';
        $password = '12345678';
        $conn= new mysqli($host, $username, $password, $db_name);
        if ($conn->connect_error) {
            $conn= null;
        }
        return $conn;
    }
