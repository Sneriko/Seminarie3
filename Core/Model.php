<?php

namespace Core;


/**
 * Base model
 *
 * PHP version 5.4
 */
abstract class Model
{

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        $servername = "localhost";
        $dBUsername = "Sneriko";
        $dBPassword = "Sneriko123";
        $dBName = "seminarie3";

        $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

        if (!$conn) {
            die("connection failed: ".mysqli_connect_error());
        }
        return $conn;
    }
}
