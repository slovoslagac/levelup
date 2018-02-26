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
//defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'  . DS . 'www' . DS . 'lol');
//defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:' . DS . 'XAMPP' . DS . 'htdocs' . DS . 'lol');
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'includes');
defined('API_PATH') ? null : define('API_PATH', SITE_ROOT . DS . 'api');

require INC_PATH . DS . 'config.php';
require INC_PATH . DS . 'db.php';
require INC_PATH . DS . 'function.php';
require INC_PATH . DS . 'jackpot.php';
require INC_PATH . DS . 'luckydraw.php';
require INC_PATH . DS . 'computer.php';
require INC_PATH . DS . 'slackfunctions.php';


//torunament classes
require INC_PATH . DS . 'cmp_player.php';
require INC_PATH . DS . 'cmp_tournament_entry.php';
require INC_PATH . DS . 'cmp_tournament.php';
require INC_PATH . DS . 'cmp_matches.php';
require INC_PATH . DS . 'cmp_results.php';

//API classes

require API_PATH . DS . 'apiFunctions.php';
require API_PATH . DS . 'classes' . DS . 'apiMatch.php';
require API_PATH . DS . 'classes' . DS . 'apiResults.php';


//variables
$sonystart = 30;


//Slack
$financialChanel = 'https://hooks.slack.com/api/T5UTDFZ9T/B5UNTJYBD/pBi4AVW4jdyhTWyxEdJT7x61';
$errorChanel = 'https://hooks.slack.com/api/T5UTDFZ9T/B5UT44528/5fwbKBHDTDrzuyfJJR8zQ9BB';

