<?php

use inceptio\app\classes\Survey;
use inceptio\app\classes\Chapter;
use inceptio\app\classes\Client;
use inceptio\app\classes\User;

$client = new Client;
$chapter = new Chapter;
$survey = new Survey;
//client chapter

if (isset($_POST['saveForm'])) {
    
    $author = new User;
    $author->setUserId($_SESSION['user_id']);
    $author->viewUser();
    
    $client->setClientId($_POST['client']);
    $client->viewClient();
    
    $survey->setAuthorId($author);
    $survey->setClientId($client);
    
    $survey->setChapters($_POST['chapters']);
    
    $survey->addSurvey();
    
    echo "Analyse toegevoegd";
    
}

$chapters = $chapter->viewAllChapters();
$clients = $client->viewAllClients();
?>

<form action="index.php?page=enqueteadd" method="post">
    <div>
        <div><h1>Analyse aanmaken</h1></div>
    </div>
    <div>
        <label class="desc" id="title106" for="Field106">
            Bedrijf
        </label>
        <div>
            <select id="Field106" name="client" class="field select medium" tabindex="11"> 
                <?php
                foreach ($clients as $client) {
                    echo "<option value='" . $client['client_id'] . "'>" . $client['client_name'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div>
        <fieldset>
            <legend id="chapters" class="desc">
                Onderdelen
            </legend>


            <?php
            foreach ($chapters as $chapter) {
                echo "<div>";
                echo "<input name='chapters[" . $chapter['chapter_id'] . "]' type='checkbox' value='" . $chapter['chapter_id'] . "' ";
                echo "<label class='choice' for='chapters[" . $chapter['chapter_id'] . "]'>" . $chapter['chapter_name'] . "</label>";
                echo "</div>";
            }
            ?>
        </fieldset>
    </div>

    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Toevoegen">
        </div>
    </div>

</form>