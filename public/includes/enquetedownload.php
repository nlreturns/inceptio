<?php
include_once 'Sample_Header.php';

use inceptio\app\classes\Report;

$report = new Report;

$report->setSurveyId($_GET['id']);

$reports = $report->viewFullReport();

// New Word Document
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->addTitleStyle(1, array('bold' => true), array('spaceAfter' => 240));

// New portrait section
$section = $phpWord->addSection();

// Simple text
$section->addTitle(htmlspecialchars('Groene scan rapport'), 1);
foreach($reports as $text){
    //$section->addText($text['question_id']);
    $section->addText(htmlspecialchars($text['answer_id']));
    $section->addText(htmlspecialchars($text['report_value']));
}
//$section->addText(htmlspecialchars('Hello World!'));

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    
}
