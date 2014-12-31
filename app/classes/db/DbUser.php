<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/User.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Database.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbUser extends Database {
	/**
	 * @AttributeType Scansysteem.User
	 */
	private $user;
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
	 * @param string $user_name
	 * @param string $user_password
	 * @param int $user_type
	 * @ParamType $user_name string
	 * @ParamType $user_password string
	 * @ParamType $user_type int
	 */
	public function addUser($_user_name, $_user_password, $_user_type) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $user_id
	 * @ParamType $user_id int
	 */
	public function deleteUser($_user_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $user_id
	 * @ParamType $user_id int
	 */
	public function viewUser($_user_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $user_id
	 * @param string $user_name
	 * @param string $user_password
	 * @param int $user_type
	 * @ParamType $user_id int
	 * @ParamType $user_name string
	 * @ParamType $user_password string
	 * @ParamType $user_type int
	 */
	public function editUser($_user_id, $_user_name, $_user_password, $_user_type) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewAllUsers() {
		// Not yet implemented
	}
}
?>