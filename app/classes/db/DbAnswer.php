<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Answer.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Database.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Question.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbAnswer extends Database {
	/**
	 * @AttributeType Scansysteem.Answer
	 */
	private $answer;
	/**
	 * @AttributeType Scansysteem.Database
	 */
	private $db;

	/**
	 * @access public
	 */
	public function __construct() {
		// Not yet implemented
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
	public function addAnswer(Question $_question_id, $_answer_comment, $_answer_value) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $answer_id
	 * @ParamType $answer_id int
	 */
	public function deleteAnswer($_answer_id) {
		// Not yet implemented
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
	public function editAnswer($_question_id, $_answer_comment, $_answer_value) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $answer_id
	 * @ParamType $answer_id int
	 */
	public function viewAnswer($_answer_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewAllAnswers() {
		// Not yet implemented
	}
}
?>