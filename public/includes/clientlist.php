<?php
include_once '../app/Bootstrap.php';
$bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\User as User;
use inceptio\app\classes\Client as Client;

$user = new User;
$client = new Client;

$asc = "asc";

if(isset($_GET['asc'])){
    if($_GET['asc'] == "asc"){
        $asc = "desc";
    }
}

// if delete is called
if (isset($_GET['delete'])) {
    // set id to delete
    $client->setClientId($_GET['delete']);
    // delete
    $client->deleteClient();
    echo "Bedrijf is verwijderd";
}
if(isset($_GET['filter'])){
    $clients = $client->viewAllClients($_GET['filter'], $_GET['asc']);
}else{
    $clients = $client->viewAllClients();
}
?>

<style type="text/css">
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "Bedrijfnaam"; }
        td:nth-of-type(2):before { content: "Postcode"; }
        td:nth-of-type(3):before { content: "Plaats"; }
        td:nth-of-type(4):before { content: "Straat"; }
        td:nth-of-type(5):before { content: "Telefoon"; }
        td:nth-of-type(6):before { content: "Email"; }
        //td:nth-of-type(4):before { content: "Gebruikersnaam"; }
        td:nth-of-type(7):before { content: "Acties"; }
    }
</style>


<div id="options">
    <a href="index.php?page=clientadd"><button>Toevoegen</button></a> <br />
</div>

<table>
    <thead>
        <tr>
            <th>Bedrijfnaam <a href="index.php?page=clientlist&filter=client_name&asc=<?= $asc ?>"> <?php if($asc == 'asc'){ ?> <i class="fa fa-chevron-circle-up"></i> <?php }else{ ?> <i class="fa fa-chevron-circle-down"></i> <?php } ?></a></th>
            <th>Postcode <a href="index.php?page=clientlist&filter=client_address&asc=<?= $asc ?>"> <?php if($asc == 'asc'){ ?> <i class="fa fa-chevron-circle-up"></i> <?php }else{ ?> <i class="fa fa-chevron-circle-down"></i> <?php } ?></a></th>
            <th>Plaats <a href="index.php?page=clientlist&filter=client_place&asc=<?= $asc ?>"> <?php if($asc == 'asc'){ ?> <i class="fa fa-chevron-circle-up"></i> <?php }else{ ?> <i class="fa fa-chevron-circle-down"></i> <?php } ?></a></th>
            <th>Straat <a href="index.php?page=clientlist&filter=client_street&asc=<?= $asc ?>"> <?php if($asc == 'asc'){ ?> <i class="fa fa-chevron-circle-up"></i> <?php }else{ ?> <i class="fa fa-chevron-circle-down"></i> <?php } ?></a></th>
            <th>Telefoon <a href="index.php?page=clientlist&filter=client_phone&asc=<?= $asc ?>"> <?php if($asc == 'asc'){ ?> <i class="fa fa-chevron-circle-up"></i> <?php }else{ ?> <i class="fa fa-chevron-circle-down"></i> <?php } ?></a></th>
            <th>Email <a href="index.php?page=clientlist&filter=client_email&asc=<?= $asc ?>"> <?php if($asc == 'asc'){ ?> <i class="fa fa-chevron-circle-up"></i> <?php }else{ ?> <i class="fa fa-chevron-circle-down"></i> <?php } ?></a></th>
            <!--<th>Gebruikersnaam</th>-->
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($clients as $client) {

            if ($client['user_id'] != 0) {
                // get User data
                $user->setUserId($client['user_id']);
                $data = $user->viewUser();
            }else{
                $data['user_name'] = "Geen gebruiker gekoppeld.";
            }
            ?>
            <tr>
                <td><?php echo $client['client_name']; ?></td>
                <td><?= $client['client_address']; ?></td>
                <td><?= $client['client_place']; ?></td>
                <td><?= $client['client_street']; ?></td>
                <td><?= $client['client_phone']; ?></td>
                <td><?= $client['client_email']; ?></td>
                <!--<td><?php //echo $data['user_name']; ?></td> -->
                <td>
                    <a href="index.php?page=clientedit&id=<?= $client['client_id'] ?>"><button>Aanpassen</button></a> 
                    <a href="index.php?page=clientlist&delete=<?= $client['client_id'] ?>"><button>Verwijderen</button></a> 
                </td>
            </tr>


            <?php
        }
        ?>
    </tbody>
</table>
