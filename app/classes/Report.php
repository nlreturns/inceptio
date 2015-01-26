<?php

namespace inceptio\app\classes;

use inceptio\app\classes\db\DbReport as DbReport;

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class Report extends DbReport {

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
            return "Not set";
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
    public function addReport() {
        $this->report_db->addReport($this->answer_id, $this->report_output);
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
        $this->report_db->editReport($this->report_id, $this->answer_id, $this->report_output);
    }

    /**
     * @access public
     */
    public function viewReport() {
        $data = $this->report_db->viewReport($this->report_id);
        
        $this->answer_id = $data['answer_id'];
        $this->report_output = $data['report_value'];
        
        return $data;
    }

    /**
     * @access public
     */
    public function viewAllReports() {
        return $this->report_db->viewAllReports();
    }

}

?>