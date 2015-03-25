<?php

use inceptio\app\classes\Report as Report;

require "../../app/classes/Report.php";
require "../../libs/PhpWord/Autoloader.php";
\PhpOffice\PhpWord\Autoloader::register();

include_once "Sample_Header.php";

$report = new Report;

$report->setSurveyId($_POST['id']);

$reports = $report->viewFullReport();

// New Word Document
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->addTitleStyle(1, array('bold' => true), array('spaceAfter' => 240));

// New portrait section
$section = $phpWord->addSection();

// Simple text
$section->addTitle(htmlspecialchars('Groene scan rapport'), 1);    
    
// Define table style arrays
$styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>80);
$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');
// Define font style for first row
$fontStyle = array('bold'=>true, 'align'=>'center');
// Add table style
$phpWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
    
    $table = $section->addTable();
    
    $table->addRow(900);
    $table->addCell(2000)->addText("Vraag");
    $table->addCell(1000)->addText("Antwoord");
    $table->addCell(2000)->addText("Verbeterpunt");


foreach($reports as $text){
    
    $table->addRow(900);
    $table->addCell(2000)->addText(htmlspecialchars($text['question_id']));
    $table->addCell(1000)->addText(htmlspecialchars($text['answer_id']));
    $table->addCell(2000)->addText(htmlspecialchars($text['report_value']));
    /*
    $section->addText(htmlspecialchars($text['question_id']));
    $section->addText(htmlspecialchars($text['answer_id']));
    $section->addText(htmlspecialchars($text['report_value'])); */
}
//$section->addText(htmlspecialchars('Hello World!'));

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    
}
?>
<script>
    window.open("http://inceptio-studentenbedrijf.nl/analyse/public/includes/results/download.docx", '_blank');
</script>