<?php

use inceptio\app\classes\Question as Question;
use inceptio\app\classes\Chapter as Chapter;

$chapter = new Chapter;
$question = new Question;

if (isset($_POST['saveForm'])) {
    // set object data
    $question->setQuestionHelp($_POST['question_help']);
    $question->setQuestionName($_POST['question_name']);
    $question->setQuestionTypeId(1);

    if ($_POST['chapter'] != 0) {
        $chapter->setChapterId($_POST['chapter']);
        $question->setChapterId($chapter);
    }

    // add question
    $question->addQuestion();

    echo "Vraag toegevoegd.";
}

$chapters = $chapter->viewAllChapters();
$questions = $question->viewAllQuestions();
?>

<form action="index.php?page=questionadd<?php if(isset($_GET['chapter'])) { echo "&chapter=" . $_GET['chapter'];  } ?>" method="post">
    <div>
        <div><h1>Vraag aanmaken</h1></div>
    </div>
    <div>
        <label class="desc" id="title1" for="question_name">Vraag</label>
        <div>
            <input id="Field1" name="question_name" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        
        <label class="desc" id="title1" for="question_help">Hulp <button type="button">?</button></label>
        <div>
            <input id="Field1" name="question_help" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title106" for="Field106">
            Onderdeel
        </label>
        <div>
            <select id="Field106" name="chapter" class="field select medium" tabindex="11"> 
                <option value="0">Geen</option>
                <?php
                foreach ($chapters as $chapter) {
                    if (isset($_GET['chapter'])) {
                        if ($chapter['chapter_id'] == $_GET['chapter']) {
                            echo "<option selected value='" . $chapter['chapter_id'] . "'>" . $chapter['chapter_name'] . "</option>";
                        } else {
                            echo "<option value='" . $chapter['chapter_id'] . "'>" . $chapter['chapter_name'] . "</option>";
                        }
                    } else {
                        echo "<option value='" . $chapter['chapter_id'] . "'>" . $chapter['chapter_name'] . "</option>";
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