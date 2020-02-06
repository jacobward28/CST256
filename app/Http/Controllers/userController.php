<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Services\Data\dataservice;
use App\Services\Data\userService;

class userController extends Controller
{
public function doDeleteUser()
{
    session_start();
$userService = new userService();
$delete = $userService->deleteUser();

return view('home');
}
    

public function DoUpdateUser()
{
    session_start();
    $userService = new userService();
    $update = $userService->updateUser();
    
    return view('home');
}

public function doDisplayUser()
{
    session_start();
    $userService = new userService();
    $userArray = $userService->ViewUsers();
    return view('displayUser')->with('userArray', $userArray);
}

}
