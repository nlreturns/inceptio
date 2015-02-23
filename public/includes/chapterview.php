<?php

use inceptio\app\classes\Chapter as Chapter;
use inceptio\app\classes\Question as Question;

$chapter = new Chapter;
$question = new Question;

$chapter->setChapterId($_GET['id']);
$data = $chapter->viewChapter();

$questions = $question->viewAllQuestions();
?>

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
                    <?php
                    foreach ($questions as $question) {
                        if ($question['chapter_id'] == $data['chapter_id']) {
                            echo $question['question_name'] . "<a href='index.php?page=questionview&id=".$question['question_id']."'><button>Bekijken</button></a> <br />";
                        }
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
