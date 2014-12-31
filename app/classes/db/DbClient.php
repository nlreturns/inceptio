<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Client.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Database.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbClient extends Database {
	/**
	 * @AttributeType Scansysteem.Client
	 */
	private $client;
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
	 * @param string $client_name
	 * @param string $client_address
	 * @param string $client_phone
	 * @ParamType $client_name string
	 * @ParamType $client_address string
	 * @ParamType $client_phone string
	 */
	public function addClient($_client_name, $_client_address, $_client_phone) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $client_id
	 * @ParamType $client_id int
	 */
	public function deleteClient($_client_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string $client_name
	 * @param string $client_address
	 * @param string $client_phone
	 * @ParamType $client_name string
	 * @ParamType $client_address string
	 * @ParamType $client_phone string
	 */
	public function editClient($_client_name, $_client_address, $_client_phone) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $client_id
	 * @ParamType $client_id int
	 */
	public function viewClient($_client_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewAllClients() {
		// Not yet implemented
	}
}
?>