<?php

use inceptio\app\classes\Client as Client;
use inceptio\app\classes\User as User;

$client = new Client;
$user = new User;

$client->setClientId($_GET['id']);
$data = $client->viewClient();

if (isset($_POST['saveForm'])) {
    $client->setClientName($_POST['client_name']);
    $client->setClientAddress($_POST['client_address']);
    $client->setClientPhone($_POST['client_phone']);
    $client->setClientEmail($_POST['client_email']);
    $client->setClientPlace($_POST['client_place']);
    $client->setClientStreet($_POST['client_street']);
    /*
    $user->setUserId(NULL);
    $user->viewUser();
    
    $client->setUserId($user);
    */
    $client->editClient();
    echo "Bedrijf aangepast.";
}

$clients = $client->viewAllClients();
$users = $user->viewAllUsers();
?>


<form action="index.php?page=clientedit&id=<?= $_GET['id'] ?>" method="post">
    <div>
        <label class="desc" id="title1" for="client_name">Bedrijfnaam</label>
        <div>
            <input id="Field1" name="client_name" type="text" class="field text fn" value="<?= $client->getClientName(); ?>" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="client_address">Postcode</label>
        <div>
            <input maxlength="6" id="Field1" name="client_address" type="text" class="field text fn" value="<?= $client->getClientAddress(); ?>" size="8" tabindex="1">
        </div>
    </div>
    
    <div>
        <label class="desc" id="title1" for="client_street">Straat</label>
        <div>
            <input id="Field1" name="client_street" type="text" class="field text fn" value="<?= $client->getClientStreet(); ?>" size="8" tabindex="1">
        </div>
    </div>
    
    <div>
        <label class="desc" id="title1" for="client_place">Plaats</label>
        <div>
            <input id="Field1" name="client_place" type="text" class="field text fn" value="<?= $client->getClientPlace(); ?>" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="client_phone">Telefoon</label>
        <div>
            <input id="Field1" name="client_phone" type="text" class="field text fn" value="<?= $client->getClientPhone(); ?>" size="8" tabindex="1">
        </div>
    </div>
    
    <div>
        <label class="desc" id="title1" for="client_email">Email</label>
        <div>
            <input id="Field1" name="client_email" type="text" class="field text fn" value="<?= $client->getClientEmail(); ?>" size="8" tabindex="1">
        </div>
    </div>


    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Aanpassen">
        </div>
    </div>

</form>