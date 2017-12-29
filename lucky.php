<!DOCTYPE HTML>
<?php

//include_once('luckycalculation.php');
?>
<html>
<head>
    <title>LuckyNumbers</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]>
    <script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="main.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ie8.css"/><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div id="screen">
    <?php for ($i = 1; $i < 6; $i++) { ?>
        <div class="number<?php echo $i ?>">
            <div class="numbers">
                <div class="number" id="<?php echo $i ?>" style="display:none;"></div>
                <div class="hours">3 sata</div>
            </div>
        </div>
    <?php } ?>
</div>
<script>

    var numOfCalls = 1;
    var int;
    var realtime = new Date();
    var redirecttime = new Date();

    function test() {
        $(document).ready(function () {
            $.getJSON('luckycalculation.php', function (data) {
                if ($.trim(data)) {
                    $.each(data, function (key, val) {
                        var idnum = key + 1;
                        $('#' + idnum).text(val[0]);
                        if (val[1] == 1) {
                            $('#' + idnum).addClass('lucky_won');
                        } else {
                            $('#' + idnum).addClass('lucky_not');
                        }
                    });
                    if (numOfCalls > 5) {
//                        clearTimeout(checktime);
                        window.clearInterval(int);
                    } else {
                        int = self.setInterval("display()", 3000);
                    }
                } else {
                    window.setTimeout(test, 1000);
                }
            });
        });
    }

    function checktime() {
        var time = new Date();
        realtime.setHours(0, 0, 0, 0);
        if (time.getHours() > 13) {
            realtime.setHours(21);
        } else {
            realtime.setHours(12);
        }
        if (time > realtime) {
            test();
        } else {
            window.setTimeout(checktime, 1000);
        }
    }

    function display() {
//        console.log(numOfCalls);
        document.getElementById(numOfCalls).style.display = "block";
        numOfCalls++;
        if (numOfCalls > 5) {
            window.clearInterval(int);
            var val = realtime.getHours();
            redirecttime.setHours(val, 15, 0);
            redirect();
        }
//        console.log(numOfCalls);
    }


    function redirect() {
        var time = new Date();
        if (time > redirecttime) {
            window.location = "http://www.google.com";
        } else {
            window.setTimeout(redirect, 1000);
            console.log(redirecttime, time);
        }
    }


    checktime();

</script>
</body>

</html>