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

       $user = new userModel($request->input('username'), $request->input('password'), null, null, null, null, null);
       
       $securityService = new securityService();
       
       $result = $securityService->login($user);
       
       $role = $result["role"];
       
       $_SESSION["role"] = $role;
       $_SESSION["username"] = $result["username"];
       $_SESSION["userid"] = $result["ID"];
      
       if($_SESSION["role"] == 3)
       {
           return view('suspended');
       }
       else
       {
       
       return view('home');
    }
                        
}
       
        
    }


