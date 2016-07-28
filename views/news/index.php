<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script type="text/javascript" src="../../js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <link rel="stylesheet" href="../../css/demoStyleSheet.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!--    <script type="text/javascript" src="../../js/crossbrowser-onbeforeunload.js"></script>-->
    <link media="all" rel="stylesheet" type="text/css" href="../../css/close.css" />
    <title>Main</title>
</head>
<body style="padding-top: 20px">


<?php include ROOT . '/views/header.php'; ?>
<div class="container-fluid content">
    <div class="row">
        <?php include ROOT.'/views/reclam1.php';?>
        <div class="col-md-8">

            <?php foreach ($one as $newsList): ?>
                <div class="title"><p><a
                            href="/category/<?php echo strtolower($newsList['category']) ?>"> <?php echo $newsList['category']; ?></a>
                    </p></div>

                <?php $i = 0; ?>

                <?php foreach ($two as $newsItem): ?>
                    

                    <?php if ($newsList['id'] == $newsItem['category_id'] && $i < 5): ?>
                        <div class="inline">
                            <h2><a href="/news/<?php echo $newsItem['id'] ?>"><?php echo $newsItem['title']; ?></a>
                            </h2>

                            <strong>Date:</strong> <?php echo $newsItem['date']; ?>

                            <br>
                            <a href="/news/<?php echo $newsItem['id'] ?>"><img
                                    src="<?php echo $newsItem['image'] ?>"
                                    style="width: 150px;height: 150px"/></a>

                            <div class="category">Tags:<br>
                                <?php foreach ($newsItem['tags'] as $tag): ?>
                                    <a class="label label-info"
                                       href="/tags/<?php echo $tag ?>"><?php echo $tag ?></a>
                                <?php endforeach; ?>
                            </div>


                            <div class="button float_r"><a class="btn y" href="/news/<?php echo $newsItem['id'] ?>"
                                                           class="more">Read more</a></div>
                            <div class="cleaner"></div>
                            <?php $i++; ?>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>

            <?php endforeach; ?>
            <div class="title"><p><a
                        href="/category/analytics">Аналитика</a>
                </p></div>
            <?php $i=0;?>

            <?php foreach($analitics as $analitic):?>
            <?php if ($i < 5): ?>
            <div class="inline">
                <h2><a href="/news/<?php echo $analitic['id'] ?>"><?php echo $analitic['title']; ?></a>
                </h2>

                <strong>Date:</strong> <?php echo $analitic['date']; ?>

                <br>
                <a href="/news/<?php echo $analitic['id'] ?>"><img
                        src="<?php echo $analitic['image'] ?>"
                        style="width: 150px;height: 150px"/></a>

                <div class="category">Tags:<br>
                    <?php foreach ($analitic['tags'] as $tag): ?>
                        <a class="label label-info"
                           href="/tags/<?php echo $tag ?>"><?php echo $tag ?></a>
                    <?php endforeach; ?>
                </div>


                <div class="button float_r"><a class="btn y" href="/news/<?php echo $analitic['id'] ?>"
                                               class="more">Read more</a></div>
                <div class="cleaner"></div>

            </div>
            <?php endif;?>

                <?php $i++; ?>
            <?php endforeach;?>
            <br>
            <br>
            <div class="top">

                <h1>Топ обсуждаемых новостей за последние сутки</h1>
                <?php foreach($topnews as $topnew ):?>
                <div class="inline">
                    <h2><a href="/news/<?php echo $topnew['id'] ?>"><?php echo $topnew['title']; ?></a>
                    </h2>

                    <strong>Date:</strong> <?php echo $topnew['date']; ?>

                    <br>
                    <a href="/news/<?php echo $topnew['id'] ?>"><img
                            src="<?php echo $topnew['image'] ?>"
                            style="width: 150px;height: 150px"/></a>

                    <div class="button float_r"><a class="btn y" href="/news/<?php echo $topnew['id'] ?>" class="more">Read more</a></div>
                    <div class="cleaner"></div>

                </div>
                <?php endforeach;?>

            </div>
            <div>
                <h3>Топ 5 комментаторов</h3>
                <ol >
                    <?php foreach($commentatorsList as $commentator):?>
                        <li><a href="/comments/id-<?php echo $commentator['id']?>"><?php echo $commentator['name']?></a></li>
                    <?php endforeach;?>
                </ol>
            </div>
        </div>

        <?php include ROOT.'/views/reclam2.php';?>

    </div>
    <div id="slideshowWrapper">
        <ul id="slideshow">
            <?php foreach ($newsSlider as $slide):?>
            <li> <div class="kek"><a class="" href="/news/<?php echo $slide['id'] ?>"><?php echo $slide['title'];?> </a></div>
                <?php if($slide['image']):?>
               <a href="/news/<?php echo $slide['id'] ?>"><img src="<?php echo $slide['image'];?>" width="640" height="480" border="0" alt="" /></a></li>
            <?php else:?>
                   <a href="/news/<?php echo $slide['id'] ?>"><img src="https://i.ytimg.com/vi/O-58MDm1eWI/maxresdefault.jpg" width="640" height="480" border="0" alt="" /></a></li>
                    <?php endif;?>
                <?php endforeach;?>
        </ul><br clear="all" />
    </div>

    <?php include '/../footer.php'?>
    
    <script src="../../js/jquery.js"></script>
    <script src="../../js/fadeSlideShow.js"></script>
    <script src="../../js/fadeSlideShow-minified.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#slideshow').fadeSlideShow();
        });
    </script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
</body>
</html>