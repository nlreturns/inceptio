<?php
include_once '../app/Bootstrap.php';
$bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\User as User;
use inceptio\app\classes\Survey as Survey;
use inceptio\app\classes\Report as Report;
use inceptio\app\classes\Question as Question;
use inceptio\app\classes\Client as Client;
use inceptio\app\classes\Chapter as Chapter;
use inceptio\app\classes\Answer as Answer;

/**
 * Making calls to basic
 * functionality to test classes
 * both responsive and technical
 */

/**
 * order of testing is done highest level -> lowest level
 * used ID for retreival and editing, will be 1 ( in case of
 *                                                jumping index )
 */
echo "-----------------------<br />";
echo "USERS <br />";
$user = new User();
$user->setUserId(1);
// Setting data
echo "Setting data";
$user->setUserName("User name");
$user->setUserPassword("User password");
$user->setUserType(1);
echo "<br />";
// Add user
echo "user->add";
$user->addUser();
echo "<br />";

// new data for User1
echo "user->edit";
$user->setUserName("Usah_Name");
$user->editUser();
echo "<br />";

echo "All users: ";
var_dump($user->viewAllUsers());
echo "<br />";

echo "user 1: ";
var_dump($user->viewUser());
echo "<br />";

echo "-----------------------<br />";

echo "CLIENTS <br />";
$client = new Client();
$client->setUserId(1);
// Setting data
echo "Setting data";
$client->setClientAddress("Dem address 21");
$client->setClientName("Meine Name");
$client->setClientPhone("Generic01230123");
$client->setUserId($user);
echo "<br />";
// add Client
echo "client->add";
$client->addClient();
echo "<br />";

//new data for Client1
echo "client->edit";
$client->setClientAddress("KT Bul. 12a");
$client->editClient();
echo "<br />";