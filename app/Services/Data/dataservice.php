<?php
namespace App\Services\Data;
use Illuminate\Http\Request;
use App\Services\Utility\databaseConnector;
use App\Models\userModel;
use App\Http\Controllers\userController;

class dataService {
    
    /**
     * create function to manage registration
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function reg(userModel $user)
    {
        $db = new databaseConnector();
        $connect = $db->connect();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $role = $user->getRole();
        $sql_statement = "SELECT username FROM users";
        $result = mysqli_query($connect, $sql_statement);
        $row = $result->fetch_assoc();
        $usernameInUse = $row['username'];
        if($username === $usernameInUse) {
            $duplicateUser = true;
            echo "Username is already in use.";
            
        }
        else {
        $sql_statement2 = "INSERT INTO `users`(`username`, `password`, `firstname`, `lastname`, `email`, `phone`) VALUES 
('$username', '$password', '$firstname', '$lastname', '$email', '$phone','$role');";
        $result2 = mysqli_query($connect, $sql_statement2);
        return $result2;
        }
    }
        public function log(userModel $user) {
            $db = new databaseConnector();
            $connect = $db->connect();
            $username = $user->getUsername();
            $password = $user->getPassword();
            

            
            
            $sql_statement = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
            $result = mysqli_query($connect, $sql_statement);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $role = $row["role"];
                $user->setRole($role);


            }
            else {
                echo "login failed";
            
                   

            }
        }
        
        public function Read()
        {
            $db = new databaseConnector();
            $connect = $db->connect();
            

            
            $sql_stmt = "SELECT * FROM users";
            $result = mysqli_query($connect, $sql_stmt);
            $row = mysqli_fetch_assoc($result);
            
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $username = $row['username'];
            $role = $row['role'];
            


            
        }
        
    }

   
    