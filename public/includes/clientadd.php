<?php

use inceptio\app\classes\Client as Client;
use inceptio\app\classes\User as User;

$client = new Client;
$user = new User;

if (isset($_POST['saveForm'])) {
    // set object data
    $client->setClientName($_POST['client_name']);
    $client->setClientAddress($_POST['client_address']);
    $client->setClientPhone($_POST['client_phone']);

    // check if an user is selected
    if ($_POST['user'] != 0) {
        $user->setUserId($_POST['user']);
        $user->viewUser();
        $client->setUserId($user);
    }
    // add client
    $client->addClient();

    echo "Bedrijf toegevoegt.";
}

$users = $user->viewAllUsers();
$clients = $client->viewAllClients();
?>

<form action="index.php?page=clientadd" method="post">
    <div>
        <label class="desc" id="title1" for="client_name">Bedrijfsnaam</label>
        <div>
            <input id="Field1" name="client_name" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="client_address">Adres</label>
        <div>
            <input id="Field1" name="client_address" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="client_phone">Telefoon</label>
        <div>
            <input id="Field1" name="client_phone" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title106" for="Field106">
            Gebruiker
        </label>
        <div>
            <select id="Field106" name="user" class="field select medium" tabindex="11"> 
                <option value="0">Geen</option>
                <?php
                foreach ($users as $user) {
                    if ($user['user_type'] == 0) {
                        foreach ($clients as $client) {
                            if ($client['user_id'] == $user['user_id']) {
                                $dont_show = TRUE;
                            }
                        }
                        if(!$dont_show){
                            echo "<option value='" . $user['user_id'] . "'>" . $user['user_name'] . "</option>";
                        }
                        $dont_show = FALSE;
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