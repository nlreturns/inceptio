<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Database.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbQuestion extends Database {
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
	 * @param string $question_name
	 * @param int $questionType
	 * @ParamType $question_name string
	 * @ParamType $questionType int
	 */
	public function addQuestion($_question_name, $_questionType) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $question_id
	 * @ParamType $question_id int
	 */
	public function deleteQuestion($_question_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string $question_name
	 * @param int $questionType
	 * @ParamType $question_name string
	 * @ParamType $questionType int
	 */
	public function editQuestion($_question_name, $_questionType) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $question_id
	 * @ParamType $question_id int
	 */
	public function viewQuestion($_question_id) {
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