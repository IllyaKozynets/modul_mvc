<?php
include '/../models/News.php';
include 'AdminBase.php';
class AdminCategoryController extends AdminBase{
    public function ActionIndex(){
        
        static::checkAdmin();

        $catList = News::getCategoriesListForAdmin();

        require_once ROOT."/views/admin/categories/index.php";
        return true;
    }

    public static function ActionAdd()
    {
        if (isset($_POST['submit'])){
            
            $new_cat=$_POST['category'];
            News::addNewCategory($new_cat);
            header("Location: '/admin/news'");
        }

        require_once ROOT."/views/admin/categories/add.php";
        return true;
    }
}