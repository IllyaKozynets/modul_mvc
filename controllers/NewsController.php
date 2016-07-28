<?php
include_once ROOT . "/models/News.php";
include_once ROOT."/models/Reclam.php";
class NewsController
{

    public function ActionIndex()
    {
        $ans = News::getNewsList();
        $one = $ans['one'];
        $two = $ans['two'];
        $newsSlider = News::getNewsForSlider();
        $commentatorsList = News::getComentators();
        $topnews = News::getTopNews();
        $analitics = News::getAnalitics();
        $reclam=Reclam::getReclam();
        require_once(ROOT . '/views/news/index.php');

        return true;
    }

    public function ActionFind(){
        $parameters=News::getParameters();
        $reclam=Reclam::getReclam();
        $tags=$parameters['tags'];
        $categories=$parameters['category'];
        $id=$parameters['id'];
        if(isset($_POST['filter'])){
            $ar=$_POST['categories'];
            $date_start=$_POST['date_start'];
            $date_end=$_POST['date_end'];
            $tag=$_POST['tags'];
            foreach ($ar as $a){
                $b[]= "\"$a\"";
            }
            
            $b=implode(', ',$b);
            $a=News::getByFind($b,$date_start,$date_end,$tag);
        }
        require_once (ROOT.'/views/news/find.php');

        
        return true;
    }

    public function ActionAnalytic($page){
        $newsList = News::getNewListByAnalytic($page);
        $reclam=Reclam::getReclam();
        require_once(ROOT . '/views/news/analitic.php');

        return true;
    }

    public function ActionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);


            if ($_SESSION['user']) {

                if (isset($_POST['submit'])) {

                    $comment = $_POST['comment'];
                    $user_id = $_SESSION['user'];
                    $result = News::AddNewsComment($comment, $id, $user_id);

                    setcookie('user', $user_id, time() + 60);
                    setcookie('comment_id', $result['id'], time() + 60);
                    header('Location: /news/' . $id);
                }
                if (isset($_POST['submitparent'])) {
                    $comment = $_POST['commentfor'];
                    $parent_id = $_POST['parent_id'];
                    $user_id = $_SESSION['user'];
                    $answer_id = News::AddNewsAnswer($comment, $parent_id, $user_id, $id);
                    setcookie('user', $user_id, time() + 60);
                    setcookie('comment_id', $answer_id['id'], time() + 60);
                    header('Location:/news/' . $id);
                }
                if (isset($_POST['edited_submit'])) {
                    $edited_comment = $_POST['edited_comment'];
                    $edited_id = $_POST['edited_id'];
                    $user_id = $_SESSION['user'];
                    News::EditComment($edited_comment, $edited_id, $user_id);

                }
            }
            $commentsList = News::ShowComments($id);
            $commentchild = News::ShowComments($id);
            $reclam=Reclam::getReclam();
            if ((isset($_POST['like'])) || (isset($_POST['dislike']))) {
                $like = $_POST['like'];
                $dislike = $_POST['dislike'];
                $comment_id = $_POST['comment_id'];
                News::AddLikes($like, $dislike, $comment_id);
                header("Location: /news/{$id}");
            }
            require_once(ROOT . '/views/news/one.php');

        }
        return true;
    }


    public function ActionTags($tag)
    {
        if ($tag) {
            $newsList = News::getNewsItemByTags($tag);
            $reclam=Reclam::getReclam();
            require_once(ROOT . '/views/news/tag.php');
        }
        return true;
    }


    public function ActionCategory($category, $page)
    {
        if ($category) {
            $a = strtolower($category);
            $reclam=Reclam::getReclam();
            $newsList = News::getNewListByCategory($category, $page);
            require_once(ROOT . '/views/news/category.php');
        }
        return true;
    }

}