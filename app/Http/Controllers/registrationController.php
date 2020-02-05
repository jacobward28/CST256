<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Services\Data\dataservice;

class registrationController extends Controller
{
    /**
     * create function to manage registration
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function register(Request $request) 
    {
        $user = new userModel( $request->input('username'), $request->input('password'), $request->input('firstname'),
            $request->input('lastname'), $request->input('email'), $request->input('phone'));
        $ds = new dataService();
        $register = $ds->reg($user);
        $register;
        return view('login');  
    }
}
