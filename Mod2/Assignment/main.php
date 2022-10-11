<?php 
  // set the default values
  if (!isset($product_name)) { $product_name = ''; }
  if (!isset($list_price)) { $list_price = ''; }
  if (!isset($discount_percent)) { $discount_percent = ''; }
?>
<html>
    <head>
        <title>Apple Discounts</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
<body>
    <main>
        <h1>Orchard Discount</h1>
        <?php if (!empty($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } //end if statement ?>

        <form action="applediscount.php" method="post">
            <div id="data">
                <!-- Product Description -->
                <label>Product Name:</label>
                <input type="text"  name="product_name"
                    value="<?php echo htmlspecialchars($product_name); ?>"><br>
                <!-- List Price -->
                <label>List Price:</label>
                <input type="text"  name="list_price"
                    value="<?php echo htmlspecialchars($list_price); ?>"><br>
                <!-- Discount Percentage -->
                <label>Discount Percentage:</label>
                <input type="text"  name="discount_percent"
                    value="<?php echo htmlspecialchars($discount_percent); ?>"><br>
                <span>%</span><br>
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calculate"><br>
        </form>
     </main>
</body>
</html>