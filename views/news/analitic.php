<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/simplePagination.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tripod Blog Theme - Free CSS Templates</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.simplePagination.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>

</head>
<body style="padding-top: 20px">
<?php include ROOT.'/views/header.php';?>

<div  class="container-fluid content">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <p>Аналитика</p>

            </div>
        </div>
    </div>
    <div class="row">
        <?php include ROOT.'/views/reclam1.php';?>
        </div>

        <div class="col-md-8">
            <?php foreach ($newsList as $newsItem): ?>
                <div class="inline">
                    <h2><a href="/news/<?php echo $newsItem['id'] ?>"><?php echo $newsItem['title']; ?></a></h2>

                    <strong>Date:</strong> <?php echo $newsItem['date']; ?>

                    <br>
                    <a href="/news/<?php echo $newsItem['id'] ?>"><img src="<?php echo $newsItem['image'] ?>"
                                                                       style="width: 150px;height: 150px"/></a>

                    <div class="category">Tags:<br>
                        <?php foreach ($newsItem['tags'] as $tag): ?>
                            <a href="/tags/<?php echo $tag ?>"><?php echo $tag ?></a>
                        <?php endforeach; ?>
                    </div>


                    <div class="button float_r"><a href="/news/<?php echo $newsItem['id'] ?>" class="more">Read more</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="forpars">

            </div>
        </div>


    <?php include ROOT.'/views/reclam2.php';?>

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
            hrefTextPrefix:'/category/analytics/',
            cssStyle: 'dark-theme'

        });


    });



</script>

<?php include '/../footer.php';?>

</body>
</html>