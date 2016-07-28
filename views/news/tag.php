<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tag News</title>


</head>
<body style="padding-top: 20px">

<?php include ROOT.'/views/header.php';?>

<div class="container-fluid content">
    <div class="row">
        <?php include ROOT.'/views/reclam1.php';?>

        <div class="col-md-8">
            <h1 ><?php echo $tag;?></h1>
            <?php foreach ($newsList as $newsItem): ?>
                <div class="inline">
                    <h2><a href="/news/<?php echo $newsItem['id'] ?>"><?php echo $newsItem['title']; ?></a></h2>

                    <strong>Date:</strong> <?php echo $newsItem['date']; ?>

                    <br>
                    <a href="/news/<?php echo $newsItem['id'] ?>"><img src="<?php echo $newsItem['image'] ?>"
                                                                       style="width: 150px;height: 150px"/></a>

                    <div class="category">Tags:<br>
                        <?php foreach ($newsItem['tags'] as $tag): ?>
                            <h4><a class="label label-info" href="/tags/<?php echo $tag ?>"><?php echo $tag ?></a></h4>
                        <?php endforeach; ?>
                    </div>


                    <div class="button float_r"><a href="/news/<?php echo $newsItem['id'] ?>" class="more">Read
                            more</a>
                    </div>
                    <div class="cleaner"></div>

                </div>
            <?php endforeach; ?>
        </div>

    <?php include ROOT.'/views/reclam2.php';?>

</div>
</div>

<?php include '/../footer.php';?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
</body>
</html>