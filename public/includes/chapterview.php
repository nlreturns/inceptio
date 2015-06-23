<?php

use inceptio\app\classes\Chapter as Chapter;
use inceptio\app\classes\Question as Question;

$chapter = new Chapter;
$question = new Question;
$question_mover = new Question;

$chapter->setChapterId($_GET['id']);
$data = $chapter->viewChapter();

$questions_mover = $question_mover->viewAllQuestions(0, 1000);

if(isset($_GET['up'])){
    $question_mover->moveUp($_GET['up']);
    
    $question_mover->setQuestionId($_GET['up']);
    $up = $question_mover->viewQuestion();
    $down = $up['question_position']--;
    
    foreach($questions_mover as $idc){
        // move down if position is one less than the question moving up
        if($idc['question_position'] == $down){
            // move down
            $question_mover->moveDown($idc['question_id']);
        }
    }
}

$questions_mover = $question_mover->viewAllQuestions(0, 1000);

if(isset($_GET['down'])){
    $question_mover->moveDown($_GET['down']);
    
    $question_mover->setQuestionId($_GET['down']);
    $down = $question_mover->viewQuestion();
    $up = $down['question_position']++;
    
    foreach($questions_mover as $idc){
        // move down if position is one less than the question moving up
        if($idc['question_position'] == $up){
            // move down
            $question_mover->moveUp($idc['question_id']);
        }
    }
}

$questions = $question->viewAllQuestions(0, 1000);
?>

<script type="text/javascript">
    function deleteQuestion(id) {
        var password = prompt("U staat op het punt iets te verwijderen.\nGeef het wachtwoord op");
        if (password === "abcdefgh") {
            location.href = 'index.php?page=questionlist&delete=' + id;
        }
    }
</script>

<style type="text/css">
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "Onderdeelnaam"; }
        td:nth-of-type(2):before { content: "Beschrijving"; }
        td:nth-of-type(3):before { content: "Vragen"; }
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>Onderdeelnaam</th>
                <th>Beschrijving</th>
                <th>Vragen</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $data['chapter_name']; ?></td>
                <td><?= $data['chapter_description']; ?></td>
                <td>
                    <a href="index.php?page=questionadd&chapter=<?= $data['chapter_id']; ?>"><button>Vraag toevoegen</button></a> <br/>
                    <table border="0">
                    <?php
                    foreach ($questions as $question) {
                        if ($question['chapter_id'] == $data['chapter_id']) {
                            echo "<tr><td>";
                            echo $question['question_position'] . " " . $question['question_name'] . "</td><td><a href='index.php?page=questionview&id=".$question['question_id']."'><button>Bekijken</button></a> ";
                            echo "<button onclick='deleteQuestion(". $question['question_id'] .")'>Verwijderen</button>"; 
                            echo "<a href='index.php?page=questionedit&id=" . $question['question_id'] . "'><button>Aanpassen</button></a>";
                            echo "<a href='index.php?page=chapterview&id=" . $_GET['id'] . "&up=". $question['question_id'] ."'><button>Omhoog</button></a>";
                            echo "<a href='index.php?page=chapterview&id=" . $_GET['id'] . "&down=". $question['question_id'] ."'><button>Omlaag</button></a> <br />";
                            echo "</td>";
                        }
                    }
                    ?>
                    </table>
                </td>
                
                    <a href="index.php?page=questionedit&id=<?= $question['question_id'] ?>"><button>Aanpassen</button></a> 
            </tr>
        </tbody>
    </table>
