<?php

use inceptio\app\classes\Answer as Answer;
use inceptio\app\classes\Question as Question;

$answer = new Answer;
$question = new Question;

if (isset($_POST['saveForm'])) {
    // set object data
    $answer->setAnswer_name($_POST['answer_name']);
    $answer->setAnswer_value($_POST['answer_value']);

    if (isset($_GET['id'])) {
        $answer->setAnswerSub($_GET['id']);
    }

    $question->setQuestionId($_GET['question']);
    $question->viewQuestion();
    $answer->setQuestionId($question);

    //add answer
    $answer->addAnswer();

    echo "Antwoord toegevoegd.";
}

$questions = $question->viewAllQuestions();
$answers = $answer->viewAllAnswers();
?>

<form action="index.php?page=answeradd&question=<?= $_GET['question']; ?><?php
if (isset($_GET['id'])) {
    echo "&id=" . $_GET['id'];
}
?>" method="post">
    <div>
        <div><h1>Antwoord toevoegen</h1></div>
    </div>
    <div>
        <label class="desc" id="title1" for="answer_name"><?php
            if (isset($_GET['id'])) {
                echo "Sub-";
            }
            ?>Antwoord</label>
        <div>
            <textarea rows="2" id="Field1" name="answer_name" type="text" class="field text fn" value="" tabindex="1"></textarea>
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
            <select <?php
                if (isset($_GET['id'])) {
                    echo "disabled";
                }
                ?> id="Field106" name="question" class="field select medium" tabindex="11"> 
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
<?php if (isset($_GET['id'])) { ?>
        <div>
            <label class="desc" id="title106" for="Field106">
                Antwoord
            </label>
            <div>
                <select disabled id="Field106" name="answer" class="field select medium" tabindex="11"> 
                    <?php
                    foreach ($answers as $answer) {
                        if ($answer['answer_id'] == $_GET['id']) {
                            echo "<option selected value='" . $answer['answer_id'] . "'>" . $answer['answer_name'] . "</option>";
                        } else {
                            echo "<option value='" . $answer['answer_id'] . "'>" . $answer['answer_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
<?php } ?>
    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Toevoegen">
        </div>
    </div>

</form>