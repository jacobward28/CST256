<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Services\Business\securityService;

class loginController extends Controller
{
    /**
     * This function is used to manage logins for the app
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function log(Request $request) {
       $user = new userModel($request->input('username'), $request->input('password'), null, null, null, null);
       
       $securityService = new securityService();
       
       $result = $securityService->login($user);
       
       return view('home');
                        
        }
        
        public function onLogout() {
            
            session_start();
            
            session_unset();
            session_destroy();
            
             //echo $_SESSION['userid']. " " . $SESSION['username'];
            
           return view('login');
        }
        
    }


