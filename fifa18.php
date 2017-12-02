<?php
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));

//tournaments
$tournament_id = 1;

$tmp_cmp_player_new = new cmp_player();
$allteams = $tmp_cmp_player_new->getall();
$allemail = array();
$allemailfull = array();


foreach ($allteams as $item) {
    $tmpval = "$item->name ($item->email)";
    array_push($allemailfull, $tmpval);
    array_push($allemail, $item->email);
}

$emailjson = json_encode($allemail);
$emailfulljson = json_encode($allemail);

if (isset($_POST['saveplayer'])) {
    $tmp_cmp_player = new cmp_player();
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $year = $_POST['year'];
    $hash = md5(rand(0, 1000));

    $email_check = $tmp_cmp_player->getattribute($email);
    if ($email_check == '') {
        $tmp_cmp_player->setattribute('username', $username);
        $tmp_cmp_player->setattribute('phone', $phone);
        $tmp_cmp_player->setattribute('email', $email);
        $tmp_cmp_player->setattribute('year', $year);
        $tmp_cmp_player->setattribute('hash', $hash);
        try {
            $tmp_cmp_player->addplayer();
        } catch (Exception $e) {
            logAction("Greska kod kreiranja novog tima", "'username', $username,'phone', $phone,'email', $email", 'cmp_team.txt');
        }
        logAction("Kreiranje novog tima", "'username', $username,'phone', $phone,'email', $email", 'cmp_team.txt');
        $tmpuser = $tmp_cmp_player->getattribute($email);
        $tmptrnmentry = new cmp_tournament_entry();
        $tmptrnmentry->setattribute('tournamentid', $tournament_id);
        $tmptrnmentry->setattribute('playerid', $tmpuser->id);
        $tmptrnmentry->addtournamententry();

//        try {
//            sendmail($email, $hash);
//            $tmp_cmp_player->updatestatus(3, $tmpuser->id);
//            echo "<script>alert('Verifikacioni mail je poslat na vašu adresu');</script>";
//        } catch (Exception $e) {
//            logAction("Greska pri slanju maila", "'hash', $hash,'email', $email", 'error_mail.txt');
//            echo "<script>alert('Registracija nije uspela! Molimo vas pokušajte ponovo');</script>";
//        }
//        unset($tmptrnmentry, $tmpuser, $tmp_cmp_player);
        echo "<meta http-equiv='refresh' content='0'>";

    } else {
        logAction("Email vec postoji", "'username', $username,'phone', $phone,'email', $email", 'cmp_team.txt');
        echo "<script>alert('Uneta email adresa vec postoji');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
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
<div id="wraper">
    <div class="box">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="title">Prijava za FIFA 18 turnir - Nedelja 03.02.2017. (10h)</div>
            <div class="cell">Ime i prezime
                <input type="text" name="username" id="username" placeholder="Ime i prezime" required>
            </div>
            <div class="cell"><label id="alert">E-mail adresa</label>
                <input type="email" name="email" id="email" placeholder="E-mail adresa" onchange="check()" required>
            </div>
            <div class="cell">Broj telefona
                <input type="tel" name="phone" id="phone" placeholder="Broj telefona" required>
            </div>
            <div class="cell">Godište
                <select name="year">
                    <?php for ($i = 2017; $i >= 1950; $i--) { ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="cell_info">
                Popunjavanjem ovog formulara rezervišeš svoje mesto na turniru u nedelju 03.12.2017. sa početkom u 10h. Da bi bio prijavljen na turniru neophodno je da dođeš u LevelUp! igraonicu (Novi Beograd,
                Stari Merkator, 3. sprat) i uplatiš <b>učešće od 300 din</b>. Krajnji rok za prijavu je <b>subota 02.12.2017. u 20h</b> kada će biti objavljen raspored ko sa kime igra u nedelju.
            </div>
            <div class="cell_prizes">
                Nagrade:
                <ol>
                    <li>Mesto: <b>4.000 Din + fudbalski dres</b></li>
                    <li>Mesto: <b>1.000 Din + 5h Sony PS4</b></li>
                    <li>Mesto: <b>500 Din + 2h Sony PS4</b></li>
                    <li>Mesto: <b>2h Sony PS4</b></li>
                </ol>
            </div>
            <div class="cell_prizes">
                Turnir u <b>nedelju 03.12.2017.</b> je prvi od 16 kvalifikacionih turnira. Na osnovu plasmana na turniru, svaki prijavljeni igrač će osvojiti određeni broj <b>LevelUp! bodova</b>. Nakon 16
                kvalifikacionih turnira <b>32 igrača</b> sa najviše LevelUp! bodova će se kvalifikovati za <b></b>veliki finalni turnir</b>, sa vrednim novčanim i robnim nagradama.<br>Više informacija o
                turnrima možete dobiti u <b>LevelUp! igraonici</b>.
            </div>
            <div class="submit">
                <button class="button" name="saveplayer" id="saveplayer">Prijavi se</button>
            </div>
        </form>
    </div>
    <div class="sponsor">
        <div class="sponsors"><a href="http://www.facebook.com/czvesports"><img src="img/czv.png"></a></div>
        <div class="sponsors"><a href="index.html"><img src="img/levelup_logo.png"></a></div>
        <div class="sponsors"><a href="http://www.fudbalica.com"><img src="img/fudbalica.png"></a></div>
    </div>
</div>
<script>
    var emails = JSON.parse(<?php echo json_encode($emailjson) ?>);
    var emailsfull = JSON.parse(<?php echo json_encode($emailfulljson) ?>);
    console.log(emails);

    function check() {
        var email = document.getElementById('email').value;
        if (emails.indexOf(email) != -1) {
            document.getElementById('saveplayer').style.visibility = "hidden";
            document.getElementById('alert').innerText = "E-mail je zauzet!"
            document.getElementById('alert').style.color = 'red';
        } else {
            document.getElementById('saveplayer').style.visibility = "visible";
            document.getElementById('alert').innerHTML = "E-mail adresa"
            document.getElementById('alert').style.color = 'white';
        }
    }

</script>

</body>
</html>    