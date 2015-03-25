<?php

use inceptio\app\classes\Chapter as Chapter;

$chapter = new Chapter;

if (isset($_POST['saveForm'])) {
    // set object data
    $chapter->setChapterName($_POST['chapter_name']);
    $chapter->setChapterDescription($_POST['chapter_description']);

    // add chapter
    $chapter->addChapter();

    echo "Onderdeel toegevoegd.";
}

$chapters = $chapter->viewAllChapters();
?>

<form action="index.php?page=chapteradd" method="post">
    <div>
        <div><h1>Onderdeel toevoegen</h1></div>
    </div>
    <div>
        <label class="desc" id="title1" for="chapter_name">Onderdeelnaam</label>
        <div>
            <input id="Field1" name="chapter_name" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <label class="desc" id="title1" for="chapter_description">Beschrijving</label>
        <div>
            <input id="Field1" name="chapter_description" type="text" class="field text fn" value="" size="8" tabindex="1">
        </div>
    </div>

    <div>
        <div>
            <input id="saveForm" name="saveForm" type="submit" value="Toevoegen">
        </div>
    </div>

</form>