<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 30.11.2017
 * Time: 20:38
 */

function logAction($action, $message, $file = 'log.txt')
{
    $logfile = SITE_ROOT . DS . 'log' . DS . $file;

    if ($handle = fopen($logfile, 'a')) {
        $timestamp = strftime("%d.%m.%Y %H:%M:%S", time());
        $content = "$timestamp | $action : $message\n";
        fwrite($handle, $content);
        fclose($handle);
    } else {
        echo "Nije uspelo logovanje";
    }
}



function sendmail($email, $hash){
//    $email = 'chumpitas@gmail.com';
//    $hash = '1141938ba2c2b13f7117d7c424ebae5f';

    $to      = $email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject
    $message = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.


Please click this link to activate your account:
http://localhost/levelup/registration.php?email='.$email.'&hash='.$hash.'

'; // Our message above including the link

    $headers = 'From:noreply@level-up.rs' . "\r\n". "CC : petar.prodanovic@gmail.com"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email


}

function sendmailSuccess($email,$tournament_name){

    $to      = $email; // Send email to our user
    $subject = "Prijava na turnir  - $tournament_name"; // Give the email a subject
    $message = "Uspesno ste se prijavili na turnir - $tournament_name"; // Our message above including the link

    $headers = 'From:noreply@level-up.rs' . "\r\n". "CC : petar.prodanovic@gmail.com"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email


}

function sendmailUnSuccess($email,$tournament_name, $message_sent){

    $to      = $email; // Send email to our user
    $subject = "Prijava na turnir  - $tournament_name"; // Give the email a subject
    $message = $message_sent; // Our message above including the link

    $headers = 'From:noreply@level-up.rs' . "\r\n". "CC : petar.prodanovic@gmail.com"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email


}