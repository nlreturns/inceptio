<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Chapter.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Database.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbChapter extends Database {
	/**
	 * @AttributeType Scansysteem.Chapter
	 */
	private $chapter;
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
	 * @param string $chapter_name
	 * @param array $question_id
	 * @param string $chapter_description
	 * @ParamType $chapter_name string
	 * @ParamType $question_id array
	 * @ParamType $chapter_description string
	 */
	public function addChapter($_chapter_name, array_28 $_question_id, $_chapter_description) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $chapter_id
	 * @ParamType $chapter_id int
	 */
	public function deleteChapter($_chapter_id) {
		// Not yet implemented
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
	public function editChapter($_chapter_name, array_29 $_question_id, $_chapter_description) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $chapter_id
	 * @ParamType $chapter_id int
	 */
	public function viewChapter($_chapter_id) {
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