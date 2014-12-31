<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/DbUser.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class User extends DbUser {
	/**
	 * @AttributeType int
	 */
	private $user_id;
	/**
	 * @AttributeType string
	 */
	private $user_name;
	/**
	 * @AttributeType string
	 */
	private $user_password;
	/**
	 * @AttributeType int
	 */
	private $user_type;

	/**
	 * @access public
	 */
	public function getUserId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int user_id
	 * @return void
	 * @ParamType user_id int
	 * @ReturnType void
	 */
	public function setUserId($user_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getUserName() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string user_name
	 * @return void
	 * @ParamType user_name string
	 * @ReturnType void
	 */
	public function setUserName($user_name) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getUserPassword() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string user_password
	 * @return void
	 * @ParamType user_password string
	 * @ReturnType void
	 */
	public function setUserPassword($user_password) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getUserType() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int user_type
	 * @return void
	 * @ParamType user_type int
	 * @ReturnType void
	 */
	public function setUserType($user_type) {
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
	public function login() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function addUser() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteUser() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewUser() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function editUser() {
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