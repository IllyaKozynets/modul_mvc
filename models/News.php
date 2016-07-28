<?php
class News{
    public static function getNewsItemById($id){

        
        $id=intval($id);
        if($id){
        $db=DB::getConnection();
        $result=$db->query('SELECT * FROM news WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsItem=$result->fetch();
        $newsItem['tags']=explode(', ',$newsItem['tags']);
            $newsItem['content']=explode('. ',$newsItem['content']);
            return $newsItem;
    }
    }

   
    public static function ShowComments($id){

        $db=DB::getConnection();
        $commentsList=array();
        $result=$db->query('SELECT comment.content,comment.parent_id,comment.id,comment.pluses,comment.date,user.name FROM comment,user WHERE comment.news_id='.$id.' AND comment.user_id=user.id ORDER BY comment.pluses DESC');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;

        while($row=$result->fetch()){
            
            $commentsList[$i]['date']=$row['date'];
            $commentsList[$i]['parent_id']=$row['parent_id'];
            $commentsList[$i]['id']=$row['id'];
            $commentsList[$i]['content']=$row['content'];
            $commentsList[$i]['name']=$row['name'];
            $commentsList[$i]['pluses']=$row['pluses'];

            $i++;


        }
        return $commentsList;
    }
    public static function AddLikes($like,$dislike,$comment_id){
      if($like){
          $db=DB::getConnection();

          $result=$db->query('UPDATE comment SET pluses=pluses+1 WHERE id='.$comment_id);
          $a=$result->setFetchMode(PDO::FETCH_ASSOC);
      }
        elseif ($dislike){
            $db=DB::getConnection();

            $result=$db->query('UPDATE comment SET pluses=pluses-1 WHERE id='.$comment_id);
            $a=$result->setFetchMode(PDO::FETCH_ASSOC);
        }
        return true;
    }
    public static function AddNewsComment($comment,$id,$user_id)
    {
        
        $db = DB::getConnection();
        $a=1;
        $i=0;
        $sql = 'INSERT INTO comment(content,user_id,news_id) VALUES (:content,:user_id,:news_id)';
        $result = $db->prepare($sql);
        $result->bindParam(':content', $comment);
        $result->bindParam(':user_id', $user_id);
        $result->bindParam(':news_id', $id);
        $result->execute();

       $res = $db->query('SELECT id FROM comment WHERE user_id ='.$user_id.' AND news_id='.$id.' ORDER BY date DESC LIMIT 1');
        $res->setFetchMode(PDO::FETCH_ASSOC);
       $row = $res->fetch();
            $for=$row;
      return $for;
    }
    public static function EditComment($edited_comment,$edited_id,$user_id){
        $db=DB::getConnection();
        $sql='UPDATE comment SET content=:content WHERE user_id=:user_id AND id=:news_id';
        $result = $db->prepare($sql);
       $result->bindParam(':content', $edited_comment);
        $result->bindParam(':user_id', $user_id);
        $result->bindParam(':news_id', $edited_id);
         $a=$result->execute();

        return $a;
    }
    public static function getParameters(){
        $db=DB::getConnection();

        $result=$db->query('SELECT news.tags,category.id,category.category FROM category,news ');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $parameters=array();
        $pr=array();
        $i=0;
        while($row=$result->fetch()){
            $parameters[$i]['tags']=explode(', ',$row['tags']);
            $parameters[$i]['category']=$row['category'];
            $parameters[$i]['id']=$row['id'];
            $i++;
                }
        foreach ($parameters as $parameter){
            foreach ($parameter['tags'] as $par){
                $pr[]=$par;
                
            }
            $cat[]=$parameter['category'];
            $id[]=$parameter['id'];
        }
   
        $pr=array_unique($pr);
        $cat=array_unique($cat);
        $id=array_unique($id);
        $parameterrrr['tags']=$pr;
        $parameterrrr['category']=$cat;
        $parameterrrr['id']=$id;
        return $parameterrrr;
         
    }
    
    public static function getByFind($ar,$date_start,$date_end,$tag){
        $db=DB::getConnection();
        
        $date_start="\"$date_start\"";
        $date_end="\"$date_end\"";
        $result=$db->query('SELECT news.id,news.title,news.image,news.content,news.tags,news.date FROM news,category WHERE news.category_id=category.id AND DATE(news.date) BETWEEN '.$date_start.' AND '.$date_end.' AND category.category IN ('.$ar.')');
        $a=$result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;
        while($row=$result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['image'] = $row['image'];
            $newsList[$i]['tags'] = explode(', ',$row['tags']);
            $newsList[$i]['content'] = $row['content'];
            $i++;
        }
        $i=0;
        $resssss=array();
        foreach ($newsList as $newList){
            foreach ($newList['tags'] as $tagin){
                $forint[]=$tagin;
            }
            $resssss=array_intersect($tag,$forint);
            if(!empty($resssss)){
                $reeees[]=$newList;
            }
            $forint=null;

        }
   

       
        return $reeees;
    }

    public static function AddNewsAnswer($comment,$parent_id,$user_id,$id){
        $db = DB::getConnection();

        $sql = 'INSERT INTO comment(content,user_id,news_id,parent_id) VALUES (:content,:user_id,:news_id,:parent_id)';
        $result = $db->prepare($sql);
        $result->bindParam(':content', $comment);
        $result->bindParam(':user_id', $user_id);
        $result->bindParam(':news_id', $id);
        $result->bindParam(':parent_id', $parent_id);
        $result->execute();
        $res = $db->query('SELECT id FROM comment WHERE user_id ='.$user_id.' AND news_id='.$id.' ORDER BY date DESC LIMIT 1');
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $row = $res->fetch();
        $for=$row;
        return $for;
    }
    
    
    public static function getNewsItemByTags($tag){
        if($tag){
            $db=DB::getConnection();

            $newsList=array();

            $result=$db->query('SELECT news.id,news.title,news.image,news.content,tags,date FROM news ORDER BY DATE DESC ');
            $a=$result->setFetchMode(PDO::FETCH_ASSOC);
            $i=0;



            while($row=$result->fetch()){
                $a=explode(', ',$row['tags']);
                foreach ($a as $b){
                if($b===$tag) {
                    $newsList[$i]['id'] = $row['id'];
                    $newsList[$i]['title'] = $row['title'];
                    $newsList[$i]['date'] = $row['date'];
                    $newsList[$i]['image'] = $row['image'];
                    $newsList[$i]['tags'] = explode(', ',$row['tags']);
                    $newsList[$i]['content'] = $row['content'];
                    $i++;

                }
                }
            }
            return $newsList;
        }
        }
    public static function getNewListByAnalytic($page){
        $offset=($page-1)*5;
        $newsList=array();
        $db=DB::getConnection();
        $sql='SELECT category.category,news.category_id,news.id,news.title,news.image,news.content,news.tags,news.date FROM news,category WHERE category.id=news.category_id AND news.analitic=1 ORDER BY DATE DESC LIMIT 5 OFFSET :offset';
        $result=$db->prepare($sql);
        $result->bindParam(':offset',$offset,PDO::PARAM_INT);
        $result->execute();
        $a=$result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;
        while($row=$result->fetch()){
            $newsList[$i]['category'] = $row['category'];
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['analitic'] = $row['analitic'];
            $newsList[$i]['image'] = $row['image'];
            $newsList[$i]['tags'] = explode(', ',$row['tags']);
            $newsList[$i]['content'] = $row['content'];
            $i++;


        }
        return $newsList;
    }


    public static function getNewListByCategory($category,$page=1){
        if($category){

            $offset=($page-1)*5;
            $newsList=array();
            $db=DB::getConnection();
            $sql='SELECT category.category,news.category_id,news.id,news.title,news.image,news.content,news.tags,news.date FROM news,category WHERE category.id=news.category_id AND category.category=:category ORDER BY DATE DESC LIMIT 5 OFFSET :offset';
            $result=$db->prepare($sql);
            $result->bindParam(':category',ucfirst($category),PDO::PARAM_STR);
            $result->bindParam(':offset',$offset,PDO::PARAM_INT);
            $result->execute();

            $a=$result->setFetchMode(PDO::FETCH_ASSOC);
            $i=0;



            while($row=$result->fetch()){
                




                    $newsList[$i]['category'] = $row['category'];
                    $newsList[$i]['id'] = $row['id'];
                    $newsList[$i]['title'] = $row['title'];
                    $newsList[$i]['date'] = $row['date'];
                    $newsList[$i]['analitics'] = $row['analitics'];
                    $newsList[$i]['image'] = $row['image'];
                    $newsList[$i]['tags'] = explode(', ',$row['tags']);
                    $newsList[$i]['content'] = $row['content'];
                    $i++;


            }
            return $newsList;
        }
    }

    public static function getComentators()
    {
        $db = DB::getConnection();
        $commentators = array();
        $result = $db->query('SELECT user.name,user.id FROM comment, user WHERE comment.user_id = user.id GROUP BY user_id ORDER BY COUNT(*) DESC LIMIT 5;');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {


            $commentators[$i]['name'] = $row['name'];
            $commentators[$i]['id']=$row['id'];
            $i++;
        }
        return $commentators;
    }


    public static function getTopNews(){
        $db = DB::getConnection();
        $topnews = array();
        $result = $db->query('SELECT n.id, n.title,COUNT(c.id) AS comment_count, n.image, n.date FROM news n, comment c WHERE n.id =c.news_id AND c.date>NOW()-INTERVAL 24 HOUR GROUP BY n.id ORDER BY COUNT(c.id) DESC LIMIT 3');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {


            $topnews[$i]['id'] = $row['id'];
            $topnews[$i]['comment_count'] = $row['comment_count'];
            $topnews[$i]['title'] = $row['title'];
            $topnews[$i]['image'] = $row['image'];
            $topnews[$i]['date'] = $row['date'];
            
            $i++;
        }
        return $topnews;
    }


    public static function getNewsForSlider(){
        $db=DB::getConnection();
        $newsSlider=array();
        $result=$db->query('SELECT * FROM news ORDER BY date DESC LIMIT 4');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;
        while($row=$result->fetch()){





            $newsSlider[$i]['title'] = $row['title'];
            $newsSlider[$i]['id'] = $row['id'];
            $newsSlider[$i]['image'] = $row['image'];
            
            $i++;


        }
        return $newsSlider;
    }
    public static function getCategoriesListForAdmin(){
        $db=DB::getConnection();
        $catList=array();
        $result=$db->query('SELECT * FROM category');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;

        while($row=$result->fetch()){
            $catList[$i]['id']=$row['id'];
            $catList[$i]['category']=$row['category'];

            $i++;
        }
        return $catList;
    }

    public static function getNewsListForAdmin(){
        $db=DB::getConnection();
        $newsList=array();
        $result=$db->query('SELECT n.id, n.title, n.content, n.image, n.tags, n.date, c.category, n.analitic FROM news n, category c WHERE n.category_id=c.id');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;

        while($row=$result->fetch()){
            $newsList[$i]['id']=$row['id'];
            $newsList[$i]['title']=$row['title'];
            $newsList[$i]['content']=$row['content'];
            $newsList[$i]['image']=$row['image'];
            $newsList[$i]['tags']=$row['tags'];
            $newsList[$i]['date']=$row['date'];
            $newsList[$i]['category']=$row['category'];
            $newsList[$i]['analitic']=$row['analitic'];

            $i++;
        }
        return $newsList;
    }

    public static function addNewCategory($new_cat)
    {
        $db = DB::getConnection();
        $sql = 'INSERT INTO category(category) VALUES (:category)';
        $result = $db->prepare($sql);
        $result->bindParam(':category', $new_cat);

        return $result->execute();
    }

    public static function addNewReclam($name,$price,$firm)
    {
        $db = DB::getConnection();
        $sql = 'INSERT INTO reclam(name,price,firm) VALUES (:name,:price,:firm)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->bindParam(':price', $price);
        $result->bindParam(':firm', $firm);

        return $result->execute();
    }
public static function addNewNews($category,$title,$content,$image,$tags){
    $db = DB::getConnection();
    $sql='INSERT INTO news(title,content,image,tags,category_id) VALUES (:title,:content,:image,:tags,(SELECT id FROM category WHERE category=:category ))';
    $result = $db->prepare($sql);
    $result->bindParam(':title', $title);
    $result->bindParam(':content', $content);
    $result->bindParam(':image', $image);
    $result->bindParam(':tags', $tags);
    $result->bindParam(':category', $category);

    return $result->execute();
}


    public static function getNewsList(){

        $db=DB::getConnection();
        $newsList=array();
        $result=$db->query('SELECT * FROM news ORDER BY date DESC LIMIT 20');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;
        $result2=$db->query('SELECT * FROM category LIMIT 20');
        $result2->setFetchMode(PDO::FETCH_ASSOC);



        while($row=$result->fetch()){
            $newsList[$i]['category_id']=$row['category_id'];
            $newsList[$i]['id']=$row['id'];
            $newsList[$i]['title']=$row['title'];
            $newsList[$i]['date']=$row['date'];
            $newsList[$i]['image']=$row['image'];
            $newsList[$i]['tags']=explode(', ',$row['tags']);
            $newsList[$i]['content']=$row['content'];
            $i++;


        }
        $j=0;
        while($row2=$result2->fetch()){
        $newsItem[$j]['id']=$row2['id'];
        $newsItem[$j]['category']=$row2['category'];
        $j++;
        }
        $res['one']=$newsItem;
        $res['two']=$newsList;
        return $res;
    }
    public static function getAnalitics(){
        $db=DB::getConnection();
        $newsList=array();
        $result=$db->query('SELECT * FROM news WHERE analitic=1 ORDER BY date DESC LIMIT 20');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;


        while($row=$result->fetch()){
            $newsList[$i]['category_id']=$row['category_id'];
            $newsList[$i]['id']=$row['id'];
            $newsList[$i]['title']=$row['title'];
            $newsList[$i]['date']=$row['date'];
            $newsList[$i]['image']=$row['image'];
            $newsList[$i]['tags']=explode(', ',$row['tags']);
            $newsList[$i]['content']=$row['content'];
            $i++;


        }
        return $newsList;
    }
}