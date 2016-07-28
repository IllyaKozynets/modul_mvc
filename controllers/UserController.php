<?php
include ROOT.'/models/User.php';
include_once ROOT."/models/Reclam.php";

/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 23.07.2016
 * Time: 17:59
 */
class UserController
{
    public function actionRegister(){
        
        $name = '';
        $email = '';
        $password = '';
        $result=false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (User::CheckName($name)) {
            } else {
                $errors[] = 'Неправильное имя';
            }

            if (User::CheckEmail($email)) {
            } else {
                $errors[] = 'Неправильный E-mail';
            }

            if (User::CheckPassword($password)) {
            } else {
                $errors[] = 'Неправильный пароль';
            }
            if(User::checkEmailExists($email)){
                $errors[]='Такой email уже используется';
            }
            if($errors===false){
               
                $result=User::Register($name,$email,$password);
            }
        }
        $reclam=Reclam::getReclam();


        require_once(ROOT . '/views/user/register.php');
        return true;
    }
    public function ActionLogout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            session_destroy();
            header("Location:/user/login");
        } else {
            header("Location:/user/login");
        }
    }
    public function ActionLogin(){

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;


            if (User::CheckEmail($email)) {
            } else {
                $errors[] = 'Неправильный E-mail';
            }

            if (User::CheckPassword($password)) {
            } else {
                $errors[] = 'Неправильный пароль';
            }
            $userId=User::checkUserData($email,$password);
            if($userId==false){
                $errors[]='Неправильные данные для входа на сайт';
            }else{
                User::auth($userId);
                header("Location: /");
            }

        }
        $reclam=Reclam::getReclam();
        require_once (ROOT.'/views/user/auth.php');
        return true;
    }
    
    public function ActionComments($id,$page){
        $comments=array();
        $comments=User::showCommentsById($id,$page);
        $reclam=Reclam::getReclam();
        require_once(ROOT . '/views/user/comments.php');
        return true;
    }
   

}