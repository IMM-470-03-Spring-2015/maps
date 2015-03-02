<?php
    // we can get the number of the sender using the 'Fromn' request value
    $from = $_REQUEST['From'];
    $msg = $_REQUEST['Body'];

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    
    // break up the message into an array for cleaning
    $msg_arr = explode(",",$msg);
    // remove any extra spaces
    for($i=0; $i<count($msg_arr); $i++){
        $msg_arr[$i] = trim($msg_arr[$i]);
    }
    
    // put it back together as coma separated
    $msg = implode(",",$msg_arr);

    // open a file ponter to write our data
    $fp = fopen("twilio_data.txt", "a");
    fwrite($fp,  $msg . "\n");
    
    // close out file pointer
    fclose($fp);
?>
<Response>
    <Message>Thanks for the incident report!</Message>
</Response>
