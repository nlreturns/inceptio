<?php

namespace inceptio\app\classes;

use inceptio\app\classes\Survey as Survey;
use inceptio\app\classes\db\DbChapter as DbChapter;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class Chapter extends Question {

    /**
     * @AttributeType int
     */
    private $chapter_id;

    /**
     * @AttributeType string
     */
    private $chapter_name;

    /**
     * @AttributeType string
     */
    private $chapter_description;

    /**
     * @AttributeType Scansysteem.DbChapter
     */
    private $chapter_db;

    /**
     * @AttributeType Scansysteem.Survey 
     */
    private $survey_id;

    /**
     * @access public
     */
    public function __construct() {
        $this->chapter_db = new DbChapter();
        $this->survey_id = new Survey();
    }
    
    /**
     * @access public
     */
    public function getChapterId() {
        if (isset($this->chapter_id)) {
            return $this->chapter_id;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param array chapter_id
     * @return void
     * @ParamType chapter_id array
     * @ReturnType void
     */
    public function setChapterId($chapter_id) {
        $this->chapter_id = $chapter_id;
    }

    /**
     * @access public
     */
    public function getChapterName() {
        if (isset($this->chapter_name)) {
            return $this->chapter_name;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string chapter_name
     * @return void
     * @ParamType chapter_name string
     * @ReturnType void
     */
    public function setChapterName($chapter_name) {
        $this->chapter_name = $chapter_name;
    }

    /**
     * @access public
     */
    public function getChapterDescription() {
        if (isset($this->chapter_description)) {
            return $this->chapter_description;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string chapter_description
     * @return void
     * @ParamType chapter_description string
     * @ReturnType void
     */
    public function setChapterDescription($chapter_description) {
        $this->chapter_description = $chapter_description;
    }
    
    /**
     * @access public
     */
    public function getSurveyId() {
        if (isset($this->survey_id)) {
            return $this->survey_id;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param array question_id
     * @return void
     * @ParamType question_id array
     * @ReturnType void
     */
    public function setSurveyId(Survey $survey_id) {
        $this->survey_id = $survey_id;
    }

    /**
     * @access public
     */
    public function addChapter() {
        $this->chapter_db->addChapter($this->chapter_name, $this->survey_id, $this->chapter_description);
    }

    /**
     * @access public
     */
    public function deleteChapter() {
        $this->chapter_db->deleteChapter($this->chapter_id);
    }

    /**
     * @access public
     */
    public function editChapter() {
       $this->chapter_db->editChapter($this->chapter_id, $this->chapter_name, $this->survey_id, $this->chapter_description);
    }

    /**
     * @access public
     */
    public function viewChapter() {
        return $this->chapter_db->viewChapter($chapter_id);
    }

    /**
     * @access public
     */
    public function viewAllChapters() {
        return $this->chapter_db->viewAllChapters();
    }

}

?>