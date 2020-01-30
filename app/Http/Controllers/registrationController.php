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
        $user = new userModel(0, $request->input('username'), $request->input('password'));
        $ds = new dataService();
        $register = $ds->reg($user);
        $register;
        return view('login');
        
    }
}
