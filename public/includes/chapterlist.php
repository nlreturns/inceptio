<?php
include_once '../app/Bootstrap.php';
$bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\Chapter as Chapter;

$chapter = new Chapter;

if(isset($_GET['delete'])){
    
    // set id
    $chapter->setChapterId($_GET['delete']);
    // delete chapter
    $chapter->deleteChapter();
    
    echo "Onderdeel verwijdert.";
}

$chapters = $chapter->viewAllChapters();
?>

<style type="text/css">
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "Onderdeelnaam"; }
        td:nth-of-type(2):before { content: "Beschrijving"; }
        td:nth-of-type(3):before { content: "Acties"; }
    }
</style>


<div id="options">
    <a href="index.php?page=chapteradd"><button>Toevoegen</button></a> <br />
</div>

<table>
    <thead>
        <tr>
            <th>Onderdeelnaam</th>
            <th>Beschrijving</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($chapters as $chapter) {
            ?>
            <tr>
                <td><?php echo $chapter['chapter_name']; ?></td>
                <td><?= $chapter['chapter_description']; ?></td>
                <td>
                    <a href="index.php?page=chapteredit&id=<?= $chapter['chapter_id'] ?>"><button>Aanpassen</button></a> 
                    <a href="index.php?page=chapterlist&delete=<?= $chapter['chapter_id'] ?>"><button>Verwijderen</button></a> 
                    <a href="index.php?page=chapterview&id=<?= $chapter['chapter_id'] ?>"><button>Bekijken</button></a>
                </td>
            </tr>


            <?php
        }
        ?>
    </tbody>
</table>
