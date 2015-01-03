<?php

namespace inceptio\app\classes;

use inceptio\app\classes\db\DbUser as DbUser;

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
     * @AttributeType Scansysteem.DbUser
     */
    private $user_db;

    /**
     * @access public
     */
    public function __construct() {
        $this->user_db = new DbUser();
    }

    /**
     * @access public
     */
    public function getUserId() {
        if (isset($this->user_id)) {
            return $this->user_id;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param int user_id
     * @return void
     * @ParamType user_id int
     * @ReturnType void
     */
    public function setUserId($user_id) {
        if (is_numeric($user_id)) {
            $this->user_id = $user_id;
        } else {
            return $user_id . "is not numerical";
        }
    }

    /**
     * @access public
     */
    public function getUserName() {
        if (isset($this->user_name)) {
            return $this->user_name;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string user_name
     * @return void
     * @ParamType user_name string
     * @ReturnType void
     */
    public function setUserName($user_name) {
        $this->user_name = $user_name;
    }

    /**
     * @access public
     */
    public function getUserPassword() {
        if (isset($this->user_password)) {
            return $this->user_password;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param string user_password
     * @return void
     * @ParamType user_password string
     * @ReturnType void
     */
    public function setUserPassword($user_password) {
        $this->user_password = $user_password;
    }

    /**
     * @access public
     */
    public function getUserType() {
        if (isset($this->user_type)) {
            return $this->user_type;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param int user_type
     * @return void
     * @ParamType user_type int
     * @ReturnType void
     */
    public function setUserType($user_type) {
        $this->user_type = $user_type;
    }

    /**
     * @access public
     */
    public function login() {
        // send login to db class
        return $this->user_db->login($this->user_name, $this->user_password);
    }

    /**
     * @access public
     */
    public function addUser() {
        return $this->user_db->addUser($this->user_name, $this->user_password, $this->user_type);
    }

    /**
     * @access public
     */
    public function deleteUser() {
        return $this->user_db->deleteUser($this->user_id);
    }

    /**
     * @access public
     */
    public function viewUser() {
        return $this->user_db->viewUser($this->user_id);
    }

    /**
     * @access public
     */
    public function editUser() {
        return $this->user_db->editUser($this->user_id, $this->user_name, $this->user_password, $this->user_type);
    }

    /**
     * @access public
     */
    public function viewAllUsers() {
        return $this->user_db->viewAllUsers();
    }

}

?>