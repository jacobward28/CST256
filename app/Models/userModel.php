<?php

namespace App\Models;

class userModel {
    
    private $id;
    private $username;
    private $password;
    
    function __construct($id, $username, $password) {
     $this->id = $id;
     $this->username = $username;
     $this->password = $password;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getusername()
    {
        return $this->username;
    }
    
    public function getpassword()
    {
        return $this->password;
    }
}