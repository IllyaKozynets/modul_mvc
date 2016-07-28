<?php
class ReclamController{
    public function actionIndex($id){
        $db=DB::getConnection();

        $result=$db->query('UPDATE reclam SET see=see+1 WHERE id='.$id);
        $a=$result->setFetchMode(PDO::FETCH_ASSOC);
        return true;
    }
}