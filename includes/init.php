<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 13.3.2017
 * Time: 13:09
 */

//win DS = "\", Mac/Linux DS = "/"
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'levelup');
//defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'  . DS . 'www' . DS . 'lol');
//defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:' . DS . 'XAMPP' . DS . 'htdocs' . DS . 'lol');
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'includes');

require INC_PATH . DS . 'config.php';
require INC_PATH . DS . 'db.php';
require INC_PATH . DS . 'function.php';
require INC_PATH . DS . 'jackpot.php';
require INC_PATH . DS . 'luckydraw.php';
require INC_PATH . DS . 'computer.php';



//torunament classes
require INC_PATH . DS . 'cmp_player.php';
require INC_PATH . DS . 'cmp_tournament_entry.php';
require INC_PATH . DS . 'cmp_tournament.php';
require INC_PATH . DS . 'cmp_matches.php';





//Slack
$financialChanel = 'https://hooks.slack.com/services/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';
$errorChanel = 'https://hooks.slack.com/services/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';

