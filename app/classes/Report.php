<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/DbReport.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class Report extends DbReport {
	/**
	 * @AttributeType int
	 */
	private $report_id;
	/**
	 * @AttributeType int
	 */
	private $answer_id;
	/**
	 * @AttributeType string
	 */
	private $report_output;
	/**
	 * @AttributeType Scansysteem.DbReport
	 */
	private $report_db;

	/**
	 * @access public
	 */
	public function getReportId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int report_id
	 * @return void
	 * @ParamType report_id int
	 * @ReturnType void
	 */
	public function setReportId($report_id) {
		// Not yet implemented
	}

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
	public function getReportOutput() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string report_output
	 * @return void
	 * @ParamType report_output string
	 * @ReturnType void
	 */
	public function setReportOutput($report_output) {
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
	public function exportHTML() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function exportExcel() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function exportPDF() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function addReport() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteReport() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function editReport() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewReport() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewAllReports() {
		// Not yet implemented
	}
}
?>