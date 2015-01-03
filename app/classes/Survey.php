<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Client.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/User.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/DbSurvey.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Chapter.php');

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
	 * @AttributeType array
	 */
	private $chapter_id;
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
	 * @access public
	 */
	public function getSurveyId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int survey_id
	 * @return void
	 * @ParamType survey_id int
	 * @ReturnType void
	 */
	public function setSurveyId($survey_id) {
		// Not yet implemented
	}

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
	public function getChapterId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param array chapter_id
	 * @return void
	 * @ParamType chapter_id array
	 * @ReturnType void
	 */
	public function setChapterId(array_32 $chapter_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getCreatedAt() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param timestamp created_at
	 * @return void
	 * @ParamType created_at timestamp
	 * @ReturnType void
	 */
	public function setCreatedAt(timestamp $created_at) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getAuthorId() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param Scansysteem.User author_id
	 * @return void
	 * @ParamType author_id Scansysteem.User
	 * @ReturnType void
	 */
	public function setAuthorId(User $author_id) {
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
	public function addSurvey() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteSurvey() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function editSurvey() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewSurvey() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewAllSurveys() {
		// Not yet implemented
	}
}
?>