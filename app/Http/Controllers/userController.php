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
    
}
