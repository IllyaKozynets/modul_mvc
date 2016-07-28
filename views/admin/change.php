<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Admin</title>
</head>
<body style="padding-top: 40px">

<?php include '/../header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Добрый день, администратор!</h4>

            <br/>

            <p>Вам доступны такие возможности:</p>

            <br/>

            <ul>
                <li><a href="/admin/categories">Управление категориями</a></li>
                <li><a href="/admin/news">Управление новостями</a></li>
                <li><a href="/admin/comments">Управление комментариями</a></li>
                <li><a href="/admin/reclam">Добавить Рекламный блок</a></li>
                <div class="red-change">red</div>
                <div class="blue-change">red</div>

            </ul>

        </div>
    </div>
</section>

<?php include '/../footer.php';?>

</body>

</html>
