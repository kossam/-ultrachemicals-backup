<?php

    $to = "info@ultrachemicals.co.za";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $headers = "From: $from";
    $subject = "You have a message from your Template";

    $fields = array('name' => 'Name', 'email' => 'Email', 'time' => 'Time', 'sub' => 'Subject', 'category' => 'Category', 'message' => 'Message'); // array variable name => Text to appear in email
    

    $body = "Here is the message you got:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }

    $send = mail($to, $subject, $body, $headers);

?>
