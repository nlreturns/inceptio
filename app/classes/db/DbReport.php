<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Database.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbReport extends Database {
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
	 * @param int $answer_id
	 * @param string $report_output
	 * @ParamType $answer_id int
	 * @ParamType $report_output string
	 */
	public function addReport($_answer_id, $_report_output) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $report_id
	 * @ParamType $report_id int
	 */
	public function deleteReport($_report_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $answer_id
	 * @param string $report_output
	 * @ParamType $answer_id int
	 * @ParamType $report_output string
	 */
	public function editReport($_answer_id, $_report_output) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $report_id
	 * @ParamType $report_id int
	 */
	public function viewReport($_report_id) {
		// Not yet implemented
	}
}
?>