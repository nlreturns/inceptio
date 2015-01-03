<?php
include_once '../app/Bootstrap.php';
$bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\User as User;

/**
 * Test classes here
 * 
 */
$user = new User();

$user->setUserId(33);
$user->setUserName("Name");
$user->setUserPassword("test123");
$user->setUserType(1);

$user->addUser();

$test = $user->viewUser();
echo "View user dump";
var_dump($test);
echo "<br />";
$user->setUserName("Name2");

$user->editUser();

$test2 = $user->viewAllUsers();
echo "View all users dump";
var_dump($test2);
echo "<br />";


$test3 = $user->login();
echo "Login dump";
var_dump($test3);
echo "<br />";
$user->deleteUser();
//*/