<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

class DatabaseCon {
    var $host = 'localhost';
    var $user = 'root';
    var $pass = 'root';
    var $db = 'magic_card_list';
    var $myconn;
    
    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            die('Unale to connect to database.');
        }
        else {
            $this->myconn = $con;
            echo 'Connection Succesful';
        }
        return $this->myconn;
    }
    function close() {
        mysqli_close($this->myconn);
        echo 'Connection closed';
    }
}