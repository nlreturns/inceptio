<?php
include_once '../app/Bootstrap.php';
$bootstrap = new \inceptio\app\Bootstrap();

use inceptio\app\classes\Survey as Survey;
use inceptio\app\classes\Chapter as Chapter;
use inceptio\app\classes\Report as Report;
use inceptio\app\classes\Answer as Answer;
use inceptio\app\classes\Question as Question;
use inceptio\app\classes\User as User;
use inceptio\app\classes\Client as Client;

$survey = new Survey;
$chapter = new Chapter;
$question = new Question;
$answer = new Answer;
$report = new Report;

$chapters = $chapter->viewAllChapters();
$questions = $question->viewAllQuestions();
$answers = $answer->viewAllAnswers();
$answers2 = $answer->viewAllAnswers();
$reports = $report->viewAllReports();

if (isset($_POST['saveForm'])) {
    foreach ($_POST['question'] as $question_data) {
        // foreach filled in question
        if (isset($question_data['answer']) && isset($question_data['question_id'])) {
            // get answer data
            $answer->setAnswerId($question_data['answer']);
            $answer_data = $answer->viewAnswer();
            // get question data
            $question->setQuestionId($answer_data['question_id']);
            $data = $question->viewQuestion();
            // set comment data
            $comment = $question_data['comment'];

            foreach ($reports as $data) {
                if ($data['answer_id'] == $answer_data['answer_id']) {
                    // get report linked to answer
                    $report->setReportId($data['report_id']);
                    $report->viewReport();
                }
            }

            // save each question/report/answer
            $survey->setSurveyId($_GET['id']);
            $survey->setQuestionId($question);
            $survey->setAnswerId($answer);
            $survey->setComment($comment);
            $survey->setReportId($report);
            $parent_id = $survey->saveSurvey();

            if (isset($question_data['sub_answer'])) {
                foreach ($question_data['sub_answer'] as $subanswer) {
                    // create object of last input
                    $parent = new Survey();
                    $parent->setSurveyId($parent_id);
                    //$parent->viewSurvey();
                    // set data
                    $survey->setParentId($parent);

                    $answer->setAnswerId($subanswer);
                    $answer->viewAnswer();

                    $survey->setAnswerId($answer);

                    // set report
                    foreach ($reports as $data) {
                        if ($data['answer_id'] == $subanswer) {
                            $report->setReportId($data['report_id']);
                            $report->viewReport();
                        }
                    }

                    $survey->setReportId($report);

                    // save
                    $survey->saveSurvey();

                    // reset data
                    $survey->setReportId(NULL);
                    $report = new Report;
                }
            }
        }
        // reset data
        $survey->setAnswerId(NULL);
        $survey->setReportId(NULL);
        $survey->setParentId(NULL);
        $report = new Report;

        // refill survey
        $survey_data = $survey->viewSurvey();

        $author = new User;
        $author->setUserId($_SESSION['user_id']);
        $author->viewUser();
        $survey->setAuthorId($author);

        $participant = new Client;
        $participant->setClientId($survey_data['survey_participant']);
        $participant->viewClient();
        $survey->setClientId($participant);

        // status = Klaar
        $survey->setStatus(1);
        $survey->editSurvey();
    }
}

$survey->setSurveyId($_GET['id']);
$survey_data = $survey->viewSurvey();
// remove first character
$survey_data['survey_chapters'] = substr($survey_data['survey_chapters'], 1);
// remove last character
$survey_data['survey_chapters'] = substr($survey_data['survey_chapters'], 0, -1);

$selected_chapters = json_decode($survey_data['survey_chapters']);

if ($survey_data['survey_status'] != NULL) {
    header('Location: index.php?page=enquetelist');
} else {
    ?>

    <script type="text/javascript">
    <!--
        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }
    //-->
    </script>

    <form action="index.php?page=enquete&id=<?= $_GET['id']; ?>" method="post">
        <?php
        foreach ($chapters as $chapter) {

            foreach ($selected_chapters as $selected) {
                if ($chapter['chapter_id'] == $selected) {
                    echo "<div><div><h1>" . $chapter['chapter_name'] . "</h1></div></div>";
                    echo "<div><div>" . $chapter['chapter_description'] . "</div></div><br />";
                    $question_number = 1;
                    foreach ($questions as $question) {

                        if ($chapter['chapter_id'] == $question['chapter_id']) {
                            ?>
                            <div>
                                <div>
                                    <?php echo $question_number . ". " . $question['question_name']; ?> 
                                    <button type="button" onclick="toggle_visibility('<?= $question['question_id'] ?>');">?</button>
                                    <div style="display: none" id='<?= $question['question_id'] ?>'><?= $question['question_help'] ?></div>
                                </div>

                                <div>
                                    <?php
                                    foreach ($answers as $answer) {
                                        if ($answer['question_id'] == $question['question_id']) {
                                            if ($answer['answer_sub'] == 0) {
                                                ?>
                                                <input name="question[<?= $question['question_id'] ?>][question_id]" hidden value='<?= $question['question_id'] ?>'>
                                                <input required name="question[<?= $question['question_id'] ?>][answer]" type="radio" value="<?= $answer['answer_id'] ?>">
                                                <?php
                                                echo "<label class='choice'>" . $answer['answer_name'] . "</label> &nbsp&nbsp&nbsp&nbsp&nbsp";

                                                foreach ($answers2 as $answer2) {

                                                    if ($answer['answer_id'] == $answer2['answer_sub']) {
                                                        echo "<div style='margin-left: 20px'>";
                                                        ?>
                                                        <input name="question[<?= $question['question_id'] ?>][sub_answer]['<?= $answer2['answer_id'] ?>']" type="checkbox" value="<?= $answer2['answer_id'] ?>"> <?php
                                                        echo "<label class='choice'>" . $answer2['answer_name'] . "</label> ";
                                                        echo "</div>";
                                                    }
                                                }

                                                echo "<br />";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                
                                <div>
                                    <br />Opmerking: <input id="Field1" name="question[<?= $question['question_id']; ?>][comment]" type="text" class="field text fn" size="8" tabindex="1">
                                </div>
                            </div>
                            <br /><br />

                            <?php
                            $question_number++;
                        }
                    }
                }
            }
        }
        ?>

        <div>
            <div>
                <input id="saveForm" name="saveForm" type="submit" value="Toevoegen">
            </div>
        </div


    </form>
<?php } ?>