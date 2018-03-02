<?php

$name = "Petar Prodanovic";
$email = "pera.detlic@gmail.com";

$name = str_replace(' ', '%20', $name);


$url = "http://localhost/levelup/api/apiSetPlayer.php?name=$name&email=$email";





file_get_contents($url);

echo $url;

?>