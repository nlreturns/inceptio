<?php
include_once '../app/Bootstrap.php';
$bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\User as User;
use inceptio\app\classes\Client as Client;
use inceptio\app\classes\Survey as Survey;

$survey = new Survey;
$user = new User;
$client = new Client;


$surveys = $survey->viewAllSurveys();
$users = $user->viewAllUsers();
$clients = $client->viewAllClients();
?>

<style type="text/css">
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "Bedrijf"; }
        td:nth-of-type(2):before { content: "Afnemer"; }
        td:nth-of-type(3):before { content: "Status"; }
        td:nth-of-type(4):before { content: "Acties"; }
    }
</style>


<div id="options">
    <a href="index.php?page=enqueteadd"><button>Toevoegen</button></a> <br />
</div>

<table>
    <thead>
        <tr>
            <th>Bedrijf</th>
            <th>Afnemer</th>
            <th>Status</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($surveys as $survey) {
            ?>
            <tr>
                <td><?php
                    foreach ($clients as $client) {
                        if ($client['client_id'] == $survey['survey_participant']) {
                            echo $client['client_name'];
                        }
                    }
                    //echo $survey['survey_participant'];
                    ?></td>
                <td><?php
                    foreach ($users as $user) {
                        if ($user['user_id'] == $survey['survey_author']) {
                            echo $user['user_name'];
                        }
                    }
                    ?></td>
                <td><?php
                    switch ($survey['survey_status']) {
                        case 1:
                            echo "Uitgevoerd";
                            break;
                        case 2:
                            echo "Klaar";
                            break;
                        default:
                            echo "Aangemaakt";
                            break;
                    }
                    ?></td>
                <td>
                    <?php if ($survey['survey_status'] == NULL) { ?>
                        <a href="index.php?page=enquete&id=<?= $survey['survey_id'] ?>"><button>Starten</button></a>
                    <?php } else { ?>
                        <a href="index.php?page=reportview&id=<?= $survey['survey_id'] ?>"><button>Uitslag</button></a>
                        <a href="index.php?page=enquetedownload&id=<?= $survey['survey_id'] ?>"><button>Downloaden</button></a>
                    <?php } ?>
                </td>
            </tr>


            <?php
        }
        ?>
    </tbody>
</table>
