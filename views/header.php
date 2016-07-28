<head>
    <link type='text/css' href='../css/basic.css' rel='stylesheet' media='screen' />
    <script type="text/javascript" src="../js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.simplePagination.js"></script>
    <link type="stylesheet" href="../css/style_new.css">
    <script src="../js/jquery.arcticmodal.js"></script>
    <link rel="stylesheet" href="../css/jquery.arcticmodal.css">
    <link rel="stylesheet" href="../css/simple.css">
    <script src="http://yandex.st/jquery/cookie/1.0/jquery.cookie.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#search").keyup(function(){
                var search = $("#search").val();
                $.ajax({
                    type: "POST",
                    url: "../models/Finder.php",
                    data: {"search": search},
                    cache: false,
                    success: function(response){
                        $("#resSearch").html(response);
                    }
                });
                return false;
            });
        });
    </script>
    <script>
        (function($) {
            $(function() {
                if (!$.cookie('smartCookies')) {

                    function getWindow(){
                        $('.offer').arcticmodal({
                            closeOnOverlayClick: false,
                            closeOnEsc: true
                        });
                    };

                    setTimeout (getWindow, 12000);
                }

                $.cookie('smartCookies', true, {
                    expires: 180,
                    path: '/'
                });

            })
        })(jQuery)
    </script>

</head>

<div class="modalInner" style="display: none; position: relative;">
    <section class="offer">
        <div class='modalInner_close arcticmodal-close' >закрыть</div>
        <h1>Подпишитесь на новостную рассылку</h1>
        <form action="">
             <input type="text" placeholder="введите E-mail"> <input type="text" placeholder="Введите имя и фамилию"><br>
            <button class="but modalInner_close arcticmodal-close">Подисаться</button>
        </form>
    </section>


</div>
<div style="display: none; padding: 10px;" id="exit_content">
    <h1>Are you sure that you want to leave this site?</h1><h3>Thanks for visiting us!</h3><br />
</div>
<div id="header">

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" >
            <div class="navbar-header" >
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Magazine.com</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/find">Поиск</a></li>
                    <?php if (!isset($_SESSION['user'])):?>
                    <li><a href="/user/register">Регистрация</a></li>
                    <li><a href="/user/login">Авторизация</a></li>
                    <?php else: ?>
                    <li><a href="/user/logout">Выход</a></li>
                    <?php endif; ?>

                    <li><form style="padding-top: 15px" action="search.php" method="post" name="form" onsubmit="return false;">
                        <p style="color: #EAEAEA">
                            <label>Живой поиск:</label>
                            <input name="search" type="text" id="search" style="color: #130924" placeholder="Начните вводить запрос">
                            <small>Вводите на английском языке</small>
                        </p>
                    </form>
                    <div id="resSearch" style="background-color: #EAEAEA"></div>
                        </li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
   

</div>