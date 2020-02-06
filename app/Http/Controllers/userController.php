<?php 
namespace App\Http\Controllers;
use App\Services\Data\userService;
use App\Models\userModel;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function getUserById(){
        $userService = new userService();
        session_start();
        $id = (int)$_SESSION["id"];
        $user = $userService->getUserById($id);
        if($user != null)
            return view('profile')->with('user', $user);
        else echo "error";
    }
    
    public function updateUser(Request $request){
        $user = new userModel($request->input('username'), $request->input('password'), $request->input("firstname"), $request->input("lastname"),
            $request->input("email"), $request->input("phone"), null);
        
        $userService = new userService();
        $result = $userService->updateUserV2($user);
        return view('home');
    }
    public function doDeleteUser()
    {
        session_start();
        $userService = new userService();
        $deleted= $userService->deleteUser();
    
    }
    
    public function DoUpdateUser()
    {
        session_start();
        $userService = new userService();
        $update = $userService->updateUserRole();
        
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
