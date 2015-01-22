<?php
include_once '../app/Bootstrap.php';
$bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\User as User;
use inceptio\app\classes\Client as Client;

$user = new User;
$client = new Client;

// if delete is called
if (isset($_GET['delete'])) {
    // set id to delete
    $user->setUserId($_GET['delete']);
    // delete
    $user->deleteUser();
}

// if add client is called
if (isset($_GET['toewijzen'])) {
    if (isset($_POST['client_id'])) {
        $user_client = new User;
        //set user data
        $user_client->setUserId($_GET['toewijzen']);
        // set user data into client object
        $client->setUserId($user_client);
        $client->setClientId($_POST['client_id']);

        // set rest of client data
        $client->viewClient();
        // add user to client
        $client->editClient();
    }
}


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
        td:nth-of-type(1):before { content: "Gebruikersnaam"; }
        td:nth-of-type(2):before { content: "Gebruikerstype"; }
        td:nth-of-type(3):before { content: "Acties"; }
    }
</style>


<div id="options">
    <a href="index.php?page=useradd"><button>Toevoegen</button></a> <br />
</div>

<table>
    <thead>
        <tr>
            <th>Gebruikernaam</th>
            <th>Gebruikerstype</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user) {
            ?>
            <tr>
                <td><?php echo $user['user_name']; ?></td>
                <td><?php
                    if ($user['user_type'] == 1) {
                        echo "Adminstrator";
                    } else {
                        echo "Bedrijf";
                    }
                    ?></td>
                <td>
                    <!--<a href="index.php?page=userview?id=<?= $user['user_id'] ?>"><button>Bekijken</button></a> -->
                    <a href="index.php?page=useredit&id=<?= $user['user_id'] ?>"><button>Aanpassen</button></a> 
                    <a href="index.php?page=userlist&delete=<?= $user['user_id'] ?>"><button>Verwijderen</button></a> 

                    <?php if ($user['user_type'] != 1) { ?>
                        <form action="index.php?page=userlist&toewijzen=<?= $user['user_id'] ?>" method="post">
                            <div>
                                <label class="desc" id="title106" for="Field106">
                                    Bedrijf toewijzen: 
                                </label>
                                <div>
                                    <select id="Field106" name="client_id" class="field select medium" tabindex="11"> 
                                        <?php
                                        foreach ($clients as $client) {

                                            if ($client['user_id'] == $user['user_id']) {
                                                echo "<option selected value='" . $client['client_id'] . "'>" . $client['client_name'] . "</option>";
                                            } else {
                                                echo "<option value='" . $client['client_id'] . "'>" . $client['client_name'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <input id="saveForm" name="saveForm" type="submit" value="Toewijzen">
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </td>
            </tr>


            <?php
        }
        ?>
    </tbody>
</table>
