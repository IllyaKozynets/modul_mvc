<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Admin - Categories</title>
</head>
<body style="padding-top: 40px">

<?php include '/../../header.php'; ?>
<br>
<br>

<div style="padding-left: 20px">
    <a href="/admin"><button type="button" class="btn btn-info"><b><</b> Администратор - главная</button></a>
    <br>
    <br>
    <a href="/admin/categories/add"><button type="button" class="btn btn-success"><b>+</b> Добавить категорию</button></a>
</div>

<br>
<br>

<div class="container">
    <div class="col-md-4">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($catList as $catItem): ?>
                <tr>
                    <td><?=$catItem['id']?></td>
                    <td><?=$catItem['category']?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '/../../footer.php';?>

</body>
</html>
