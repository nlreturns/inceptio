<?php
/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 *
 * @author Ghoogendoorn
 * @version 0.2
 *
 * Version history
 * 0.1      GHoogendoorn        Initial version
 * 0.2  `   GHoogendoorn        Added msg board prio + change history.
 *
 * 
 * If the path is not found ad the following line to the config.php:
 *  ini_set('include_path', './' . PATH_SEPARATOR . "./common/". PATH_SEPARATOR . ini_get('include_path'));
 */


define("WWW_ROOT",                      $_SERVER['DOCUMENT_ROOT'] . '/github/minevents/public/');
define("DIR_INCLUDE",                   WWW_ROOT."includes/");
define("DIR_ADMIN",                     WWW_ROOT."admin/");
define("DIR_ADMIN_INCLUDE",             DIR_ADMIN."includes/");
define("DIR_ADMIN_CLASS",               DIR_ADMIN_INCLUDE."classes/");
define("DIR_CLASS",                     WWW_ROOT."classes/");

define("SURVEY_NAME",                   "Groene scan");

?>