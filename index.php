<?php 
session_start();

//error_reporting( E_ERROR ); //скрываем Notice и Warning
ini_set('display_errors', 1); //выводим ошибки

require_once "models/auth.php";
require_once "models/comments.php";

require_once "models/Database.php";
require_once "models/Insert.php";
require_once "models/Select.php";

require_once "controllers/UserController.php";
//require_once "views/layout.php";
require_once "controllers/SavecommentController.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LightIT</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>
<body>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <?php
            if(!isset($_SESSION['user'])){
                echo $link;
                require_once 'views/login.php';
            } else {

                require_once 'views/send.php';
            }
            ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
    </div>

    <div class="container-fluid">
        <ul id="commentRoot">
            <?php echo $comments;  ?>
            <li id="newComment">
                <div class="commentContent">
                    <div id="cancelComment">X</div>
                    <h6> <?php echo $_SESSION['user']['name'] ?> </h6>
                    <div class="comment">
                        Комментарий:
                        <textarea name="newCommentText" maxlength="60"></textarea>
                    </div>
                    <button>Отправить</button>
                    <!--                    <img class="loader" src="loader.gif">-->
                </div>
            </li>
        </ul>
    </div>
    <!--    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>-->
<!--    <script type="text/javascript" src="js/bootstrap.min.js"></script>-->
<!--    <script type="text/javascript" src="js/npm.js"></script>-->
    <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="js/comment.js"></script>

</body>
</html>



