<?php

namespace App\Http\Controllers;
use App\Services\Data\userService;
use App\Models\userModel;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function updateUser(Request $request){
        $user = new userModel($request->input('username'), $request->input('password'), $request->input("firstname"), $request->input("lastname"),
            $request->input("email"), $request->input("phone"), $request->input("role"));
        
        $userService = new userService();
        $result = $userService->updateUser($user);
        return view("profile");
    }
public function doDeleteUser()
{
    session_start();
$userService = new userService();
$delete = $userService->deleteUser();

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
