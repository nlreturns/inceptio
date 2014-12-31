<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Question.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Report.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/DbAnswer.php');

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
	private $answer_comment;
	/**
	 * @AttributeType string
	 */
	private $answer_value;

	/**
	 * @access public
	 */
	public function getAnswerId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int answer_id
	 * @return void
	 * @ParamType answer_id int
	 * @ReturnType void
	 */
	public function setAnswerId($answer_id) {
		// Not yet implemented
	}

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
	public function setQuestionId(array_18 $question_id) {
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
	public function addAnswer() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteAnswer() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function editAnswer() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewAnswer() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getAnswer_value() {
		// Not yet implemented
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
	public function getAnswer_comment() {
		return $this->answer_comment;
	}

	/**
	 * @access public
	 * @param string answer_comment
	 * @return void
	 * @ParamType answer_comment string
	 * @ReturnType void
	 */
	public function setAnswer_comment($answer_comment) {
		$this->answer_comment = $answer_comment;
	}

	/**
	 * @access public
	 */
	public function viewAllAnswers() {
		// Not yet implemented
	}
}
?>