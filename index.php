<?php

include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));

if (isset($_POST['saveplayer'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordrepeat = $_POST['password_repeat'];
    $phone = $_POST['telephone'];
    $tournament_id = $_POST['tournament'];
    $hash = md5(rand(0, 1000));
    $crypt_password = crypt($password);
    $tmp_cmp_player = new cmp_player();
    $new_player = new cmp_player();
    $check_tmp_cmp_player = $new_player->getattribute($email);
    $tmp_tournamenet = new cmp_tournament();
    $current_tournament = $tmp_tournamenet->getTournamentById($tournament_id);
    $tournament_name = $current_tournament->tournamentname . '(' . $current_tournament->starttime . ')';

    if ($password == $passwordrepeat) {
        $tmp_cmp_player->setattribute('username', $username);
        $tmp_cmp_player->setattribute('phone', $phone);
        $tmp_cmp_player->setattribute('email', $email);
        $tmp_cmp_player->setattribute('password', $crypt_password);
        $tmp_cmp_player->setattribute('hash', $hash);


        if ($check_tmp_cmp_player == '') {
            try {
                $tmp_cmp_player->addplayer();
            } catch (Exception $e) {
                logAction("Greska kod kreiranja novog tima", "'username', $username,'phone', $phone,'email', $email", 'cmp_team.txt');
            }

        }
        $current_player = $new_player->getattribute($email);


        $tmp_tour_entry = new cmp_tournament_entry();
        $tmp_tour_entry->setattribute('playerid', $current_player->id);
        $tmp_tour_entry->setattribute('tournamentid', $tournament_id);
        $tmp_player_number = $tmp_tour_entry->getplayerstatus();
        if ( $tmp_player_number < 3 ) {
            $new_player_number = $tmp_player_number +1;
            $tmp_tour_entry->setattribute('numberplayerentery', $new_player_number);
            $tmp_tour_entry->addtournamententry();

            $tmp_match = new cmp_matches();
            $tmp_match->addattribute('tournamentid', $tournament_id);
            $tmp_match->addattribute('homeparticipantid',$current_player->id );
            $tmp_match->addattribute('roundid',$new_player_number );
            $tmp_match->addmatch();

            sendmailSuccess($email, $tournament_name);
        } else {
            $message= "Prekoračili se maksimalan broj prijava za turnir $tournament_name - ($tmp_player_number) !";
            sendmailUnSuccess($email, $tournament_name, $message);
        }
    } else {
        $message= "Vas prijava na turnir $tournament_name nije uspela, molimo vas pokusajte ponovo.";
        sendmailUnSuccess($email, $tournament_name, $message);
    }
    unset($tmp_cmp_player, $new_player, $current_player, $tmp_tour_entry, $check_tmp_cmp_player, $current_tournament, $tmp_tournamenet);

    header("Refresh:0");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Eventoz : Home</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <!-- Montserrat for title -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Start Header -->
<header id="mu-hero" class="" role="banner">
    <!-- Start menu  -->
    <nav class="navbar navbar-fixed-top navbar-default mu-navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Logo -->
                <a class="navbar-brand" href="index.php">LevelUp!</a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav mu-menu navbar-right">
                    <li><a href="#mu-hero">Home</a></li>
                    <li><a href="#mu-about">About Us</a></li>
                    <li><a href="#mu-schedule">Schedule</a></li>
                    <li><a href="#mu-speakers">Speakers</a></li>
                    <li><a href="#mu-pricing">Price</a></li>
                    <li><a href="#mu-register">Register</a></li>
                    <li><a href="#mu-sponsors">Sponsors</a></li>
                    <li><a href="#mu-contact">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- End menu -->

    <div class="mu-hero-overlay">
        <div class="container">
            <div class="mu-hero-area">

                <!-- Start hero featured area -->
                <div class="mu-hero-featured-area">
                    <!-- Start center Logo -->
                    <div class="mu-logo-area">
                        <!-- text based logo -->
                        <!-- <a class="mu-logo" href="#">Lev</a> -->
                        <!-- image based logo -->
                        <a class="mu-logo" href="#"><img src="assets/images/logo.jpg" alt="logo img"></a>
                    </div>
                    <!-- End center Logo -->

                    <div class="mu-hero-featured-content">

                        <h1>Prvi PUBG turnir u Srbiji!</h1><br>
                        <h2>Učešće: 300 din | Novčane nagrade za najbolje</h2><br>
                        <p class="mu-event-date-line">Nedelja, 25. februar u 10h</p>

                        <div class="mu-event-counter-area">
                            <div id="mu-event-counter">

                            </div>
                        </div>

                    </div>
                </div>
                <!-- End hero featured area -->

            </div>
        </div>
    </div>
</header>
<!-- End Header -->

<!-- Start main content -->
<main role="main">
    <!-- Start About -->
    <section id="mu-about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-about-area">
                        <!-- Start Feature Content -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mu-about-left">
                                    <img class="" src="assets/images/about.jpg" alt="Men Speaker">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mu-about-right">
                                    <h2>PUBG Madness @LevelUp!</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam aliquam distinctio magni enim error commodi suscipit nobis alias nulla, itaque ex, vitae repellat amet
                                        neque est voluptatem iure maxime eius!</p>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus in accusamus qui sequi nisi, sint magni, ipsam, porro nesciunt id veritatis quaerat ipsum consequatur
                                        laborum, provident veniam quibusdam placeat quam?</p>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate perspiciatis magni omnis excepturi, cumque reiciendis.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Feature Content -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About -->

    <!-- Start Register  -->
    <section id="mu-register">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-register-area">

                        <div class="mu-title-area">
                            <h2 class="mu-title">Registracija</h2>
                            <p>Popunite prijavu i rezervišite svoje mesto na PUBG turniru. Učešće na turniru je 300 din, a prvih 10 igrača koji se prijave igraju od početka turnira. Ostali igrači se sortiraju
                                na listu čekanja i igraju svoje 3 partije čim se oslobodi mesto.</p>
                        </div>

                        <div class="mu-register-content">
                            <form class="mu-register-form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Ime i prezime" id="username" name="username" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="E-mail" id="email" name="email" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Lozinka" id="password" name="password" required="" onchange="check()">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Ponovi lozinku" id="password_repeat" name="password_repeat" required="" onchange="check()">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Broj telefona" id="telephone" name="telephone" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <select class="form-control" name="tournament" id="tournament">
                                                <option value="1">Nedelja 25.02.2018.</option>
                                                <option value="2">Nedelja 04.03.2018.</option>
                                                <option value="3">Nedelja 11.03.2018.</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="mu-reg-submit-btn" name="saveplayer" id="saveplayer">PRIJAVI SE</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Register -->


    <!-- Start FAQ -->
    <section id="mu-faq">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-faq-area">

                        <div class="mu-title-area">
                            <h2 class="mu-title">Često postavljana pitanja</h2>
                        </div>

                        <div class="mu-faq-content">

                            <div class="panel-group" id="accordion">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">
                                                <span class="fa fa-angle-down"></span> Koja su pravila turnira?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            Igrač igra tri solo TPP partije na EU serveru. Na kraju svake partije mu se beleži pozicija i broj kill-ova. Na osnovu tih parametara mu se računa broj osvojenih
                                            poena u pojedinačnoj partiji.<br><br>
                                            Ukupan rezultat igrača na turniru je zbir poena iz sve tri partije koje je odigrao.
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    <span class="fa fa-angle-up"></span> Da li sam ograničen samo na 3 partije?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Ukoliko želi, igrač može više puta učestvovati na jednom turniru. Sve što je potrebno da uradi je da se ponovo prijavi, nakon što završi prvo učešće.<br><br>
                                                Svako novo učešće na turniru košta 300 Din, a igrač koji se ponovo prijavi za turnir ne može odmah nastaviti da igra, već ide na kraj liste čekanja i čeka svoj
                                                red.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    <span class="fa fa-angle-up"></span> Da li moram da imam svoj PUBG nalog?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Ne! LevelUp! igraonica će obezbediti dovoljan broj naloga za igru, tako da nije neophodno da igrate sa svojim nalogom.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                    <span class="fa fa-angle-up"></span> Šta se dešava ukoliko igrači imaju jednak broj poena na tabeli?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Ukoliko dva ili više igrača imaju jednak broj poena na kraju takmičenja, a nalaze se na mestima koja se nagrađuju, bolje je pozicioniran onaj igrač koji je imao
                                                više kill-ova u tri odigrane partije.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                                    <span class="fa fa-angle-up"></span> Da li će biti još ovakvih PUBG turnira?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFive" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Da! Svake nedelje sa početkom u 10h će biti organizovan novi PUBG turnir u LevelUp! igraonici.
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End FAQ -->


    <!-- Start Venue -->
    <section id="mu-venue">
        <div class="mu-venue-area">
            <div class="row">

                <div class="col-md-6">
                    <div class="mu-venue-map">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2829.770179725518!2d20.410527815972756!3d44.82624642909853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x798912289748c231!2sStari+Merkator!5e0!3m2!1sen!2srs!4v1519401640613"
                            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mu-venue-address">
                        <h2>LOKACIJA <i class="fa fa-chevron-right" aria-hidden="true"></i></h2>
                        <h3>LevelUp! Igraonica</h3>
                        <h4>Palmira Toljatija 5, TC Stari Merkator, Novi Beograd</h4>
                        <p>LevelUp! igraonica se nalazi na 3. spratu u TC Stari Merkator na Novom Beogradu. Igraonica se nalazi u delu tržnog centra pored pijace, u istoj vertikali gde i Pošta i NBG Gym
                            teretana. </p>
                        <p>
                            <a href="http://www.facebook.com/LevelUpNbg">facebook.com/LevelUpNbg</a> | <a href="http://www.instagram.com/LevelUpNbg">instagram.com/LevelUpNbg</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Venue -->


    <!-- Start Contact -->
    <section id="mu-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-contact-area">

                        <div class="mu-title-area">
                            <h2 class="mu-heading-title">Kontaktiraj nas</h2>
                            <p>Ukoliko imaš dodatnih pitanja u vezi PUBG turnira, kontaktiraj nas putem kontakt forme.</p>
                        </div>

                        <!-- Start Contact Content -->
                        <div class="mu-contact-content">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mu-contact-form-area">
                                        <div id="form-messages"></div>
                                        <form id="ajax-contact" method="post" action="mailer.php" class="mu-contact-form">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Ime i prezime" id="name" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="E-mail adresa" id="emailquestion" name="emailquestion" required>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="Poruka" id="message" name="message" required></textarea>
                                            </div>
                                            <button type="submit" class="mu-send-msg-btn"><span>POŠALJI PORUKU</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Contact Content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact -->

</main>

<!-- End main content -->


<!-- Start footer -->
<footer id="mu-footer" role="contentinfo">
    <div class="container">
        <div class="mu-footer-area">
            <div class="mu-footer-top">
                <div class="mu-social-media">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <div class="mu-footer-bottom">
                <p class="mu-copy-right">&copy; Copyright Chumpitas. All right reserved.</p>
            </div>
        </div>
    </div>

</footer>
<!-- End footer -->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Slick slider -->
<script type="text/javascript" src="assets/js/slick.min.js"></script>
<!-- Event Counter -->
<script type="text/javascript" src="assets/js/jquery.countdown.min.js"></script>
<!-- Ajax contact form  -->
<script type="text/javascript" src="assets/js/app.js"></script>


<!-- Custom js -->
<script type="text/javascript" src="assets/js/custom.js"></script>

<script>
    function check() {
        var pass = document.getElementById('password').value;
        var passrepeat = document.getElementById('password_repeat').value;

        if (pass != '' && passrepeat != '' && pass != passrepeat) {
            document.getElementById('saveplayer').style.visibility = "hidden";
        } else {
            document.getElementById('saveplayer').style.visibility = "visible";
        }
    }

</script>


</body>
</html>