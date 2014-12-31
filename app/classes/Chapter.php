<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Question.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/DbChapter.php');

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
	 * @AttributeType array
	 */
	private $question_id;
	/**
	 * @AttributeType string
	 */
	private $chapter_description;

	/**
	 * @access public
	 */
	public function getChapterId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param array chapter_id
	 * @return void
	 * @ParamType chapter_id array
	 * @ReturnType void
	 */
	public function setChapterId(array_12 $chapter_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getChapterName() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string chapter_name
	 * @return void
	 * @ParamType chapter_name string
	 * @ReturnType void
	 */
	public function setChapterName($chapter_name) {
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
	public function setQuestionId(array_13 $question_id) {
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
	public function addChapter() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteChapter() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function editChapter() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewChapter() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getChapterDescription() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string chapter_description
	 * @return void
	 * @ParamType chapter_description string
	 * @ReturnType void
	 */
	public function setChapterDescription($chapter_description) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewAllChapters() {
		// Not yet implemented
	}
}
?>