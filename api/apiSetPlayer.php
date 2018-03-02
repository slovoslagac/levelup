<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 2.3.2018
 * Time: 14:19
 */
include(join(DIRECTORY_SEPARATOR, array('..','includes', 'initapi.php')));


if(isset($_GET['email']) && isset($_GET['name'])) {

    $tmpPlayer = new apiPlayer();

    if(isset($_GET['name'])){ $tmpPlayer->setAttribute("name", $_GET['name']);};
    if(isset($_GET['email'])){ $tmpPlayer->setAttribute("email", $_GET['email']);};
    if(isset($_GET['phone'])){ $tmpPlayer->setAttribute("phone",  $_GET['phone']);};
    if(isset( $_GET['status'])){ $tmpPlayer->setAttribute("status", $_GET['status']);};
    if(isset($_GET['password'])){ $tmpPlayer->setAttribute("password", $_GET['password']);};
    if(isset($_GET['passhash'])){ $tmpPlayer->setAttribute("passhash", $_GET['passhash']);};
    if(isset($_GET['born'])){ $tmpPlayer->setAttribute("born", $_GET['born']);};
        $tmpPlayer->addPlayer();

}