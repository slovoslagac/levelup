<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 27.2.2018
 * Time: 14:04
 */

include(join(DIRECTORY_SEPARATOR, array('..','includes', 'initapi.php')));

if(isset($_GET['tournament'])) {
    $tournamentid = $_GET['tournament'];
    $current_tournament = new apiTournament();
    echo (json_encode($current_tournament->getTournamentById($tournamentid)));
}