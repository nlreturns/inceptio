<?php

namespace inceptio\app\classes\db;

use inceptio\app\classes\Question as Question;
use inceptio\app\classes\db\Database as Database;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbAnswer extends Database {

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
     * @param Scansysteem.Question $question_id
     * @param string $answer_comment
     * @param string $answer_value
     * @ParamType $question_id Scansysteem.Question
     * @ParamType $answer_comment string
     * @ParamType $answer_value string
     */
    public function addAnswer(Question $question_id, $answer_name, $answer_value) {
        //build query
        $query = "INSERT INTO  `inceptio`.`answers` (
                `answer_id` ,
                `answer_name` ,
                `answer_value` ,
                `question_id`
                )
                  VALUES (
                NULL, 
                '" . mysql_real_escape_string($answer_name) . "',
                '" . mysql_real_escape_string($answer_value) . "',
                '" . mysql_real_escape_string($question_id->getQuestionId()) . "'
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
     * @param int $answer_id
     * @ParamType $answer_id int
     */
    public function deleteAnswer($answer_id) {
        //build query
        $query = "DELETE FROM `answers` WHERE answer_id = " . $answer_id;
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param int $question_id
     * @param string $answer_comment
     * @param string $answer_value
     * @ParamType $question_id int
     * @ParamType $answer_comment string
     * @ParamType $answer_value string
     */
    public function editAnswer($answer_id, $question_id, $answer_name, $answer_value) {
        //build query
        $query = "UPDATE `answers` SET `answer_name` = '".$answer_name."', `answer_value` = '".$answer_value."', `question_id` = '".$question_id->getQuestionId()."' WHERE `answers`.`answer_id` = ".$answer_id.";";
        
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
     * @ParamType $answer_id int
     */
    public function viewAnswer($answer_id) {
        //build query
        $query = "SELECT * FROM `answers` WHERE answer_id = " . $answer_id;
        
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
    public function viewAllAnswers() {
        //build query
        $query = "SELECT * FROM `answers`";
        
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