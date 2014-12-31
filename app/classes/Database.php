<?php
/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class Database {
	/**
	 * @AttributeType string
	 */
	private $connection;
	/**
	 * @AttributeType mysqli_result
	 */
	private $query_result;
	/**
	 * @AttributeType string
	 */
	private $error;

	/**
	 * @access public
	 * @param $query
	 */
	public function getDbError($_query) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param $id
	 * @param $field
	 */
	public function checkId($_id, $_field) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param $text
	 * @param $len
	 */
	public function checkText($_text, $_len) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function createDatabase() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function dbFetchAll() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param $query
	 */
	public function dbFetchArray($_query) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param $string
	 */
	public function dbInString($_string) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function dbNumRows() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param $array_data
	 */
	public function dbOutArray($_array_data) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param $string
	 */
	public function dbOutString($_string) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function dbReset() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param $table
	 */
	public function dbTableExists($_table) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param $query
	 */
	public function dbquery($_query) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param $res
	 */
	public function isMysqliResource($_res) {
		// Not yet implemented
	}
}
?>