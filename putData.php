<?php
    $MessagesFile = 'groups/'.$_POST['file_name'];
    $handle = fopen($MessagesFile, 'r') or die('Cannot open file:  ' . $MessagesFile);
    $message     = fread($handle, filesize($MessagesFile));
    $message     = $message . $_POST['msg'] . "\n";
    
    $message     = str_replace($notAlloweds, $replacers, $message);
    fclose($handle);
    $handle2 = fopen($MessagesFile, 'w') or die('Cannot open file:  ' . $MessagesFile);
    fwrite($handle2, $message);
    fclose($handle2);
?>
