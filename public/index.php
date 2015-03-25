<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inceptio</title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>
    <body>
        <?php
        include_once '../app/Bootstrap.php';
        $bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\User as User;

$login = new User;

        if (isset($_GET['logout'])) {
            unset($_SESSION);
            session_destroy();
        }

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $login->setUserName($_POST['username']);
            $login->setUserPassword($_POST['password']);
            $login->login();
        }

        // check login status
        // if logged in (session created)
        if ($login->isloggedin()) {




            // header AKA menu
            ?>
            <div class="nav">
                <a href="http://inceptio-studentenbedrijf.nl/wordpress/home/" target="_blank">
                    <div class="nav-logo">
                        <img src="img/logo.png" alt="logo Inceptio">
                        <img src="img/logo-ga.png" alt="logo Inceptio">
                    </div>
                </a>
                <div class="nav-bar">
                    <ul>
                        <li class="home"><a href="index.php">Home</a></li>
                        <li class="tutorials"><a href="index.php?page=enquetelist">Analyse</a></li>
                        <li class="tutorials"><a href="index.php?page=userlist">Gebruikers</a></li>
                        <li class="about"><a href="index.php?page=clientlist">Bedrijven</a></li>
                        <li class="news"><a href="index.php?page=chapterlist">Onderdelen</a></li>
                        <li class="contact"><a href="index.php?page=questionlist">Vragen</a></li>
                        <li><a href="index.php?logout">Uitloggen</a></li>
                    </ul>
                </div>
            </div>
            <br />
            <?php
            // change page depending on given url
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case "userlist":
                        include 'includes/userlist.php';
                        break;
                    case "useradd":
                        include 'includes/useradd.php';
                        break;
                    case "userview":
                        include 'includes/userview.php';
                        break;
                    case "useredit":
                        include 'includes/useredit.php';
                        break;
                    case "clientlist":
                        include 'includes/clientlist.php';
                        break;
                    case "clientadd":
                        include 'includes/clientadd.php';
                        break;
                    case "clientedit":
                        include 'includes/clientedit.php';
                        break;
                    case "chapterlist":
                        include 'includes/chapterlist.php';
                        break;
                    case "chapteradd":
                        include 'includes/chapteradd.php';
                        break;
                    case "chapteredit":
                        include 'includes/chapteredit.php';
                        break;
                    case "chapterview":
                        include 'includes/chapterview.php';
                        break;
                    case "questionlist":
                        include 'includes/questionlist.php';
                        break;
                    case "questionadd":
                        include 'includes/questionadd.php';
                        break;
                    case "questionedit":
                        include 'includes/questionedit.php';
                        break;
                    case "questionview":
                        include 'includes/questionview.php';
                        break;
                    case "answerlist":
                        include 'includes/answerlist.php';
                        break;
                    case "answeradd":
                        include 'includes/answeradd.php';
                        break;
                    case "answeredit":
                        include 'includes/answeredit.php';
                        break;
                    case "answerview":
                        include 'includes/answerview.php';
                        break;
                    case "reportadd":
                        include 'includes/reportadd.php';
                        break;
                    case "reportedit":
                        include 'includes/reportedit.php';
                        break;
                    case "enqueteadd":
                        include 'includes/enqueteadd.php';
                        break;
                    case "enquete":
                        include 'includes/enquete.php';
                        break;
                    case "enquetelist":
                        include 'includes/enquetelist.php';
                        break;
                    case "reportview":
                        include 'includes/reportview.php';
                        break;
                    case "reportgenerate":
                        include 'includes/reportgenerate.php';
                        break;
                    case "enquetedownload":
                        include 'includes/enquetedownload.php';
                        break;
                }
            } else {
                include 'includes/mainpage.php';
            }

            // if not logged in
        } else {
            ?>
            <form name="login-form" class="login-form" action="index.php" method="post">

                <div class="header">
                    <h1>Welkom</h1>
                    <span>Log hier in om verder te gaan</span>
                </div>

                <div class="content">
                    <input name="username" type="text" class="input username" placeholder="Username" />
                    <div class="user-icon"></div>
                    <input name="password" type="password" class="input password" placeholder="Password" />
                    <div class="pass-icon"></div>		
                </div>

                <div class="footer">
                    <input type="submit" class="button" value="Login" />
                </div>

            </form>
            <?php
        }
        ?>

    </body>
</html>