<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/QuestionType.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Answer.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/DbQuestion.php');

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
	 * @AttributeType int
	 */
	private $questionType_id;

	/**
	 * @access public
	 */
	public function getQuestionId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param array question_id
	 * @return void
	 * @ParamType question_id array
	 * @ReturnType void
	 */
	public function setQuestionId(array_15 $question_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getQuestionName() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string question_name
	 * @return void
	 * @ParamType question_name string
	 * @ReturnType void
	 */
	public function setQuestionName($question_name) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getQuestionTypeId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int questionType_id
	 * @return void
	 * @ParamType questionType_id int
	 * @ReturnType void
	 */
	public function setQuestionTypeId($questionType_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function __construct() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function addQuestion() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteQuestion() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function editQuestion() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewQuestion() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewAllQuestions() {
		// Not yet implemented
	}
}
?>