<?php

namespace inceptio\app\classes;

use inceptio\app\classes\db\DbReport as DbReport;

require_once "db/DbReport.php";

//ini_set('display_errors', '0');     # don't show any errors...
error_reporting(E_ALL | E_STRICT);  # ...but do log them

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class Report{

    /**
     * @AttributeType int
     */
    private $report_id;

    /**
     * @AttributeType int
     */
    private $answer_id;

    /**
     * @AttributeType string
     */
    private $report_output;

    /**
     * @AttributeType Scansysteem.DbReport
     */
    private $report_db;
    private $survey_id;
    private $report_type;

    /**
     * @access public
     */
    public function __construct() {
        $this->report_db = new DbReport();
    }

    /**
     * @access public
     */
    public function getReportId() {
        if (isset($this->report_id)) {
            return $this->report_id;
        } else {
            return "Not set";
        }
    }

    /**
     * @access public
     * @param int report_id
     * @return void
     * @ParamType report_id int
     * @ReturnType void
     */
    public function setReportId($report_id) {
        $this->report_id = $report_id;
    }

    /**
     * @access public
     */
    public function getAnswerId() {
        if (isset($this->answer_id)) {
            return $this->answer_id;
        } else {
            return "Not set";
        }
    }

    public function getSurveyId() {
        if (isset($this->survey_id)) {
            return $this->survey_id;
        } else {
            return "Not set";
        }
    }
    
    public function getReportType(){
        if (isset($this->report_type)){
            return $this->report_type;
        }else{
            return NULL;
        }
    }
    
    public function setReportType($report_type){
        $this->report_type = $report_type;
    }

    public function setSurveyId($survey_id) {
        $this->survey_id = $survey_id;
    }

    /**
     * @access public
     * @param int answer_id
     * @return void
     * @ParamType answer_id int
     * @ReturnType void
     */
    public function setAnswerId($answer_id) {
        $this->answer_id = $answer_id;
    }

    /**
     * @access public
     */
    public function getReportOutput() {
        if (isset($this->report_output)) {
            return $this->report_output;
        } else {
            return "";
        }
    }

    /**
     * @access public
     * @param string report_output
     * @return void
     * @ParamType report_output string
     * @ReturnType void
     */
    public function setReportOutput($report_output) {
        $this->report_output = $report_output;
    }

    /**
     * @access public
     */
    public function exportHTML() {
        // Not yet implemented
    }

    /**
     * @access public
     */
    public function exportExcel() {
        // Not yet implemented
    }

    /**
     * @access public
     */
    public function exportPDF() {
        // Not yet implemented
    }

    /**
     * @access public
     */
    public function addReport($answer_id = null, $report_output = null, $report_type = null){
        $this->report_db->addReport($this->answer_id, $this->report_output, $this->report_type);
    }

    /**
     * @access public
     */
    public function deleteReport() {
        $this->report_db->deleteReport($this->report_id);
    }

    /**
     * @access public
     */
    public function editReport() {
        $this->report_db->editReport($this->report_id, $this->answer_id, $this->report_output, $this->report_type);
    }

    /**
     * @access public
     */
    public function viewReport() {
        $data = $this->report_db->viewReport($this->report_id);

        $this->answer_id = $data['answer_id'];
        $this->report_output = $data['report_value'];
        $this->report_type = $data['report_type'];

        return $data;
    }

    /**
     * @access public
     */
    public function viewAllReports() {
        return $this->report_db->viewAllReports();
    }

    public function viewFullReport() {
        return $this->report_db->viewFullReport($this->survey_id);
    }

    public function editFinalReport(){
        $this->report_db->editFinalReport($this->report_id, $this->report_output);
    }
    
}

?>