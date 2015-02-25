<?php
    // we can get the number of the sender using the 'Fromn' request value
    $from = $_REQUEST['From'];
    $msg = $_REQUEST['Body'];
   
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    // get the exact time of the response
    $t = time();

    // set the timezone
    date_default_timezone_set('America/New_York');

    // open a file ponter to write our data
    $fp = fopen("data.txt", "a");

    switch($msg){
        case "poll":
            $out = "Thanks for taking our poll! Text us back with the name of your favorite movie from last year!";
        break;
        
        default:
            // write the data file
            fwrite($fp, $from . ',sms,Favorite Movie this year,' . $msg . ',' . date("c", $t) . "\n");
            $out = "Really? Your favorite film last year was " . $msg;
        break;
    }
    
    // close out file pointer
    fclose($fp);
?>
<Response>
    <Message><?php echo $out; ?></Message>
</Response>
