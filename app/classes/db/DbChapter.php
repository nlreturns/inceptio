<?php

namespace inceptio\app\classes\db;

use inceptio\app\classes\Survey as Survey;
use inceptio\app\classes\db\Database as Database;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbChapter extends Database {

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
     * @param string $chapter_name
     * @param array $question_id
     * @param string $chapter_description
     * @ParamType $chapter_name string
     * @ParamType $question_id array
     * @ParamType $chapter_description string
     */
    public function addChapter($chapter_name, $chapter_description) {
        //build query
        $query = "INSERT INTO  `inceptio`.`chapters` (
                `chapter_id` ,
                `chapter_name` ,
                `chapter_description`
                )
                  VALUES (
                NULL, 
                '" . mysql_real_escape_string($chapter_name) . "',
                '" . mysql_real_escape_string($chapter_description) . "'
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
     * @param int $chapter_id
     * @ParamType $chapter_id int
     */
    public function deleteChapter($chapter_id) {
        //build query
        $query = "DELETE FROM `chapters` WHERE chapter_id = " . $chapter_id;
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param string $chapter_name
     * @param array $question_id
     * @param string $chapter_description
     * @ParamType $chapter_name string
     * @ParamType $question_id array
     * @ParamType $chapter_description string
     */
    public function editChapter($chapter_id, $chapter_name, $chapter_description) {
        //build query
        $query = "UPDATE `chapters` SET `chapter_name` = '".$chapter_name."', `chapter_description` = '".$chapter_description."' WHERE `chapters`.`chapter_id` = ".$chapter_id.";";
        
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param int $chapter_id
     * @ParamType $chapter_id int
     */
    public function viewChapter($chapter_id) {
        //build query
        $query = "SELECT * FROM `chapters` WHERE chapter_id = " . $chapter_id;
        
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
    public function viewAllChapters() {
        //build query
        $query = "SELECT * FROM `chapters`";
        
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