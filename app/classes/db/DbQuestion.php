<?php

namespace inceptio\app\classes\db;

use inceptio\app\classes\Chapter as Chapter;
use inceptio\app\classes\db\Database as Database;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbQuestion extends Database{

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
     * @param string $question_name
     * @param int $questionType
     * @ParamType $question_name string
     * @ParamType $questionType int
     */
    public function addQuestion($question_name, $questionType, Chapter $chapter_id, $question_help) {
        //build query
        $query = "INSERT INTO  `inceptio`.`questions` (
                `question_id` ,
                `question_name` ,
                `question_help` ,
                `chapter_id`,
                `questiontype_id`
                )
                  VALUES (
                NULL, 
                '" . mysql_real_escape_string($question_name) . "',
                '" . mysql_real_escape_string($question_help) . "',
                '" . mysql_real_escape_string($chapter_id->getChapterId()) . "',
                '" . mysql_real_escape_string($questionType) . "'
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
     * @param int $question_id
     * @ParamType $question_id int
     */
    public function deleteQuestion($question_id) {
        //build query
        $query = "DELETE FROM `questions` WHERE question_id = " . $question_id;
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param string $question_name
     * @param int $questionType
     * @ParamType $question_name string
     * @ParamType $questionType int
     */
    public function editQuestion($question_id, $question_name, $question_help, Chapter $chapter_id, $questionType) {
        //build query
        $query = "UPDATE `questions` SET `question_name` = '".$question_name."', `question_help` = '".$question_help."', `chapter_id` = '".$chapter_id->getChapterId()."', `questiontype_id` = '".$questionType."' WHERE `questions`.`question_id` = ".$question_id.";";
        
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
     * @ParamType $question_id int
     */
    public function viewQuestion($question_id) {
        //build query
        $query = "SELECT * FROM `questions` WHERE question_id = " . $question_id;
        
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
    public function viewAllQuestions($page, $limit) {
        if($page == 0){
            
        }else{
            $page *= 30;
        }
        //build query
        $query = "SELECT * FROM `questions` LIMIT " . $limit . " OFFSET " . $page;
        
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