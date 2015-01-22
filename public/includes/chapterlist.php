<?php
include_once '../app/Bootstrap.php';
$bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\Chapter as Chapter;

$chapter = new Chapter;

$chapters = $chapter->viewAllChapters();
?>

<style type="text/css">
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "Hoofdstuknaam"; }
        td:nth-of-type(2):before { content: "Beschrijving"; }
        td:nth-of-type(5):before { content: "Acties"; }
    }
</style>


<div id="options">
    <a href="index.php?page=clientadd"><button>Toevoegen</button></a> <br />
</div>

<table>
    <thead>
        <tr>
            <th>Bedrijfnaam</th>
            <th>Adres</th>
            <th>Telefoon</th>
            <th>Gebruikersnaam</th>
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
                <td><?= $client['client_phone']; ?></td>
                <td><?= $data['user_name']; ?></td>
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
