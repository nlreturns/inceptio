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
$phpWord->addTitleStyle(1, array('bold' => true, 'size' => 24, 'color' => '9d983d'), array('spaceAfter' => 240));




// New portrait section
$section = $phpWord->addSection();

//header
$header = $section->createHeader();
$table_head = $header->addTable();
$table_head->addRow();
$logo = '..\img\logo.png';
$table_head->addCell()->addImage($logo, array('align' => 'left', 'height' => 35));
$logo2 = '../img/logo-ga.png';
$table_head->addCell(10000)->addImage($logo2, array('align' => 'left', 'height' => 35));
$table_head->addCell();
$table_head->addCell(3000)->addText(date("d-m-Y"), array('align' => 'right'));


// footer
$footer = $section->createFooter();
$footer->addText("http://www.inceptio-studentenbedrijf.nl");
$footer->addPreserveText('Pagina {PAGE}');


// Simple text
$section->addTitle(htmlspecialchars('Duurzaamheidsanalyse'), 1);

// Define table style arrays
$styleTable = array('borderSize' => 0, 'borderColor' => '006699');
// Define font style for first row
$fontStyle = array('bold' => true, 'align' => 'center');

$questionStyle = array('bold' => true, 'italic' => true);

// Add table style
$phpWord->addTableStyle('myOwnTableStyle', $styleTable);

$table = $section->addTable();

$array = array("Test");

$question_nr = 1;

/** NEW REPORT -- INCLUDES ::
 * * Final layout 
 * * Subanswers hidden
 * * 
 */
foreach ($reports as $text) {

    // no parent = main question
    if ($text['parent_id'] == 0) {



        //$text['report_value'] = make_clickable($text['report_value']);
        // display question + answer
        $table->addRow();
        $table->addCell(8525)->addText($question_nr . ". " . $text['question_id'], $questionStyle);
        $table->addCell(2381)->addText($text['answer_id']);

        // display report
        $table->addRow();
        $report_cell = $table->addCell(9906, null, 2);

        $regex = '/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i';
        preg_match_all($regex, $text['report_value'], $matches);
        $urls = $matches[0];
        $replacement = "";

        $text['report_value'] = preg_replace($regex, $replacement, $text['report_value']);

        //$text['report_value'] = preg_replace("/\n/", "<br />", $text['report_value']);

        $textlines = explode("\n", $text['report_value']);
        
        //$report_cell->addText(array_shift($textlines));
        foreach($textlines as $line){
            //$report_cell->addTextBreak();
            $report_cell->addText($line);
        }

        //$report_cell->addText(htmlspecialchars($text['report_value']));

        // go over all links
        foreach ($urls as $url) {
            $report_cell->addLink($url, $url, array('color' => 'blue', 'underline' => true));
        }

        $question_nr++;
    }
}

/** OLD REPORT -- INCLUDES ::
 * * Subanswers \w  Report 
 * * Subanswers w\o Reports
 * * Different layout


  // dont display previous subanswers before first question
  // create a counter
  $ct = 0;

  foreach ($reports as $text) {

  // no parent = main question
  if ($text['parent_id'] == 0) {

  // if counter > 0, display
  if ($ct > 0) {
  // check if not empty
  if(count($array) == 0){

  }else{
  // display the last array of subanswers before diplaying new question
  $table->addRow();
  $table->addCell(3000)->addText("Overige subantwoorden: ");
  foreach ($array as $sub) {
  $table->addCell(1000)->addText($sub);
  }
  }
  }

  // higher counter
  $ct++;

  // display question
  $table->addRow();
  $table->addCell(9906)->addText($text['question_id'], $questionStyle);

  unset($array);

  $array = array();

  // display main answer
  $table->addRow();
  $table->addCell(2381)->addText(htmlspecialchars($text['answer_id']));
  $table->addCell(8525)->addText(htmlspecialchars($text['report_value']));
  } else {
  //if answer = subanswer & report is empty
  if ($text['report_value'] == "") {
  array_push($array, $text['answer_id']);
  } else {
  // echo all answers
  $table->addRow();
  $table->addCell(2381)->addText(htmlspecialchars($text['answer_id']));
  $table->addCell(8525)->addText(htmlspecialchars($text['report_value']));
  }
  }
  }

  if(!count($array) == 0){
  // last subanswer array displayed
  $table->addRow();
  $table->addCell(3000)->addText("Overige subantwoorden: ");
  foreach ($array as $sub) {
  $table->addCell(1500)->addText($sub);
  }
  }

 */
// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    
}
?>
<script>
    //window.open("http://inceptio-studentenbedrijf.nl/analyse/public/includes/results/download.docx", '_blank');
</script>