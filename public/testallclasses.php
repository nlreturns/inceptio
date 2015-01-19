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
$client->setUserId($user);
// Setting data
echo "Setting data";
$client->setClientId(1);
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

// view client
echo "View client 1: ";
var_dump($client->viewClient());
echo "<br />";

// all clients
echo "All clients: ";
var_dump($client->viewAllClients());
echo "<br />";

echo "-----------------------<br />";

echo "CHAPTERS <br />";
$chapter = new Chapter();

//setting data
echo "Setting data";
$chapter->setChapterDescription("Beschrijving van de hoofdstuk");
$chapter->setChapterId(1);
$chapter->setChapterName("ChapterNaam");
echo "<br />";

// add Chapter
echo "Add chapter";
$chapter->addChapter();
echo "<br />";

// edit Chapter
echo "Edit Chapter";
$chapter->setChapterName("ChapterNaam2");
$chapter->editChapter();
echo "<br />";

// view Chapter
echo "View Chapter :";
var_dump($chapter->viewChapter());
echo "<br />";

// view all chapters
echo "All chapters: ";
var_dump($chapter->viewAllChapters());
echo "<br />";

echo "-----------------------<br />";

echo "QUESTIONS <br />";
$question = new Question();

//set data
echo "Set data";
$question->setQuestionHelp("www.google.com");
$question->setQuestionId(1);
$question->setQuestionName("Hoeveel vingers heb jij?");
$question->setQuestionTypeId(1);
$question->setChapterId($chapter);
echo "<br />";

// add question
echo "Add Question";
$question->addQuestion();
echo "<br />";

// edit question
echo "Edit question";
$question->setQuestionName("Hoeveel tenen heb jij?");
$question->editQuestion();
echo "<br />";

// view question
echo "View Question: ";
var_dump($question->viewQuestion());
echo "<br />";

// view all questions
echo "View all Questions: ";
var_dump($question->viewAllQuestions());
echo "<br />";

echo "-----------------------<br />";

echo "ANSWERS <br />";
$answer = new Answer();

// set data
echo "Set data";
$answer->setAnswerId(1);
$answer->setAnswer_name("1 teen");
$answer->setAnswer_value(10);
$answer->setQuestionId($question);
echo "<br />";

// add Answer
echo "Add answer";
$answer->addAnswer();
echo "<br />";

// edit Answer
echo "Edit answer";
$answer->setAnswer_name("2 tenen");
$answer->editAnswer();
echo "<br />";

// view answer
echo "View Answer: ";
var_dump($answer->viewAnswer());
echo "<br />";

echo "View all Answers: ";
var_dump($answer->viewAllAnswers());
echo "<br />";

echo "-----------------------<br />";

echo "Reports <br />";
$report = new Report();

// set data
echo "Set data";
$report->setAnswerId(1);
$report->setReportId(1);
$report->setReportOutput("Probeer meer tenen te groeien.");
echo "<br />";

// add report
echo "add report";
$report->addReport();
echo "<br />";

// edit report
echo "Edit report";
$report->setReportOutput("Groei meer tenen.");
$report->editReport();
echo "<br />";

// view report
echo "View Report: ";
var_dump($report->viewReport());
echo "<br />";

// view all reports
echo "View all reports: ";
var_dump($report->viewAllReports());
echo "<br />";



    