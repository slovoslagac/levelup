<?php
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));

$tmpplayer = new cmp_player();
$newplayer = '';

if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $_GET['email'];
    setcookie('email', $email);
    $hash = $_GET['hash'];
    setcookie('hash', $hash);
    $newplayer = $tmpplayer->checkpalyer($email, $hash);
} else {

}

if (isset($_POST['saveplayer'])) {
    $pass = $_POST['pass'];
    $repeat = $_POST['repeat'];
    if ($pass === $repeat) {
        $crypt_password = crypt($pass);
        $email = $_COOKIE['email'];
        $hash = $_COOKIE['hash'];
        $currentplayer = $tmpplayer->checkpalyer($email, $hash);
        $tmpplayer->updatepassword($crypt_password, $currentplayer->id);
        $tmpplayer->updatestatus(1, $currentplayer->id);
        unset($_COOKIE['email'], $_COOKIE['hash']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LevelUp! igraonica</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700&amp;subset=latin-ext" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>


<?php if ($newplayer != '' && $newplayer->status != 1 ) { ?>
    <div id="wraper">
        <div class="box">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="title">Registracija naloga</div>
                <div class="team_name"><?php echo ($newplayer != '') ? $newplayer->email : '' ?></div>
                <div class="cell">Lozinka
                    <input type="password" name="pass">
                </div>
                <div class="cell">Ponovite lozinku
                    <input type="password" name="repeat">
                </div>

                <div class="cell_info">
                    Registracijom na sajtu LevelUp! ćeš potvrditi rezervaciju turnira. Osim toga, na sajtu ćeš moći da vidiš raspored takmičenja, sa satnicama svakog pojedinačnog meča.
                </div>
                <div class="submit">
                    <button class="button" name="saveplayer" id="saveplayer">Registruj se</button>
                </div>
            </form>
        </div>
        <div class="sponsor">
            <div class="sponsors"><a href="http://www.facebook.com/czvesports"><img src="img/czv.png"></a></div>
            <div class="sponsors"><a href="index.php"><img src="img/levelup_logo.png"></a></div>
            <div class="sponsors"><a href="http://www.fudbalica.com"><img src="img/fudbalica.png"></a></div>
        </div>
    </div>
<?php } else { ?>
    <div id="wraper">
        <div class="box">
            <div class="title">Mail adresa je već aktivirana</div>
        </div>
        <div class="sponsor">
            <div class="sponsors"><a href="http://www.facebook.com/czvesports"><img src="img/czv.png"></a></div>
            <div class="sponsors"><a href="index.php"><img src="img/levelup_logo.png"></a></div>
            <div class="sponsors"><a href="http://www.fudbalica.com"><img src="img/fudbalica.png"></a></div>
        </div>
    </div>


<?php } ?>

<?php


?>


</body>
</html>
