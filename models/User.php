<?php

class User
{
    public static function Register($name,$email,$password){
        $db=DB::getConnection();
        $sql='INSERT INTO user(name,email,password) VALUES (:name,:email,:password)';
        $result=$db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        return $result->execute();

    }
    public static function CheckName($name){
        if(strlen($name)>=2){
            return true;
        }
        return false;
    }
    public static function CheckEmail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    public static function CheckPassword($password){
        if(strlen($password)>=6){
            return true;
        }
        return false;
    }
    public static function checkEmailExists($email){
        $db=DB::getConnection();
        $sql='SELECT COUNT(*) FROM user WHERE email=:email';
        $result=$db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn())
            return true;

        return false;

    }
    public static function checkUserData($email,$password){
        $db=DB::getConnection();
        $sql='SELECT * FROM user WHERE email=:email AND password=:password';
        $result=$db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_INT);
        $result->bindParam(':password',$password,PDO::PARAM_INT);
        $result->execute();

        $user=$result->fetch();
        if($user){
            return $user['id'];
        }
        return false;
        
    }
    public static function auth($userId){
      
        $_SESSION['user']=$userId;
    }
    public static function checkLogged(){
      
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
    }

    public static function showCommentsById($id,$page){
        $db = DB::getConnection();
        $commentators = array();
        $offset=($page-1)*5;
        $result = $db->query('SELECT comment.pluses,comment.content,user.name,comment.date,news.title FROM user,comment,news WHERE comment.news_id = news.id AND comment.user_id=user.id AND comment.user_id='.$id.' ORDER BY comment.pluses DESC LIMIT 5 OFFSET '.$offset);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {


            $commentators[$i]['content'] = $row['content'];
            $commentators[$i]['name'] = $row['name'];
            $commentators[$i]['date']=$row['date'];
            $commentators[$i]['title']=$row['title'];
            $commentators[$i]['pluses']=$row['pluses'];

            $i++;
        }
        return $commentators;
    }
    public static function getUserById($id)
    {

        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

}