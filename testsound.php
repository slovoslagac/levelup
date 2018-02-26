<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 10.1.2018
 * Time: 15:41
 */
?>


<!DOCTYPE html>
<html>
<body>

<audio id="myAudio">
<!--    <source src="horse.ogg" type="audio/ogg">-->
    <source src="sound/default.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<p>Click the buttons to play or pause the audio.</p>

<button onclick="playAudio()" type="button">Play Audio</button>
<button onclick="pauseAudio()" type="button">Pause Audio</button>

<script>
    var x = document.getElementById("myAudio");

    function playAudio() {
        x.play();
    }

    function pauseAudio() {
        x.pause();
    }
</script>

</body>
</html>
