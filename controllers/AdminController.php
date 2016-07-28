<?php
include "AdminBase.php";
class AdminController extends AdminBase{
    public function ActionIndex(){
        static::checkAdmin();
            
        require_once (ROOT.'/views/admin/index.php');
        return true;
    }
}