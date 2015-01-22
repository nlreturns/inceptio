<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inceptio</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <?php
        include_once '../app/Bootstrap.php';
        $bootstrap = new \inceptio\app\Bootstrap();

        use inceptio\app\classes\User as User;

        $login = new User;

        if (isset($_GET['logout'])){
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
                <ul>
                    <li class="home"><a href="index.php">Home</a></li>
                    <li class="tutorials"><a href="index.php?page=userlist">Gebruikers</a></li>
                    <li class="about"><a href="index.php?page=clientlist">Bedrijven</a></li>
                    <li class="news"><a href="index.php?page=chapterlist">Hoofdstukken</a></li>
                    <li class="contact"><a href="#">Enquetes</a></li>
                    <li class="contact"><a href="#">Vragen</a></li>
                    <li class="contact"><a href="#">Antwoorden</a></li>
                    <li class="contact"><a href="#">Rapporten</a></li>
                    <li><a href="index.php?logout">Uitloggen</a></li>
                </ul>
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