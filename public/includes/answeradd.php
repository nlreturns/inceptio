<?php

use inceptio\app\classes\Answer as Answer;
use inceptio\app\classes\Question as Question;

$answer = new Answer;
$question = new Question;

if (isset($_POST['saveForm'])) {
    // set object data
    $answer->setAnswer_name($_POST['answer_name']);
    $answer->setAnswer_value($_POST['answer_value']);
    $question->setQuestionId($_POST['question']);
    $question->viewQuestion();
    $answer->setQuestionId($question);
    
    //add answer
    $answer->addAnswer();

    echo "Antwoord toegevoegt.";
}

$questions = $question->viewAllQuestions();
?>

<form action="index.php?page=answeradd&question<?= $_GET['question']; ?>" method="post">
    <div>
        <label class="desc" id="title1" for="answer_name">Antwoord</label>
        <div>
            <input id="Field1" name="answer_name" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="answer_value">Antwoord-punten</label>
        <div>
            <input id="Field1" name="answer_value" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title106" for="Field106">
            Vraag
        </label>
        <div>
            <select id="Field106" name="question" class="field select medium" tabindex="11"> 
                <?php
                foreach ($questions as $question) {
                    if ($question['question_id'] == $_GET['question']) {
                        echo "<option selected value='" . $question['question_id'] . "'>" . $question['question_name'] . "</option>";
                    } else {
                        echo "<option value='" . $question['question_id'] . "'>" . $question['question_name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Toevoegen">
        </div>
    </div>

</form>