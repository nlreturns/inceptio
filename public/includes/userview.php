<?php

use inceptio\app\classes\User;

$user = new User;

$user->setUserId($_GET['id']);
$user->viewUser();

// view not used

?>

