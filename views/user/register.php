<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register</title>


</head>
<body style="padding: 20px">

<?php include ROOT.'/views/header.php';?>

<div class="content">

    <?php if($_SESSION['user']):?>
    <h1>Вы уже авторизованы</h1>
<?php else:?>
 <h1>РЕГИСТРЭЙШН</h1>
    <?php if($result):?>
    <p>Вы зарегестрировались</p>
    <?php else:?>
    <?php if (isset($errors)&& is_array($errors)):?>
    <ul>
        <?php foreach ($errors as $error):?>
        <li><?php echo $error;?></li>
        <?php endforeach;?>
    </ul>
    <?php endif;?>

    <form action="" method="post">
        <input type="text" name="name" placeholder="Имя" value="<?php echo $name?>"/><br/>
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email?>"/><br/>
        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password?>"><br/>
        <input class="btn btn-lg btn-info" type="submit" name="submit" value="Регистрация">
    </form>
<?php endif;?>
    <?php endif;?>


</div>

<?php include '/../footer.php'?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>