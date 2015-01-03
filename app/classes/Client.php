<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/DbClient.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class Client extends DbClient {
	/**
	 * @AttributeType int
	 */
	private $client_id;
	/**
	 * @AttributeType string
	 */
	private $client_name;
	/**
	 * @AttributeType string
	 */
	private $client_address;
	/**
	 * @AttributeType string
	 */
	private $client_phone;
	/**
	 * @AttributeType Scansysteem.DbClient
	 */
	private $client_db;

	/**
	 * @access public
	 */
	public function getClientId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param Scansysteem.Client client_id
	 * @return void
	 * @ParamType client_id Scansysteem.Client
	 * @ReturnType void
	 */
	public function setClientId(Client $client_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getClientName() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string client_name
	 * @return void
	 * @ParamType client_name string
	 * @ReturnType void
	 */
	public function setClientName($client_name) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getClientAddress() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string client_address
	 * @return void
	 * @ParamType client_address string
	 * @ReturnType void
	 */
	public function setClientAddress($client_address) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getClientPhone() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string client_phone
	 * @return void
	 * @ParamType client_phone string
	 * @ReturnType void
	 */
	public function setClientPhone($client_phone) {
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
	public function addClient() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteClient() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function editClient() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewClient() {
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