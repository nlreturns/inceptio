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
    
    private $status;
    
    private $question_id;
    
    private $answer_id;
    
    private $report_id;
    
    private $comment;
    
    private $parent_id;
    

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
    
    public function getQuestionId(){
        if(isset($this->question_id)){
            return $this->question_id;
        }else{
            return "Not set";
        }
    }
    
    public function getParentId(){
        if (isset($this->parent_id)){
            return $this->parent_id;
        }else{
            return "Not set";
        }
    }
    
    public function getStatus(){
        if (isset($this->parent_id)){
            return $this->parent_id;
        }else{
            return "Not set";
        }
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
    
    public function setParentId($parent_id){
        $this->parent_id = $parent_id;
    }
    
    public function setQuestionId($question_id){
        $this->question_id = $question_id;
    }
    
    public function getAnswerId(){
        if(isset($this->answer_id)){
            return $this->answer_id;
        }else{
            return "Not set";
        }
    }
    
    public function setAnswerId($answer_id){
        $this->answer_id = $answer_id;
    }
    
    public function getReportId(){
        if(isset($this->report_id)){
            return $this->report_id;
        }else{
            return "";
        }
    }
    
    public function setReportId($report_id){
        $this->report_id = $report_id;
    }
    
    public function getComment(){
        if(isset($this->comment)){
            return $this->comment;
        }else{
            return "Not set";
        }
    }
    
    public function setComment($comment){
        $this->comment = $comment;
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
        $chapters = json_encode($chapters);
        $this->chapters = $chapters;
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
        $this->survey_db->editSurvey($this->client_id, $this->survey_id, $this->author_id, $this->chapters, $this->status);
    }

    /**
     * @access public
     */
    public function viewSurvey() {
        $data = $this->survey_db->viewSurvey($this->survey_id);
        $this->chapters = $data['survey_chapters'];
        $this->author_id = $data['survey_author'];
        $this->client_id = $data['survey_participant'];
        $this->status = $data['survey_status'];
        
        return $data;
    }

    /**
     * @access public
     */
    public function viewAllSurveys() {
        return $this->survey_db->viewAllSurveys();
    }
    
    public function saveSurvey(){
        return $this->survey_db->saveSurvey($this->survey_id, $this->question_id, $this->answer_id, $this->report_id, $this->comment, $this->parent_id);
    }
    
    
    /*
     * makes call to last inserted ID
     */
    public function getLastId(){
        return $this->survey_db->getLastId();
    }

}

?>