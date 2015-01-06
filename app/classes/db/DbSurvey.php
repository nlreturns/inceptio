<?php

namespace inceptio\app\classes\db;

use inceptio\app\classes\User as User;
use inceptio\app\classes\Client as Client;
use inceptio\app\classes\db\Database as Database;

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
    public function addSurvey(Client $client_id, User $author_id) {
        //build query
        $query = "INSERT INTO  `inceptio`.`surveys` (
                `survey_id` ,
                `survey_name` ,
                `survey_author` ,
                `survey_participant`
                )
                  VALUES (
                NULL, 
                '".SURVEY_NAME."',
                '" . mysql_real_escape_string($author_id->getUserId()) . "',
                '" . mysql_real_escape_string($client_id->getClientId()) . "'
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
    public function editSurvey(Client $client_id, $survey_id, User $author_id) {
        //build query
        $query = "UPDATE `surveys` SET `survey_author` = '".$author_id->getUserId()."', `survey_participant` = '".$client_id->getClientId()."' WHERE `surveys`.`survey_id` = ".$survey_id.";";
        
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
        if ( $data == NULL) {
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
        if(!($result = $this->db->dbFetchAll())){
            // set error.
            echo TXT_NO_DATA;
            return FALSE;
        }
        // return
        return $result;
    }

}

?>