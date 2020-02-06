<?php

namespace App\Services\Utility;


class databaseConnector
{
    /**
     * set variables equal to database information
     */
    private $dbservername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "root";
    private $dbname = "256_milestone";
    
    /**
     *  function to connect to the database using set variables that can be called in other files
     */
    function connect() {
        $connection = mysqli_connect($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);
        
        if ($connection->connect_error) {
            echo "Connection failed " .$connection->connect_error . "<br>";
        }
        else {
            return $connection;
        }
    }
}