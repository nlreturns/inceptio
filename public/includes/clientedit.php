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
    
    $user->setUserId($_POST['user']);
    $user->viewUser();
    
    $client->setUserId($user);

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
        <label class="desc" id="title1" for="client_address">Adres</label>
        <div>
            <input id="Field1" name="client_address" type="text" class="field text fn" value="<?= $client->getClientAddress(); ?>" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="client_phone">Telefoon</label>
        <div>
            <input id="Field1" name="client_phone" type="text" class="field text fn" value="<?= $client->getClientPhone(); ?>" size="8" tabindex="1">
        </div>
    </div>



    <div>
        <label class="desc" id="title106" for="Field106">
            Gebruikerstype
        </label>
        <div>

            <select id="Field106" name="user" class="field select medium" tabindex="11"> 
                <option value="0">Geen</option>
                <?php
                foreach ($users as $user) {
                    if ($user['user_type'] == 0) {
                        // filter the already used user_ids
                        foreach ($clients as $client) {
                            if ($client['user_id'] == $user['user_id']) {
                                $dont_show = TRUE;
                            }
                        }
                        // loop the open user_ids
                        if (!$dont_show) {
                            echo "<option value='" . $user['user_id'] . "'>" . $user['user_name'] . "</option>";

                        }
                        
                        // select option, if its current user
                        if($user['user_id'] == $data['user_id']){
                            echo "<option selected value='" . $user['user_id'] . "'>" . $user['user_name'] . "</option>";
                        }
                        
                        // reset dont_show
                        $dont_show = FALSE;
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Aanpassen">
        </div>
    </div>

</form>