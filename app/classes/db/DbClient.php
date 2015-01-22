<?php

namespace inceptio\app\classes\db;

use inceptio\app\classes\User as User;
use inceptio\app\classes\db\Database as Database;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbClient extends Database {

    /**
     * @AttributeType Scansysteem.Database
     */
    private $db;

    /**
     * @access public
     */
    public function __construct() {
        $this->db = new Database();
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
    public function addClient($client_name, $client_address, $client_phone, User $user_id) {
        //build query
        $query = "INSERT INTO  `inceptio`.`clients` (
                `client_id` ,
                `client_name` ,
                `client_address` ,
                `client_phone`,
                `user_id`
                )
                  VALUES (
                NULL, 
                '" . mysql_real_escape_string($client_name) . "',
                '" . mysql_real_escape_string($client_address) . "',
                '" . mysql_real_escape_string($client_phone) . "',
                '" . $user_id->getUserId() . "'
                );";


        if ($user_id->getUserId() == NULL) {
            //build query
            $query = "INSERT INTO  `inceptio`.`clients` (
                `client_id` ,
                `client_name` ,
                `client_address` ,
                `client_phone`,
                `user_id`
                )
                  VALUES (
                NULL, 
                '" . mysql_real_escape_string($client_name) . "',
                '" . mysql_real_escape_string($client_address) . "',
                '" . mysql_real_escape_string($client_phone) . "',
                NULL
                );";
        }

        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param int $client_id
     * @ParamType $client_id int
     */
    public function deleteClient($client_id) {
        //build query
        $query = "DELETE FROM `clients` WHERE client_id = " . $client_id;
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
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
    public function editClient($client_id, $client_name, $client_address, $client_phone, User $user_id) {
        //build query
        $query = "UPDATE `clients` SET `client_name` = '" . $client_name . "', `client_address` = '" . $client_address . "', `client_phone` = '" . $client_phone . "', `user_id` = '" . $user_id->getUserId() . "' WHERE `clients`.`client_id` = " . $client_id . ";";

        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param int $client_id
     * @ParamType $client_id int
     */
    public function viewClient($client_id) {
        //build query
        $query = "SELECT * FROM `clients` WHERE client_id = " . $client_id;

        // fetch query
        $data = $this->db->dbFetchArray($query);

        // check data
        if ($data == NULL) {
            return FALSE;
        }
        return $data;
    }

    /**
     * @access public
     */
    public function viewAllClients() {
        //build query
        $query = "SELECT * FROM `clients`";

        // check for data
        if (!$this->db->dbquery($query)) {
            return false;
        }
        // fetch data
        if (!($result = $this->db->dbFetchAll())) {
            // set error.
            echo TXT_NO_DATA;
            return FALSE;
        }
        // return
        return $result;
    }

}

?>