<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Admin - Add a new category</title>
</head>
<body style="padding-top: 40px">

<?php include '/../../header.php'; ?>
<br>
<br>

<div style="padding-left: 20px">
    <a href="/admin/news"><button type="button" class="btn btn-info"><b><</b> Администратор - новости</button></a>
</div>

<br>

<div class="container">
    <div class="col-md-4">
        <h2>Добавление новости</h2>
        <form method="post">
            <label>Category:</label><p>  </p><input type="text" name="category"><br>(Введите категорию,которая уже есть на сайте или оставьте новость без катигории)<br><br>
            <label>Title:</label><p></p><input type="text" name="title"><br><br>
            <label>Content:</label><p></p><textarea name="content"></textarea><br><br>
            <label>Image:</label><p></p><input type="text" name="image"><br><br>
            <label>Tags:</label><p></p><input type="text" name="tags"><br><br>
            <button type="submit" name="submit">Добавить</button>
        </form>
    </div>
</div>

<br>
<?php include '/../../footer.php';?>

</body>
</html>
