<?php

    $MessagesFile = 'groups/'.$_POST['file_name'];
    $homepage = file_get_contents($MessagesFile);
    echo $homepage;
?>