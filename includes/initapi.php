<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 13.3.2017
 * Time: 13:09
 */

//win DS = "\", Mac/Linux DS = "/"
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'levelup');
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'includes');
defined('API_PATH') ? null : define('API_PATH', SITE_ROOT . DS . 'api');

require INC_PATH . DS . 'config.php';
require INC_PATH . DS . 'db.php';
require INC_PATH . DS . 'function.php';



//API classes

require API_PATH . DS . 'apiFunctions.php';
require API_PATH . DS . 'classes' . DS . 'apiMatch.php';
require API_PATH . DS . 'classes' . DS . 'apiResults.php';
require API_PATH . DS . 'classes' . DS . 'apiTournament.php';
require API_PATH . DS . 'classes' . DS . 'apiPlayer.php';




