<?php
    // capture the data from the form
    $product_name = filter_input(INPUT_POST, 'product_name');
    $list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
    $discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_INT);

//validate the date
$error_message = ''; //baseline value
if (empty($product_name)) {
    $error_message .= 'Product Description is a required field.<br>';
}

// validate the list price
if ($list_price === FALSE) {
    $error_message .= 'List price must be a valid number.<br>';
} else if ($list_price <= 0) {
    $error_message .= 'List price must be greater than 0.<br>';
}


// validate discount percent
if ($discount_percent === FALSE) {
    $error_message .= 'Discount Percent must be a valid whole number.<br>';
} else if ($discount_percent <= 0) {
    $error_message .= 'Discount Percent must be greater than 0.<br>';
}

if ($error_message != '') {
    include('main.php');
    exit();
}

    //Calculate discount
    $discount = $list_price * $discount_percent * .01;
    $discount_price = $list_price - $discount;

    //Sales Tax
    define('SALES_TAX_PERCENT', 8);
    $sales_tax = $discount_price * SALES_TAX_PERCENT * .01;

    // Identify sales total
    $sales_total = $discount_price + $sales_tax;

    // formatting...
    $list_price_formatted = "$".number_format($list_price, 2);
    $discount_percent_formatted = $discount_percent."%";
    $discount_formatted = "$".number_format($discount, 2);
    $discount_price_formatted = "$".number_format($discount_price, 2);
    $sales_tax_percent_formatted = SALES_TAX_PERCENT."%";
    $sales_tax_formatted = "$".number_format($sales_tax, 2);
    $sales_total_formatted = "$".number_format($sales_total, 2);

?>
<html>
    <head>
        <title>Orchard Discounts</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <h1>Apple Discount</h1>

            <label>Product Name:</label>
            <span><?php echo htmlspecialchars($product_name); ?></span><br>

            <label>List Price:</label>
            <span><?php echo htmlspecialchars($list_price_formatted); ?></span><br>

            <label>Standard Discount:</label>
            <span><?php echo htmlspecialchars($discount_percent_formatted); ?></span><br>

            <label>Discount Amount:</label>
            <span><?php echo $discount_formatted; ?></span><br>

            <label>Discount Price:</label>
            <span><?php echo $discount_price_formatted; ?></span><br>

            <br>

            <label>Sales Tax Rate:</label>
            <span><?php echo $sales_tax_percent_formatted; ?></span><br>

            <label>Sales Tax Amount:</label>
            <span><?php echo $sales_tax_formatted; ?></span><br>

            <label>Sales total:</label>
            <span><?php echo $sales_total_formatted; ?></span><br>
        </main>
    </body>
</html>