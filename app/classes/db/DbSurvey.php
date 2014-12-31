<?php
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Survey.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Database.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/Client.php');
require_once(realpath(dirname(__FILE__)) . '/../Scansysteem/User.php');

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbSurvey extends Database {
	/**
	 * @AttributeType Scansysteem.Survey
	 */
	private $survey;
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
	 * @param Scansysteem.Client $client_id
	 * @param array $chapter_id
	 * @param Scansysteem.User $author_id
	 * @ParamType $client_id Scansysteem.Client
	 * @ParamType $chapter_id array
	 * @ParamType $author_id Scansysteem.User
	 */
	public function addSurvey(Client $_client_id, array_6 $_chapter_id, User $_author_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $survey_id
	 * @ParamType $survey_id int
	 */
	public function deleteSurvey($_survey_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param Scansysteem.Client $client_id
	 * @param array $chapter_id
	 * @param Scansysteem.User $author_id
	 * @ParamType $client_id Scansysteem.Client
	 * @ParamType $chapter_id array
	 * @ParamType $author_id Scansysteem.User
	 */
	public function editSurvey(Client $_client_id, array_7 $_chapter_id, User $_author_id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int $survey_id
	 * @ParamType $survey_id int
	 */
	public function viewSurvey($_survey_id) {
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