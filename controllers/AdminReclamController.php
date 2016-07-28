<?php
include '/../models/News.php';
class AdminReclamController{
    public static function ActionAdd()
    {
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $firm = $_POST['firm'];
            News::addNewReclam($name, $price, $firm);
            header("Location: '/admin'");
        }
        require_once ROOT . '/views/admin/reclam/add.php';
        return true;

    }

}