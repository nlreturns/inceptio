<?php

namespace inceptio\app\classes\db;

use inceptio\app\classes\db\Database as Database;

require_once 'Database.php';
/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbReport extends Database{

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
     * @param int $answer_id
     * @param string $report_output
     * @ParamType $answer_id int
     * @ParamType $report_output string
     */
    public function addReport($answer_id, $report_output, $report_type) {
        //build query
        $query = "INSERT INTO  `inceptio`.`reports` (
                `report_id` ,
                `report_value` ,
                `answer_id`,
                `report_type`
                )
                  VALUES (
                NULL, 
                '" . mysql_real_escape_string($report_output) . "',
                '" . mysql_real_escape_string($answer_id) . "',
                '" . mysql_real_escape_string($report_type) . "'
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
     * @param int $report_id
     * @ParamType $report_id int
     */
    public function deleteReport($report_id) {
        //build query
        $query = "DELETE FROM `reports` WHERE report_id = " . $report_id;
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param int $answer_id
     * @param string $report_output
     * @ParamType $answer_id int
     * @ParamType $report_output string
     */
    public function editReport($report_id, $answer_id, $report_output, $report_type) {
        //build query
        $query = "UPDATE `reports` SET `report_value` = '".$report_output."', `answer_id` = '".$answer_id."', `report_type` = '".$report_type."' WHERE `reports`.`report_id` = ".$report_id.";";
        
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param int $report_id
     * @ParamType $report_id int
     */
    public function viewReport($report_id) {
        //build query
        $query = "SELECT * FROM `reports` WHERE report_id = " . $report_id;
        
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
    public function viewAllReports() {
        //build query
        $query = "SELECT * FROM `reports` ORDER BY `answer_id` ASC";
        
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
    
    public function viewFullReport($survey_id){
        //build query
        $query = "SELECT * FROM `survey_question_answer` WHERE `survey_id` = " . $survey_id;
        
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
    
    public function editFinalReport($report_id, $report_output){
        //build query
        $query = "UPDATE `survey_question_answer` SET `report_value` = '".$report_output."' WHERE `survey_question_answer_id` = ".$report_id.";";
        
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

}

?>