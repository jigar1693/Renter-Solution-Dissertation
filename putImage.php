<?php
    $MessagesFile = 'groups/'.$_POST['file_name'];
    $handle = fopen($MessagesFile, 'r') or die('Cannot open file:  ' . $MessagesFile);
    $message     = fread($handle, filesize($MessagesFile));
    $milliseconds = round(microtime(true) * 1000);
    $url = 'images/chatImage_'.$milliseconds.'.png';
    $message     = $message . $_POST['username'] . " : " . $url . "\n";
    $image     = $_POST['image'] ;
            

    file_put_contents($url, base64_decode($image));
    $message     = str_replace($notAlloweds, $replacers, $message);
    fclose($handle);
    $handle2 = fopen($MessagesFile, 'w') or die('Cannot open file:  ' . $MessagesFile);
    fwrite($handle2, $message);
    fclose($handle2);
?>
