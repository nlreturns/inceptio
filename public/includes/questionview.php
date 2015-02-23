<?php

use inceptio\app\classes\Answer as Answer;
use inceptio\app\classes\Question as Question;
use inceptio\app\classes\Chapter as Chapter;
use inceptio\app\classes\Report as Report;

$answer = new Answer;
$question = new Question;
$report = new Report;

if (isset($_GET['delete'])) {
    // delete all related reports first
    $reports = $report->viewAllReports();
    foreach ($reports as $data) {
        if ($data['answer_id'] == $_GET['delete']) {
            $report->setReportId($data['report_id']);
            $report->deleteReport();
        }
    }
    $answer->setAnswerId($_GET['delete']);
    $answer->deleteAnswer();
}
// save Report to question
if (isset($_POST['saveForm'])) {
    //set object data
    $report->setReportOutput($_POST['report_name']);
    $answer->setAnswerId($_GET['answer']);
    $answer->viewAnswer();
    $report->setAnswerId($_GET['answer']);
    $report->setReportType($_POST['report_type']);
    //save report
    $report->addReport();
    echo "Rapport toegevoegt.";
}

$question->setQuestionId($_GET['id']);
$data = $question->viewQuestion();

$answers = $answer->viewAllAnswers();

$reports = $report->viewAllReports();
?>

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
        td:nth-of-type(4):before { content: "Antwoorden"; }
        td:nth-of-type(5):before { content: "Sub-antwoorden"; }
    }
</style>

<table>
    <thead>
        <tr>
            <th>Vraag</th>
            <th>Uitleg</th>
            <th>Onderdeel</th>
            <th>Antwoorden</th>
            <th>Sub-antwoorden</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $data['question_name']; ?></td>
            <td><?= $data['question_help']; ?></td>
            <td>
                <?php
                $chapter = new Chapter;
                $chapter->setChapterId($data['chapter_id']);
                $chapter_data = $chapter->viewChapter();

                echo $chapter_data['chapter_name'];
                ?>
            </td>
            <td>
                <a href="index.php?page=answeradd&question=<?= $data['question_id']; ?>"><button>Antwoord toevoegen</button></a><br />
                <?php
                foreach ($answers as $answer) {
                    if ($answer['question_id'] == $data['question_id']) {
                        if ($answer['answer_sub'] == 0) {
                            echo $answer['answer_name'];

                            // check if answer has report
                            $has_report = FALSE;

                            foreach ($reports as $report) {
                                if ($report['answer_id'] == $answer['answer_id']) {
                                    echo " <a href='index.php?page=reportedit&id=" . $report['report_id'] . "'><button>Rapport aanpassen</button></a> ";
                                    $has_report = TRUE;
                                }
                            }

                            if ($has_report) {
                                
                            } else {
                                echo " <a href='index.php?page=reportadd&id=" . $answer['answer_id'] . "'><button>Rapport toevoegen</button></a> ";
                            }

                            echo "<a href='index.php?page=answeradd&question=" . $data['question_id'] . "&id=" . $answer['answer_id'] . "'><button>Sub-antwoord toevoegen</button></a> ";

                            echo "<a href='index.php?page=questionview&id=" . $_GET['id'] . "&delete=" . $answer['answer_id'] . "'><button>Verwijderen</button></a> <br />";
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                foreach ($answers as $answer) {
                    if ($answer['question_id'] == $data['question_id']) {
                        if ($answer['answer_sub'] != 0) {
                            echo $answer['answer_name'];

                            // check if answer has report
                            $has_report = FALSE;

                            foreach ($reports as $report) {
                                if ($report['answer_id'] == $answer['answer_id']) {
                                    echo " <a href='index.php?page=reportedit&id=" . $report['report_id'] . "'><button>Rapport aanpassen</button></a> ";
                                    $has_report = TRUE;
                                }
                            }

                            if ($has_report) {
                                
                            } else {
                                echo " <a href='index.php?page=reportadd&id=" . $answer['answer_id'] . "'><button>Rapport toevoegen</button></a> ";
                            }

                            echo "<a href='index.php?page=questionview&id=" . $_GET['id'] . "&delete=" . $answer['answer_id'] . "'><button>Verwijderen</button></a> <br />";
                        }
                    }
                }
                ?>
            </td>
        </tr>
    </tbody>
</table>



