<?php
include_once 'Sample_Header.php';

// New Word Document
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->addTitleStyle(1, array('bold' => true), array('spaceAfter' => 240));

// New portrait section
$section = $phpWord->addSection();

// Simple text
$section->addTitle(htmlspecialchars('Welcome to PhpWord'), 1);
$section->addText(htmlspecialchars('Hello World!'));

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
}
