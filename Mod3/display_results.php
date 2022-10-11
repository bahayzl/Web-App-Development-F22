<?php

    //Capture data from original screen
    $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_FLOAT);

    //validation
    if ($investment === FALSE) {
        $error_message = 'Investment must be a valid number.';
    } else if ($investment <=0) {
        $error_message = 'Investment must be greater than zero.';
    } else {
        $error_message = '';
    }

    //if error message
    if($error_message != '') {
        include('index.php');
        exit();
    }

    $investment_f = '$'.number_format($investment, 2);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Financial Results</title>
        <link red="stylesheet" type="text/css" href="main.css">
   </head>
   <body>
        <main>
            <h1>Financial Results</h1>
            <label>Investment Amount:</label>
            <span><?php echo $investment_f; ?><span><br>
        </main>
    </body>