<?php
include '/../models/News.php';
include 'AdminBase.php';
class AdminNewsController extends AdminBase{
    public function ActionIndex(){

        static::checkAdmin();

        $newsList = News::getNewsListForAdmin();

        require_once ROOT."/views/admin/news/index.php";
        return true;
    }

    public static function ActionAdd()
    {
        if (isset($_POST['submit'])){
            $category=$_POST['category'];
            $title=$_POST['title'];
            $content=$_POST['content'];
            $image=$_POST['image'];
            $tags=$_POST['tags'];
            echo "<br>";
            echo "<br>";
            echo "<br>";
            print_r($_POST);
            News::addNewNews($category,$title,$content,$image,$tags);
            header("Location: /admin/news");
        }

        require_once ROOT."/views/admin/news/add.php";
        return true;
    }
}