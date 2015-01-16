<?php

namespace inceptio\app\classes;

use inceptio\app\classes\User as User;
use inceptio\app\classes\Chapter as Chapter;
use inceptio\app\classes\Client as Client;
use inceptio\app\classes\db\DbSurvey as DbSurvey;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class Survey extends DbSurvey {

    /**
     * @AttributeType int
     */
    private $survey_id;

    /**
     * @AttributeType Scansysteem.Client
     */
    private $client_id;

    /**
     * @AttributeType timestamp
     */
    private $created_at;

    /**
     * @AttributeType Scansysteem.User
     */
    private $author_id;

    /**
     * @AttributeType Scansysteem.DbSurvey
     */
    private $survey_db;
    
    /**
     * @AttributeType varchar
     */
    private $chapters;
    

    /**
     * @access public
     */
    public function __construct() {
        $this->survey_db = new DbSurvey();
        $this->client_id = new Client();
        $this->author_id = new User();
    }

    /**
     * @access public
     */
    public function getSurveyId() {
        if (isset($this->survey_id)) {
            return $this->survey_id;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param int survey_id
     * @return void
     * @ParamType survey_id int
     * @ReturnType void
     */
    public function setSurveyId($survey_id) {
        $this->survey_id = $survey_id;
    }
    
    /**
     * @access public
     */
    public function getChapters() {
        if (isset($this->chapters)) {
            return $this->chapters;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param int survey_id
     * @return void
     * @ParamType survey_id int
     * @ReturnType void
     */
    public function setChapters($chapters) {
        $this->survey_id = json_encode($chapters);
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
     * @param Scansysteem.Client client_id
     * @return void
     * @ParamType client_id Scansysteem.Client
     * @ReturnType void
     */
    public function setClientId(Client $client_id) {
        $this->client_id = $client_id;
    }

    /**
     * @access public
     */
    public function getCreatedAt() {
        if (isset($this->created_at)) {
            return $this->created_at;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param timestamp created_at
     * @return void
     * @ParamType created_at timestamp
     * @ReturnType void
     */
    public function setCreatedAt(timestamp $created_at) {
        $this->created_at = $created_at;
    }

    /**
     * @access public
     */
    public function getAuthorId() {
        if (isset($this->author_id)) {
            return $this->author_id;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param Scansysteem.User author_id
     * @return void
     * @ParamType author_id Scansysteem.User
     * @ReturnType void
     */
    public function setAuthorId(User $author_id) {
        $this->author_id = $author_id;
    }

    /**
     * @access public
     */
    public function addSurvey() {
        $this->survey_db->addSurvey($this->client_id, $this->author_id, $this->chapters);
    }

    /**
     * @access public
     */
    public function deleteSurvey() {
        $this->survey_db->deleteSurvey($this->survey_id);
    }

    /**
     * @access public
     */
    public function editSurvey() {
        $this->survey_db->editSurvey($this->client_id, $this->survey_id, $this->author_id, $this->chapters);
    }

    /**
     * @access public
     */
    public function viewSurvey() {
        return $this->survey_db->viewSurvey($this->survey_id);
    }

    /**
     * @access public
     */
    public function viewAllSurveys() {
        return $this->survey_db->viewAllSurveys();
    }

}

?>