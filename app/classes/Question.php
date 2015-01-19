<?php

namespace inceptio\app\classes;

use inceptio\app\classes\db\DbQuestion as DbQuestion;
use inceptio\app\classes\QuestionType as QuestionType;
use inceptio\app\classes\Chapter as Chapter;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class Question extends QuestionType {

    /**
     * @AttributeType int
     */
    private $question_id;

    /**
     * @AttributeType string
     */
    private $question_name;
    
    /**
     * @AttributeType string
     */
    private $question_help;

    /**
     * @AttributeType int
     */
    private $questionType_id;

    /**
     * @AttributeType Scansysteem.Chapter
     */
    private $chapter_id;
    
    /**
     * @AttributeType Scansysteem.DbQuestion
     */
    private $question_db;

    /**
     * @access public
     */
    public function __construct() {
        $this->chapter_id = new Chapter();
        $this->question_db = new DbQuestion;
    }

    /**
     * @access public
     */
    public function getQuestionId() {
        if (isset($this->question_id)) {
            return $this->question_id;
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
    public function setQuestionId($question_id) {
        $this->question_id = $question_id;
    }

    /**
     * @access public
     */
    public function getQuestionName() {
        if (isset($this->question_name)) {
            return $this->question_name;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string question_name
     * @return void
     * @ParamType question_name string
     * @ReturnType void
     */
    public function setQuestionName($question_name) {
        $this->question_name = $question_name;
    }
    
    /**
     * @access public
     */
    public function getQuestionHelp() {
        if (isset($this->question_help)) {
            return $this->question_help;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string question_name
     * @return void
     * @ParamType question_name string
     * @ReturnType void
     */
    public function setQuestionHelp($question_help) {
        $this->question_help = $question_help;
    }

    /**
     * @access public
     */
    public function getQuestionTypeId() {
        if (isset($this->questionType_id)) {
            return $this->questionType_id;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param int questionType_id
     * @return void
     * @ParamType questionType_id int
     * @ReturnType void
     */
    public function setQuestionTypeId($questionType_id) {
        $this->questionType_id = $questionType_id;
    }
    
    public function setChapterId(Chapter $chapter_id){
        $this->chapter_id = $chapter_id;
    }

    /**
     * @access public
     */
    public function addQuestion() {
        $this->question_db->addQuestion($this->question_name, $this->questionType_id, $this->chapter_id, $this->question_help);
    }

    /**
     * @access public
     */
    public function deleteQuestion() {
        $this->question_db->deleteQuestion($this->question_id);
    }

    /**
     * @access public
     */
    public function editQuestion() {
        $this->question_db->editQuestion($this->question_id, $this->question_name, $this->question_help, $this->chapter_id, $this->questionType_id);
    }

    /**
     * @access public
     */
    public function viewQuestion() {
        return $this->question_db->viewQuestion($this->question_id);
    }

    /**
     * @access public
     */
    public function viewAllQuestions() {
        return $this->question_db->viewAllQuestions();
    }

}

?>