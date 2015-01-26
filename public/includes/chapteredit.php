<?php

use inceptio\app\classes\Chapter as Chapter;

$chapter = new Chapter;

$chapter->setChapterId($_GET['id']);
$data = $chapter->viewChapter();

if (isset($_POST['saveForm'])) {
    $chapter->setChapterName($_POST['chapter_name']);
    $chapter->setChapterDescription($_POST['chapter_description']);
    
    $chapter->editChapter();
    echo "Hoofdstuk aangepast.";
}

?>


<form action="index.php?page=clientedit&id=<?= $_GET['id'] ?>" method="post">
    <div>
        <label class="desc" id="title1" for="chapter_name">Hoofdstuknaam</label>
        <div>
            <input id="Field1" name="chapter_name" type="text" class="field text fn" value="<?= $chapter->getChapterName(); ?>" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="chapter_description">beschrijving</label>
        <div>
            <input id="Field1" name="chapter_description" type="text" class="field text fn" value="<?= $chapter->getChapterDescription(); ?>" size="8" tabindex="1">
        </div>
    </div>
    
    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Aanpassen">
        </div>
    </div>

</form>