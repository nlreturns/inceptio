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
    $client->setClientEmail($_POST['client_email']);
    $client->setClientPlace($_POST['client_place']);
    $client->setClientStreet($_POST['client_street']);

    // add client
    $client->addClient();

    echo "Bedrijf toegevoegt.";
}

$users = $user->viewAllUsers();
$clients = $client->viewAllClients();
?>

<form action="index.php?page=clientadd" method="post">
    <div>
        <div><h1>Bedrijf toevoegen</h1></div>
    </div>
    
    <div>
        <label class="desc" id="title1" for="client_name">Bedrijfsnaam</label>
        <div>
            <input id="Field1" name="client_name" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="client_address">Postcode</label>
        <div>
            <input maxlength="6" id="Field1" name="client_address" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>
    
    <div>
        <label class="desc" id="title1" for="client_street">Straat</label>
        <div>
            <input id="Field1" name="client_street" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>
    
    <div>
        <label class="desc" id="title1" for="client_place">Plaats</label>
        <div>
            <input id="Field1" name="client_place" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="client_phone">Telefoon</label>
        <div>
            <input id="Field1" name="client_phone" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>
    
    <div>
        <label class="desc" id="title1" for="client_email">Email</label>
        <div>
            <input id="Field1" name="client_email" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Toevoegen">
        </div>
    </div>

</form>