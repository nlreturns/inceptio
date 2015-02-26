<?php

namespace inceptio\app\classes\db;

use inceptio\app\classes\User as User;
use inceptio\app\classes\Client as Client;
use inceptio\app\classes\db\Database as Database;
use inceptio\app\classes\Question as Question;
use inceptio\app\classes\Answer as Answer;
use inceptio\app\classes\Report as Report;
use inceptio\app\classes\Survey as Survey;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbSurvey extends Database {

    /**
     * @AttributeType Scansysteem.Database
     */
    private $db;

    /**
     * @access public
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * @access public
     * @param Scansysteem.Client $client_id
     * @param array $chapter_id
     * @param Scansysteem.User $author_id
     * @ParamType $client_id Scansysteem.Client
     * @ParamType $chapter_id array
     * @ParamType $author_id Scansysteem.User
     */
    public function addSurvey(Client $client_id, User $author_id, $chapters) {
        $chapters = json_encode($chapters);
        //build query
        $query = "INSERT INTO  `inceptio`.`surveys` (
                `survey_id` ,
                `survey_name` ,
                `survey_author` ,
                `survey_participant`,
                `survey_chapters`
                )
                  VALUES (
                NULL, 
                '" . SURVEY_NAME . "',
                '" . mysql_real_escape_string($author_id->getUserId(), $this->db->connection) . "',
                '" . mysql_real_escape_string($client_id->getClientId()) . "',
                '" . mysql_real_escape_string($chapters) . "'
                );";

        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param int $survey_id
     * @ParamType $survey_id int
     */
    public function deleteSurvey($survey_id) {
        //build query
        $query = "DELETE FROM `surveys` WHERE survey_id = " . $survey_id;
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param Scansysteem.Client $client_id
     * @param array $chapter_id
     * @param Scansysteem.User $author_id
     * @ParamType $client_id Scansysteem.Client
     * @ParamType $chapter_id array
     * @ParamType $author_id Scansysteem.User
     */
    public function editSurvey(Client $client_id, $survey_id, User $author_id, $chapters, $status) {
        //build query
        $query = "UPDATE `surveys` SET `survey_author` = '" . $author_id->getUserId() . "', `survey_participant` = '" . $client_id->getClientId() . "', `survey_chapters` = '" . $chapters . "', `survey_status` = '".$status."' WHERE `surveys`.`survey_id` = " . $survey_id . ";";

        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param int $survey_id
     * @ParamType $survey_id int
     */
    public function viewSurvey($survey_id) {
        //build query
        $query = "SELECT * FROM `surveys` WHERE survey_id = " . $survey_id;
        
        // fetch query
        $data = $this->db->dbFetchArray($query);

        // check data
        if ($data == NULL) {
            return FALSE;
        }
        return $data;
    }

    /**
     * @access public
     */
    public function viewAllSurveys() {
        //build query
        $query = "SELECT * FROM `surveys` ORDER BY `survey_name` ASC";

        // check for data
        if (!$this->db->dbquery($query)) {
            return false;
        }
        // fetch data
        if (!($result = $this->db->dbFetchAll())) {
            // set error.
            echo TXT_NO_DATA;
            return FALSE;
        }
        // return
        return $result;
    }

    public function saveSurvey($survey_id, Question $question_id, Answer $answer_id, Report $report_id, $comment, Survey $parent_id = NULL) {

        if ($parent_id != NULL) {
            $parentid = $parent_id->getSurveyId();
        } else {
            $parentid = $parent_id;
        }
        
        //build query
        $query = "INSERT INTO `inceptio`.`survey_question_answer` (
                `survey_question_answer_id`, 
                `survey_id`,
                `question_id`, 
                `answer_id`, 
                `report_value`, 
                `comment`, 
                `report_type`,
                `parent_id`
                ) 
                    VALUES (
                    NULL, 
                    '" . $survey_id . "', 
                    '" . $question_id->getQuestionName() . "', 
                    '" . $answer_id->getAnswer_name() . "', 
                    '" . $report_id->getReportOutput() . "', 
                    '" . $comment . "', 
                    '1',
                    '" . $parentid . "');";
        
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            
            $last_id = $this->db->lastId();
            return $last_id;
        }
    }
    
    public function getLastId(){
        return $this->db->lastId();
    }

}

?>