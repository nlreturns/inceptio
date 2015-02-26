<?php

use inceptio\app\classes\Report as Report;
use inceptio\app\classes\Answer as Answer;
use inceptio\app\classes\Question as Question;

$report = new Report;
$answer = new Answer;
$question = new Question;

$report->setReportId($_GET['id']);
$data = $report->viewReport();

if (isset($_POST['saveForm'])) {
    $report->setReportOutput($_POST['report_name']);
    $report->setAnswerId($data['answer_id']);
    
    $report->editReport();
    
    echo "Rapport aangepast.";
}


$report->setReportId($_GET['id']);
$data = $report->viewReport();
$answer->setAnswerId($data['answer_id']);
$data2 = $answer->viewAnswer();
$question->setQuestionId($data2['question_id']);
$data3 = $question->viewQuestion();


?>


<form action="index.php?page=reportedit&id=<?= $_GET['id'] ?>" method="post">
    <div>
        <div><h1>Rapport aanpassen</h1></div>
    </div>
    <div>
        <label class="desc" id="title1">Geselecteerde vraag</label>
        <?= $data3['question_name']; ?><br />
    </div>

    <div>
        <label class="desc" id="title1">Geselecteerd antwoord</label>
        <?= $data2['answer_name']; ?><br />
    </div>

    <div>
        <label class="desc" id="title1" for="report_name">Rapport</label>
        <div>
            <textarea id="Field4" name="report_name" spellcheck="true" rows="10" cols="50" tabindex="4"><?= $data['report_value']; ?></textarea>
        </div>
    </div>

    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Aanpassen">
        </div>
    </div>

</form>