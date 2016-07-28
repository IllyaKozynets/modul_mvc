<?php 


abstract class AdminBase {
    public static function checkAdmin(){
        include '/../models/User.php';
        $userId=User::checkLogged();
        $user=User::getUserById($userId);
        if($user['role']=='admin'){
            return true;
        }
        die('Access denied');
    }
}