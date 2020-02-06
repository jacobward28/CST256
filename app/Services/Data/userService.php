<?php


namespace App\Services\Data;

use Illuminate\Http\Request;
use App\Services\Utility\databaseConnector;
use App\models\usermodel;
use App\Services\Data\dataservice;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class userService {
    function __construct(){
        
    }
    
    function ViewUsers() {
        $usersA = array();
        $db = new databaseConnector();
        $connect = $db->connect();
        if ($connect->connect_error)
        {
            die("Connection failed: " . $connection->connect_error);
        }
        
        $query = "SELECT * from users";
        $result = mysqli_query($connect, $query);
        
        if($result->num_rows > 0)
        {
            $i = 0;
            while($row = $result->fetch_assoc())
            {
                
                $user = new userModel(null, null, null, null, null, null, null);
                $user->setId($row["ID"]);
                $user->setFirstname($row["firstname"]);
                $user->setLastname($row["lastname"]);
                $user->setUsername($row["username"]);
                $user->setPassword($row["password"]);
                $user->setRole($row["role"]);
                
                $usersA[$i] = $user;
                $i++;
                
            }
        }
        else {
            echo"No User Found";
        }
        
        return $usersA;
    }
    
    function getUserById(int $id)
    {
        
        $db = new databaseConnector();
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

    public function deleteUser()
    {
        $id = $_POST['user_id'];
        $db = new databaseConnector();
        $connect = $db->connect();
        if ($connect->connect_error)
        {
            die("Connection failed: " . $connection->connect_error);
        }
        $query = "Delete FROM users WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        return $result;
        
    }
    
    public function updateUserRole()
    {
        $id = $_POST['user_id'];
        if($_POST['role'] == 'admin'){$role = '1';}
        elseif($_POST['role'] == 'suspend'){$role = '3';}
        else{$role = '0';}
        $db = new databaseConnector();
        $connect = $db->connect();
        if ($connect->connect_error)
        {
            die("Connection failed: " . $connection->connect_error);
        }
        $query = "UPDATE users SET role = '$role' WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        return $result;
    }
    
    function updateUserV2(userModel $user){
        
        $db = new databaseConnector();
        $connect = $db->connect();
        if ($connect->connect_error)
        {
            die("Connection failed: " . $connection->connect_error);
        }
        $username = $user->getUsername();
        $password = $user->getPassword();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $id = $user->getId();
        $query = "update users set username = '$username', 
            firstname = '$firstname', 
            lastname = '$lastname', 
            email = '$email', 
            password = '$password', 
            phone='$phone' 
            where ID = '$id'";
        $row = mysqli_query($connect, $query);
        $user = new userModel($row["username"],
            $row["password"],
            $row["firstname"],
            $row["lastname"],
            $row["email"],
            $row["phone"],
            $row["role"]
            );
        return $user;
    }
}

   
    