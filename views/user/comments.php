<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/simplePagination.css">
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
              integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/style.css">
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <script type="text/javascript" src="../../js/jquery.simplePagination.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>News</title>
    </head>
<body style="padding-top: 20px">

<?php include '/../header.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row news">
            <?php include ROOT.'/views/reclam1.php';?>


            <div class="col-md-8">
                <h1>Комментарии <?php echo $comments[0]['name'];?>:</h1>
                <?php foreach ($comments as $comment): ?>
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
                        </div>
                    </div>
                <?php endforeach;?>

                <div class="forpars" ></div>
            </div>
        <?php include ROOT.'/views/reclam2.php';?>
        </div>
    </div>

    </div>
</div>

<script type="text/javascript">
    $(function() {
        $(".forpars").pagination({
            items: 15,
            itemsOnPage: 5,
            pages:5,
            currentPage: '<?php echo $page ?>' ,
            displayedPages: 1,
            hrefTextPrefix:'/comments/id-<?php echo $id?>/page-',
            cssStyle: 'dark-theme'

        });


    });
    </script>

<?php include '/../footer.php';?>

</body>
</html>