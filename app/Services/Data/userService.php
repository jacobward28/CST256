<?php
namespace App\Services\Data;
use Illuminate\Http\Request;
use App\Services\Utility\databaseConnector;
use App\Http\Controllers\userController;
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
                $user->setId($row["id"]);
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
        if ($connection->connect_error)
        {
            die("Connection failed: " . $connection->connect_error);
        }
        
        $query = "select * from users where id = '$id'";
        $result = mysqli_query($connection, $query);
        $user = new userModel();
        if($result != null && $result->num_rows== 1)
        {
            
            while($row = $result->fetch_assoc())
            {
                
                $user->setFirstname($row["firstname"]);
                $user->setLastname($row["lastname"]);
                $user->setUsername($row["username"]);
                $user->setPassword($row["password"]);
                $user->setRole($row["role"]);
                
                
                
                
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
    
    public function updateUser()
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
    
}

   
    