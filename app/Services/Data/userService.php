<?php


namespace App\Services\Data;
use App\Models\userModel;
use App\Http\Controllers\databaseController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class userService {
    function __construct(){
        
    }
    
   
    
    function getUserById(int $id)
    {
        
        $db = new databaseController();
        $connect = $db->connect();
        
        
        $query = "select * from `users` where id = '$id' LIMIT 1";
        $result = mysqli_query($connect, $query);
        $user = null;
        if(mysqli_num_rows($result) == 1)
        {
            
            
            while($row = $result->fetch_assoc())
            {
               $user = new userModel($row["username"], 
                    $row["password"],
                    $row["firstname"],
                    $row["lastname"],
                    $row["email"],
                    $row["phone"],
                    $row["role"]
                    ); 
            }
        }
        else {
            echo"No User Found";
        }
        return $user;
    }
    
    function updateUser(userModel $user){
        
        $db = new databaseController();
        $connect = $db->connect();
    
        $query = "update users set username = '$user->getUsername()', 
            firstname = '$user->getFirstname()', 
            lastname = '$user->getLastname()', 
            email = '$user->getEmail()', 
            password = '$user->getPassword()', 
            phone='$user->getPhone()' where ID = '$user->getId()'";
        $result = mysqli_query($connect, $query);
        return $result;
    }
}

   
    