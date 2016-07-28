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
    <a href="/admin/news/add"><button type="button" class="btn btn-success"><b>+</b> Добавить новость</button></a>
</div>

<br>
<br>

<div class="container">
    <div class="col-md-4">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Date</th>
                <th>Category</th>
                <th>Analitic</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($newsList as $newsItem): ?>
                <tr>
                    <td><?=$newsItem['id']?></td>
                    <td><?=$newsItem['title']?></td>
                    <td><?=$newsItem['content']?></td>
                    <td><?=$newsItem['image']?></td>
                    <td><?=$newsItem['tags']?></td>
                    <td><?=$newsItem['date']?></td>
                    <td><?=$newsItem['category']?></td>
                    <?php if($newsItem['analitic'] == 1): ?>
                    <td>+</td>
                    <?php else: ?>
                    <td></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '/../../footer.php';?>

</body>
</html>
