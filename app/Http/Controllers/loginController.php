<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Services\Business\securityService;
use App\Services\Data\dataservice;

class loginController extends Controller
{
    /**
     * This function is used to manage logins for the app
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function log(Request $request) {

       $user = new userModel($request->input('username'), $request->input('password'), null, null, null, null, $request->input('role'));
       
       $securityService = new securityService();
       
       $result = $securityService->login($user);
       
       $role = $result["role"];
       echo $role;
       echo $result["ID"];
       session_start();
       $_SESSION["role"] = $role;
       $_SESSION["id"]=$result["ID"];
       $_SESSION["username"] =  $request->input('username');
      
       if($_SESSION["role"] == 3)
       {
           return view('suspended');
       }
       else
       {
       return view('home');
    }
                        
    }
    
    public function onLogout(){
        session_start();
        unset($_SESSION["role"]);
        unset($_SESSION["id"]);
        unset($_SESSION["username"]);
        return view('login');
    }
       
        
}


