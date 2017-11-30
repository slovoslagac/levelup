<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 30.11.2017
 * Time: 21:34
 */

    $email = 'petar.prodanovic@gmail.com';
    $hash = '0f28b5d49b3020afeecd95b4009adf4c';

function sendmail($email, $hash){


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

sendmail($email, $hash);