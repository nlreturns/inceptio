<?php
use inceptio\app\classes\User as User;

$user = new User;

$user->setUserId($_GET['id']);
$user->viewUser();

if(isset($_POST['saveForm'])){
    $user->setUserName($_POST['user_name']);
    $user->setUserPassword($_POST['user_password']);
    $user->setUserType($_POST['user_type']);
    
    $user->editUser();
    echo "Gebruiker aangepast.";
}

?>


<form action="index.php?page=useredit&id=<?= $_GET['id'] ?>" method="post">
    <div>
        <label class="desc" id="title1" for="user_name">Gebruikersnaam</label>
        <div>
            <input id="Field1" name="user_name" type="text" class="field text fn" value="<?= $user->getUserName(); ?>" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="user_password">Wachtwoord</label>
        <div>
            <input id="Field1" name="user_password" type="password" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title106" for="Field106">
            Gebruikerstype
        </label>
        <div>
            <select id="Field106" name="user_type" class="field select medium" tabindex="11"> 
                <option <?php if($user->getUserType() == 1){ echo "selected"; } ?> value="1">Administrator</option>
                <option <?php if($user->getUserType() == 0){ echo "selected"; } ?> value="0">Bedrijf</option>
            </select>
        </div>
    </div>

    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Aanpassen">
        </div>
    </div>

</form>