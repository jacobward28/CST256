<?php
namespace App\Services\Data;
use Illuminate\Http\Request;
use App\Http\Controllers\databaseController;
use App\Models\userModel;

class dataService {
    
    /**
     * create function to manage registration
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function reg(userModel $user)
    {
        $db = new databaseController();
        $connect = $db->connect();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $sql_statement = "INSERT INTO `users`(`username`, `password`, `firstname`, `lastname`, `email`, `phone`) VALUES 
('$username', '$password', '$firstname', '$lastname', '$email', '$phone');";
        $result = mysqli_query($connect, $sql_statement);
        return $result;
        }
        
        public function log(userModel $user) {
            $db = new databaseController();
            $connect = $db->connect();
            $username = $user->getUsername();
            $password = $user->getPassword();
            
            
            $sql_statement = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
            $result = mysqli_query($connect, $sql_statement);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
<<<<<<< HEAD
                //$_SESSION['id'] = $row['ID'];
                //$_SESSION['username'] = $row['username'];
=======
                $role = $row["role"];
                $userName = $row["username"];
                $_SESSION["role"] = $role;
                $_SESSION["username"] = $username;
>>>>>>> e578f2bdc96f7741d79e5bbbb0b4f7371dbe504a
            }
            else {
                echo "login failed";
            
                   

            }
        }
    }

   
    