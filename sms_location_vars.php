<?php
    // we can get the number of the sender using the 'Fromn' request value
    $from = $_REQUEST['From'];
    $city = $_REQUEST['FromCity'];
    $state = $_REQUEST['FromState'];
    $zip = $_REQUEST['FromZip'];
    $country = $_REQUEST['FromCountry'];
    $msg = $_REQUEST['Body'];

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    // get the exact time of the response
    $t = time();
    // set the timezone
    date_default_timezone_set('America/New_York');

    // open a file ponter to write our data
    $fp = fopen("data.txt", "a");
    fwrite($fp, $from . "," . $city . "," . $state . "," . $zip . "," . $country . "," . date("c", $t) . "\n");
    
    // close out file pointer
    fclose($fp);
?>
<Response>
    <Message>Thanks! Here's your phone's location: <?php echo $city . ", " . $state . ", " . $zip . ", " . $country; ?></Message>
</Response>
