<?php

namespace App\Services\Business;

use App\Models\userModel;
use App\http\controllers\databaseController;
use App\Services\Data\dataService;

class securityService {
    
    public function login(userModel $user)
    {
        $db = new databaseController();
        $connect = $db->connect();
        $connect = null;
        $dao = new dataService($connect);
        $result =$dao->log($user);
        return $result;
    }
}