<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link type='text/css' href='../../css/basic.css' rel='stylesheet' media='screen' />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>

    <!--    <script src="http://code.jquery.com/jquery-2.0.3.js"></script>-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>News</title>
</head>
<body style="padding-top: 20px">
<?php
$db=DB::getConnection();
$sql='SELECT see FROM news WHERE id ='.$newsItem['id'];
$res = $db->query($sql);
$res->setFetchMode(PDO::FETCH_ASSOC);
$row = $res->fetch();
$counter = $row['see'];

//тут берется значение с БД
if (isset($_POST['test'])) {
    $sql_up='UPDATE news SET see='.$_POST['test'].' WHERE id ='.$newsItem['id'];
    $res = $db->query($sql_up);
    $row = $res->fetch();



}

?>
<script type="text/javascript">
    function printNumbers() {
        var i;
        var j=<?php echo $counter ?>;
        setInterval(function() {
            i = Math.floor(Math.random()* 5);
            j = j+i;
            $.ajax({
                type:'POST',
                url:'one.php',
                data:{test:j},
                success:function (data) {
                    document.getElementById('post').innerHTML = data;
                }
            })
            document.getElementById('refreshme').innerHTML = i;
            document.getElementById('sum').innerHTML = j;


        }, 3000);
    }
    printNumbers();
</script>
<script type="text/javascript">
    function mode() {
        $.ajax({
            url: 'mode.php',
            success: function(data) {
                $('#display').html(data);
            }
        });
    }

    var timeInterval = 3000;
    setInterval(mode, timeInterval);
</script>
<?php include ROOT.'/views/header.php';?>
<div style="display: none; padding: 10px;" id="exit_content">
    <h1>Goodbye visitor!</h1><h3>Thanks for visiting us!</h3><br />
    Some additional text here ... lorem ipsum.
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row news">
            <?php include ROOT.'/views/reclam1.php';?>

            <div class="col-md-8">
                <h2 class="title"><a href='/news/<?php echo $newsItem['id']; ?>'><?php echo $newsItem['title']; ?></a></h2>

                <?php if($newsItem['analitic']==1):?>
                <h2 class="title">Аналитика</h2>
                <?php endif?>
                <p class="meta">Posted on <?php echo $newsItem['date']; ?>
                <p><img src="<?php echo $newsItem['image'] ?>" height="auto" width="20%" alt=""/></p>
                <?php if($newsItem['analitic']==0):?>
                    <?php foreach ($newsItem['content'] as $content):?>
                        <p><?php echo $content; ?>.</p>
                    <?php endforeach ?>
                <?php elseif ($newsItem['analitic']==1):?>
                    <?php if(isset($_SESSION['user'])):?>
                        <?php foreach ($newsItem['content'] as $content):?>
                        <p><?php echo $content; ?>.</p>
                            <?php endforeach ?>
                    <?php endif?>
                    <?php if(!isset($_SESSION[user])):?>
                        <?php $i=0;?>
                        <?php foreach ($newsItem['content'] as $content):?>
                            <?php if ($i<5):?>
                            <p><?php echo $content; ?>.</p>
                                <?php $i++?>

                            <?php endif?>
                        <?php endforeach ?>
                        <p><a href="/user/login">Войдите</a>,что бы прочитать дальше</p>
                    <?php endif?>
                <?php endif;?>

                <br>
                <br>
                
                <div class="category"><h4>Tags:</h4><br>
                    <?php foreach ($newsItem['tags'] as $tag): ?>
                        <h4><a class="label label-info" href="/tags/<?php echo $tag ?>"><?php echo $tag ?></a></h4>
                    <?php endforeach; ?>
                    <span>Читают сейчас: </span>
                    <span id="refreshme">0</span>
                    <br>
                    <span>Прочитали всего: </span>
                    <span id="sum"><?php echo $counter;?></span>
                    <br>
                </div>


                <hr>

                <h3>Comments</h3>
                <?php if (isset($_SESSION['user'])): ?>
                    <form action="" method="post">
                        <textarea name='comment' placeholder="Оставьте ваш комментарий"></textarea>
                        <br>
                        <input type='hidden' name='page_id' value="<?php echo $newsItem['id']; ?>">
                        <input type="submit" name='submit' value="отправить">
                    </form>
                <?php endif; ?>
                <?php if (!isset($_SESSION['user'])): ?>
                    <p><a href="/user/login">Войдите</a>,что бы оставлять комментарии</p>
                <?php endif; ?>
                
                <br>
                <br>


                <?php foreach ($commentsList as $comment): ?>
                    <?php if ($comment['parent_id'] == NULL): ?>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                
                                <h3 class="panel-title">Posted by <?php echo $comment['name']; ?>
                                    on <?php echo $comment['date']; ?></h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $comment['content']; ?>
                            </div>
                            <div class="panel-heading">
                                <h5>Рейтинг: <?php echo $comment['pluses']; ?></h5>
                                <form action="" method="post">
                                    <input type="submit" name="like" class="btn btn-xs btn-success" value="like">
                                    <input type="submit" name="dislike" class="btn btn-xs btn-danger" value="dislike">
                                    <input type='hidden' name='comment_id' value="<?php echo $comment['id']; ?>">
                                </form>
                                <br>


                                <input type="button" class="btn btn-sm btn-default spoiler-title" value="ответить">

                                <?php if (isset($_SESSION['user'])): ?>
                                    <div class="spoiler-body">
                                        <form action="" method="post">
                                            <textarea name='commentfor' placeholder="Оставьте ваш комментарий"></textarea>
                                            <br>
                                            <input type='hidden' name='parent_id' value="<?php echo $comment['id']; ?>">
                                            <input type="submit" name='submitparent' value="отправить">
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <div class="spoiler-body">
                                        <p><a href="/user/login">Войдите</a>,что бы оставлять комментарии</p>
                                    </div>
                                <?php endif;?>

                                <?php if (($_COOKIE['user']==$_SESSION['user'])&&($_COOKIE['comment_id']==$comment['id'])):?>
                                    <input type="button" class="btn btn-sm btn-default spoiler-title" value="изменить">
                                    <div class="spoiler-body">
                                        <form action="" method="post">
                                            <textarea name='edited_comment'><?php echo $comment['content']?></textarea>
                                            <br>
                                            <input type='hidden' name='edited_id' value="<?php echo $comment['id']; ?>">
                                            <input type="submit" name='edited_submit' value="сохранить">
                                        </form>
                                    </div>
                                <?php endif;?>

                            </div>
                        </div>
                        <?php foreach ($commentchild as $child): ?>
                            <?php if ($child['parent_id'] == $comment['id']): ?>
                                <div class="panel panel-warning" style="margin-left: 60px;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Posted by <?php echo $child['name']; ?>
                                            on <?php echo $child['date']; ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $child['content']; ?>
                                    </div>
                                    <div class="panel-heading">
                                        <h5>Рейтинг: <?php echo $child['pluses']; ?></h5>
                                        <form action="" method="post">
                                            <input type="submit" name="like" class="btn btn-xs btn-success" value="like">
                                            <input type="submit" name="dislike" class="btn btn-xs btn-danger" value="dislike">
                                            <input type='hidden' name='comment_id' value="<?php echo $child['id']; ?>">
                                        </form>
                                        <br>
                                        <?php if (($_COOKIE['user']==$_SESSION['user'])&&($_COOKIE['comment_id']==$child['id'])):?>
                                            <input type="button" class="btn btn-sm btn-default spoiler-title" value="изменить">
                                            <div class="spoiler-body">
                                                <form action="" method="post">
                                                    <textarea name='edited_comment'><?php echo $child['content']?></textarea>
                                                    <br>
                                                    <input type='hidden' name='edited_id' value="<?php echo $child['id']; ?>">
                                                    <input type="submit" name='edited_submit' value="сохранить">
                                                </form>
                                            </div>
                                        <?php endif;?>
                                   </div>

                                    <div>

                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif;?>
                <?php endforeach; ?>

            </div>
        <?php include ROOT.'/views/reclam2.php';?>

    </div>

    </div>


        <!--<meta http-equiv="refresh" content="2"/>-->



</div>

<?php include '/../footer.php';?>

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
<script type="text/javascript">
    $(document).ready(function () {
        $('.spoiler-body').hide();
        $('.spoiler-title').click(function () {
            $(this).next().toggle()
        });
    });
</script>
</body>
</html>