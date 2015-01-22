<?php

namespace inceptio\app\classes;

use inceptio\app\classes\User as User;
use inceptio\app\classes\db\DbClient as DbClient;

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
     * @AttributeType Scansysteem.User
     */
    private $user_id;

    /**
     * @AttributeType Scansysteem.DbClient
     */
    private $client_db;

    /**
     * @access public
     */
    public function __construct() {
        $this->user_id = new User();
        $this->client_db = new DbClient();
    }

    /**
     * @access public
     */
    public function getClientId() {
        if (isset($this->client_id)) {
            return $this->client_id;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param int client_id
     * @return void
     * @ParamType client_id Scansysteem.Client
     * @ReturnType void
     */
    public function setClientId($client_id) {
        $this->client_id = $client_id;
    }

    /**
     * @access public
     */
    public function getClientName() {
        if (isset($this->client_name)) {
            return $this->client_name;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string client_name
     * @return void
     * @ParamType client_name string
     * @ReturnType void
     */
    public function setClientName($client_name) {
        $this->client_name = $client_name;
    }

    /**
     * @access public
     */
    public function getClientAddress() {
        if (isset($this->client_address)) {
            return $this->client_address;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string client_address
     * @return void
     * @ParamType client_address string
     * @ReturnType void
     */
    public function setClientAddress($client_address) {
        $this->client_address = $client_address;
    }

    /**
     * @access public
     */
    public function getClientPhone() {
        if (isset($this->client_phone)) {
            return $this->client_phone;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string client_phone
     * @return void
     * @ParamType client_phone string
     * @ReturnType void
     */
    public function setClientPhone($client_phone) {
        $this->client_phone = $client_phone;
    }
    
    public function getUserId(User $user_id){
        if (isset($this->user_id)) {
            return $this->user_id;
        } else {
            return NULL;
        }
    }
    
    public function setUserId(User $user_id){
        $this->user_id = $user_id;
    }

    /**
     * @access public
     */
    public function addClient() {
        $this->client_db->addClient($this->client_name, $this->client_address, $this->client_phone, $this->user_id);
    }

    /**
     * @access public
     */
    public function deleteClient() {
        $this->client_db->deleteClient($this->client_id);
    }

    /**
     * @access public
     */
    public function editClient() {
        $this->client_db->editClient($this->client_id, $this->client_name, $this->client_address, $this->client_phone, $this->user_id);
    }

    /**
     * @access public
     */
    public function viewClient() {
        $data = $this->client_db->viewClient($this->client_id);
        $this->client_address = $data['client_address'];
        $this->client_name = $data['client_name'];
        $this->client_phone = $data['client_phone'];
        
        return $data;
    }

    /**
     * @access public
     */
    public function viewAllClients() {
        return $this->client_db->viewAllClients();
    }

}

?>