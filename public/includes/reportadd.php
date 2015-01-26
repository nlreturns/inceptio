<?php

use inceptio\app\classes\Report as Report;
use inceptio\app\classes\Answer as Answer;
use inceptio\app\classes\Question as Question;

$question = new Question;
$report = new Report;
$answer = new Answer;

$answer->setAnswerId($_GET['id']);
$data = $answer->viewAnswer();

$question->setQuestionId($data['question_id']);
$data2 = $question->viewQuestion();

?>

<form action="index.php?page=questionview&id=<?= $data2['question_id']; ?>&answer=<?= $data['answer_id']; ?>" method="post">
    
    <div>
        <label class="desc" id="title1">Geselecteerde vraag</label>
        <?= $data2['question_name']; ?><br />
    </div>
    
    <div>
        <label class="desc" id="title1">Geselecteerd antwoord</label>
        <?= $data['answer_name']; ?><br />
    </div>
    
    <div>
        <label class="desc" id="title1" for="report_name">Rapport</label>
        <div>
            <textarea id="Field4" name="report_name" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
        </div>
    </div>

    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Toevoegen">
        </div>
    </div>

</form>