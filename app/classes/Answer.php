<?php

namespace inceptio\app\classes;

use inceptio\app\classes\Question as Question;
use inceptio\app\classes\Report as Report;
use inceptio\app\classes\db\DbAnswer as DbAnswer;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class Answer extends Report {

    /**
     * @AttributeType int
     */
    private $answer_id;

    /**
     * @AttributeType Scansysteem.Question
     */
    private $question_id;

    /**
     * @AttributeType string
     */
    private $answer_name;

    /**
     * @AttributeType string
     */
    private $answer_value;

    /**
     * @AttributeType Scansysteem.DbAnswer
     */
    private $answer_db;

    /**
     * @access public
     */
    public function __construct() {
        $this->question_id = new Question();
        $this->answer_db = new DbAnswer();
    }

    /**
     * @access public
     */
    public function getAnswerId() {
        if (isset($this->answer_id)) {
            return $this->answer_id;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param int answer_id
     * @return void
     * @ParamType answer_id int
     * @ReturnType void
     */
    public function setAnswerId($answer_id) {
        $this->answer_id = $answer_id;
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
     * @ParamType question_id Question
     * @ReturnType void
     */
    public function setQuestionId(Question $question_id) {
        $this->question_id = $question_id;
    }
    
    
    /**
     * @access public
     */
    public function getAnswer_value() {
        if (isset($this->answer_value)) {
            return $this->answer_value;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string answer_value
     * @return void
     * @ParamType answer_value string
     * @ReturnType void
     */
    public function setAnswer_value($answer_value) {
        $this->answer_value = $answer_value;
    }

    /**
     * @access public
     * @return string
     * @ReturnType string
     */
    public function getAnswer_name() {
        if (isset($this->answer_name)) {
            return $this->answer_name;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string answer_name
     * @return void
     * @ParamType answer_name string
     * @ReturnType void
     */
    public function setAnswer_name($answer_name) {
        $this->answer_name = $answer_name;
    }

    /**
     * @access public
     */
    public function addAnswer() {
        $this->answer_db->addAnswer($this->question_id, $this->answer_name, $this->answer_value);
    }

    /**
     * @access public
     */
    public function deleteAnswer() {
        $this->answer_db->deleteAnswer($this->answer_id);
    }

    /**
     * @access public
     */
    public function editAnswer() {
        $this->answer_db->editAnswer($this->answer_id, $this->question_id, $this->answer_name, $this->answer_value);
    }

    /**
     * @access public
     */
    public function viewAnswer() {
        return $this->answer_db->viewAnswer($this->answer_id);
    }

    /**
     * @access public
     */
    public function viewAllAnswers() {
        return $this->answer_db->viewAllAnswers();
    }

}

?>