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
        $sql_statement = "INSERT INTO `user`(`username`, `password`) VALUES ('$username', '$password');";
        $result = mysqli_query($connect, $sql_statement);
        return $result;
        }
        
        public function log(userModel $user) {
            $db = new databaseController();
            $connect = $db->connect();
            $username = $user->getUsername();
            $password = $user->getPassword();
            
            $sql_statement = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
            $result = mysqli_query($connect, $sql_statement);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                //$_SESSION['id'] = $row['ID'];
                //$_SESSION['username'] = $row['username'];
                echo "You Logged in With: " . $username . " " . $password;
                echo '<br>';
            }
            else {
                echo "login failed";
            
                   

            }
        }
    }

   
    