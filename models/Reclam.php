<?php
class Reclam{
    public static function getReclam(){
        $db=DB::getConnection();
        $reclamList=array();
        $result=$db->query('SELECT * FROM reclam ORDER BY see DESC LIMIT 8');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;

        while($row=$result->fetch()){

            $reclamList[$i]['name']=$row['name'];
            $reclamList[$i]['price']=$row['price'];
            $reclamList[$i]['id']=$row['id'];
            $reclamList[$i]['firm']=$row['firm'];



            $i++;


        }
        return $reclamList;
    }
    
}