<?php

include(join(DIRECTORY_SEPARATOR, array('..', 'includes', 'init.php')));

include_once('luckynumberlist.php');

echo json_encode($finalnumberlist);