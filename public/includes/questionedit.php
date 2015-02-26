<?php

use inceptio\app\classes\Question as Question;
use inceptio\app\classes\Chapter as Chapter;

$question = new Question;
$chapter = new Chapter;

$question->setQuestionId($_GET['id']);
$data = $question->viewQuestion();

if (isset($_POST['saveForm'])) {
    $question->setQuestionHelp($_POST['question_help']);
    $question->setQuestionName($_POST['question_name']);
    
    $chapter->setChapterId($_POST['chapter']);
    $chapter->viewChapter();
    
    $question->setChapterId($chapter);

    $question->editQuestion();
    echo "Vraag aangepast.";
}

$data = $question->viewQuestion();

$questions = $question->viewAllQuestions();
$chapters = $chapter->viewAllChapters();
?>


<form action="index.php?page=questionedit&id=<?= $_GET['id'] ?>" method="post">
    <div>
        <div><h1>Vraag aanpassen</h1></div>
    </div>
    <div>
        <label class="desc" id="title1" for="question_name">Vraag</label>
        <div>
            <input id="Field1" name="question_name" type="text" class="field text fn" value="<?= $question->getQuestionName(); ?>" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="question_help">Uitleg</label>
        <div>
            <input id="Field1" name="question_help" type="text" class="field text fn" value="<?= $question->getQuestionHelp(); ?>" size="8" tabindex="1">
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
                    if ($chapter['chapter_id'] == $data['chapter_id']) {
                        echo "<option selected value='" . $chapter['chapter_id'] . "'>" . $chapter['chapter_name'] . "</option>";
                    } else {
                        echo "<option value='".$chapter['chapter_id']."'>".$chapter['chapter_name']."</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Aanpassen">
        </div>
    </div>

</form>