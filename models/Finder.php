<?php
require_once '../config/constants.php';
require_once ROOT.'/components/DB.php';

$search='';

if($_POST['search']){
$search = $_POST['search'];
}
if($search == ''){
    exit("Начните вводить запрос");
}

$db=DB::getConnection();
$res=("SELECT tags FROM news WHERE tags LIKE \"%{$search}%\"");
$sql=$db->query($res);
if($sql->rowCount() > 0){
    $i = 0;
    $finds=[];
    while($row=$sql->fetch()){
        $finds[$i]['tags']=explode(', ',$row['tags']);

        $i++;
    }
    $tagg = [];
    foreach ($finds as $find) {
        foreach ($find['tags'] as $find_tag){
            $tagg[]=$find_tag;
        }

    }

    $tags_unique = array_unique($tagg);
    $arr_tags = [];
    foreach ($tags_unique as $item){
        if(strpos($item, $search)!== false){
            $arr_tags[]=$item;
        }
    }

    foreach ($arr_tags as $unique_tag){

        echo "<div><a href='/tags/{$unique_tag}'>" .$unique_tag. "</a></div>";
    }

}else{
    echo "Нет результатов";
}