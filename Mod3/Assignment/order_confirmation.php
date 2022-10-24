<?php
    // capture the data from the form
    $apple_variant = filter_input(INPUT_POST, 'apple_variant');
    $list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
    $number_of_apples = filter_input(INPUT_POST, 'number_of_apples', FILTER_VALIDATE_INT);
    $discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_INT);
    $employee_status = filter_input(INPUT_POST, 'employee_status', FILTER_VALIDATE_FLOAT);

//validate the date
$error_message = ''; //baseline value
if (empty($apple_variant)) {
    $error_message .= 'Apple Variant is a required field.<br>';
}

// validate the list price
if ($list_price === FALSE) {
    $error_message .= 'List price must be a valid number.<br>';
} else if ($list_price <= 0) {
    $error_message .= 'List price must be greater than 0.<br>';
}

// validate the number of apples ordered
if ($number_of_apples === FALSE) {
    $error_message .= '# of apples must be a valid number.<br>';
} else if ($list_price <= 0) {
    $error_message .= '# of apples must be greater than 0.<br>';
}

// validate employee status
if ($employee_status === TRUE) {
    $employee_discount_percent = .20;
} else if ($employee_status <= 0) {
    $employee_discount_percent = 0;
}

if ($error_message != '') {
    include('main.php');
    exit();
}

    //Calculate discount
    $discount = $list_price * $employee_discount_percent * .01;
    $discount_price = $list_price - $discount;

    //State Tax
    define('STATE_TAX_PERCENT', 6);
    $state_tax = $discount_price * STATE_TAX_PERCENT * .01;

    //Local Tax
    define('LOCAL_TAX_PERCENT', 1);
    $local_tax = $discount_price * LOCAL_TAX_PERCENT * .01;

    // Identify sales total
    $sales_total = ($discount_price + $state_tax + $local_tax) * $number_of_apples;

    // formatting...
    $list_price_formatted = "$".number_format($list_price, 2);
    $discount_percent_formatted = $discount_percent."%";
    $discount_formatted = "$".number_format($discount, 2);
    $discount_price_formatted = "$".number_format($discount_price, 2);
    $state_tax_percent_formatted = STATE_TAX_PERCENT."%";
    $state_tax_formatted = "$".number_format($state_tax, 2);
    $local_tax_percent_formatted = LOCAL_TAX_PERCENT."%";
    $local_tax_formatted = "$".number_format($local_tax, 2);
    $sales_total_formatted = "$".number_format($sales_total, 2);

?>
<html>
    <head>
        <title>Order Confirmation</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
    <form action="main.php" method="POST">
    <input type="submit" value="Return"/>
    </form>
        <main>
            <h1>Apple Discount</h1>

            <label>Apple Variant:</label>
            <span><?php echo htmlspecialchars($apple_variant); ?></span><br>

            <label>List Price:</label>
            <span><?php echo htmlspecialchars($list_price_formatted); ?></span><br>

            <label># of Apples Ordered:</label>
            <span><?php echo htmlspecialchars($number_of_apples); ?></span><br>

            <label>Discount Amount:</label>
            <span><?php echo $discount_formatted; ?></span><br>

            <label>Discount Price:</label>
            <span><?php echo $discount_price_formatted; ?></span><br>

            <br>

            <label>State Tax Rate:</label>
            <span><?php echo $state_tax_percent_formatted; ?></span><br>

            <label>State Tax Amount:</label>
            <span><?php echo $state_tax_formatted; ?></span><br>

            <label>Local Tax Rate:</label>
            <span><?php echo $local_tax_percent_formatted; ?></span><br>

            <label>Local Tax Amount:</label>
            <span><?php echo $local_tax_formatted; ?></span><br>

            <label>Sales total:</label>
            <span><?php echo $sales_total_formatted; ?></span><br>
        </main>
    </body>
</html>