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
       
       
       session_start();
       $_SESSION["role"] = $user->getRole();
       $_SESSION["username"] = $request->input('username');


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


