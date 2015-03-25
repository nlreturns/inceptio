<?php
include_once '../app/Bootstrap.php';
$bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\Question as Question;
use inceptio\app\classes\Chapter as Chapter;
use inceptio\app\classes\Answer as Answer;
use inceptio\app\classes\Report as Report;

$report = new Report;
$answer = new Answer;
$chapter = new Chapter;
$question = new Question;

if(isset($_GET['number'])){
    $page = $_GET['number'];
}else{
    $page = 0;
}

if (isset($_GET['delete'])) {
    // set id
    $question->setQuestionId($_GET['delete']);
    // delete answers first
    $answers = $answer->viewAllAnswers();
    foreach ($answers as $answer) {
        if ($answer['question_id'] == $_GET['delete']) {

            // delete reports first
            $reports = $report->viewAllReports();
            foreach ($reports as $report) {
                if ($report['answer_id'] == $answer['answer_id']) {
                    $delete_report = new Report;
                    $delete_report->setReportId($report['report_id']);
                    $delete_report->deleteReport();
                }
            }

            $delete = new Answer;
            $delete->setAnswerId($answer['answer_id']);
            $delete->deleteAnswer();
        }
    }

    // delete question
    $question->deleteQuestion();

    echo "Vraag verwijdert.";
}

$chapters = $chapter->viewAllChapters();
$questions = $question->viewAllQuestions($page, 30);

$nextpage = $page + 1;
$prevpage = $page - 1;

$allquestions = $question->viewAllQuestions(0, 1000000);

$total = count($allquestions);
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
        td:nth-of-type(1):before { content: "Vraag"; }
        td:nth-of-type(2):before { content: "Uitleg"; }
        td:nth-of-type(3):before { content: "Onderdeel"; }
        td:nth-of-type(4):before { content: "Acties"; }
    }
</style>


<div id="options">
    <a href="index.php?page=questionadd"><button>Toevoegen</button></a> <br />
</div>

<table>
    <thead>
        <tr>
            <th>Vraag</th>
            <th>Uitleg</th>
            <th>Onderdeel</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($questions as $question) {
            ?>
            <tr>
                <td><?= $question['question_name'] ?></td>
                <td><?= $question['question_help']; ?></td>
                <?php
                $has_chapter = FALSE;
                foreach ($chapters as $chapter) {
                    if ($question['chapter_id'] == $chapter['chapter_id']) {
                        echo "<td>" . $chapter['chapter_name'] . "</td>";
                        $has_chapter = TRUE;
                    }
                }
                if (!$has_chapter) {
                    echo "<td>Geen hoofdstuk toegewezen</td>";
                }
                ?>

                <td>
                    <a href="index.php?page=questionedit&id=<?= $question['question_id'] ?>"><button>Aanpassen</button></a> 
                    <button onclick="deleteQuestion(<?= $question['question_id'] ?>)">Verwijderen</button> 
                    <a href="index.php?page=questionview&id=<?= $question['question_id'] ?>"><button>Bekijken</button></a>
                </td>
            </tr>


            <?php
        }
        ?>
    </tbody>
</table>
<?php 
if(isset($_GET['number']) && $_GET['number'] >= 1){
?>
<a style="color: black" href="index.php?page=questionlist&number=<?= $prevpage; ?>"><i class="fa fa-caret-left fa-4x"></i></a>
<?php }
if($total > $nextpage * 30){
?>
<a style="color: black" href="index.php?page=questionlist&number=<?= $nextpage; ?>"><i class="fa fa-caret-right fa-4x" style="float: right"></i></a>
<?php
}
?>
