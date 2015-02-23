<?php

use inceptio\app\classes\Report as Report;
use inceptio\app\classes\Client as Client;

$client = new Client;
$report = new Report;

$report->setSurveyId($_GET['id']);

if(isset($_POST['report'])){
    if(isset($_GET['report'])){
        $report->setReportId($_GET['report']);
        $report->setReportOutput($_POST['report']);
        $report->editFinalReport();
    }
}

$clients = $client->viewAllClients();
$reports = $report->viewFullReport();
?>

<style type="text/css">
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "Vraag"; }
        td:nth-of-type(2):before { content: "Antwoord"; }
        td:nth-of-type(3):before { content: "Opmerking"; }
        th:nth-of-type(4):before { content: "Rapport"; }
    }
</style>

<table>
    <thead>
        <tr>
            <th>Vraag</th>
            <th>Antwoord</th>
            <th>Opmerking</th>
            <th>Rapport</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reports as $report) { ?>
    <form action="index.php?page=reportview&id=<?= $_GET['id'] ?>&report=<?= $report['survey_question_answer_id'] ?>" method="post">
            <tr>
                <td><?= $report['question_id'] ?></td>
                <td><?= $report['answer_id'] ?></td>
                <td><?= $report['comment'] ?></td>
                <td><textarea id="Field4" name="report" spellcheck="true" rows="10" cols="50" tabindex="4"><?= $report['report_value'] ?></textarea>
                <input type="submit" value="Aanpassen" />
                </td>
            </tr>
    </form>
        <?php } ?>
    </tbody>
</table>



