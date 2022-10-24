<?php 
  // set the default values
  if (!isset($apple_variant)) { $apple_variant = ''; }
  if (!isset($list_price)) { $list_price = ''; }
  if (!isset($number_of_apples)) { $number_of_apples = ''; }
  if (!isset($employee_discount)) { $employee_discount = ''; }
?>
<html>
    <head>
        <title>Apple Order</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
<body>
    <main>
        <h1>Apple Order</h1>
        <?php if (!empty($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } //end if statement ?>

        <form action="order_confirmation.php" method="post">
            <div id="data">
                <!-- Apple Variant -->
                <label>Apple Variant:</label>
                <input type="text"  name="apple_variant"
                    value="<?php echo htmlspecialchars($apple_variant); ?>"><br>
                <!-- List Price -->
                <label>List Price:</label>
                <?php if (!empty($error_message)) { ?>
            <p> class="error"><?php echo $error_message; ?></p>
        <?php } //end if ?>
        <form action="order_confirmation.php" method="post">
            <div id="data">
                <select name="list_price">
                    <?php for ($v = 0.50; $v <=4.00; $v += 0.50) : ?>
                        <option value="<?php echo $v; ?>" >
                            <?php echo $v; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
                <!-- # of Apples -->
                <label># of Apples:</label>
                <input type="text"  name="number_of_apples"
                value="<?php echo htmlspecialchars($number_of_apples); ?>"><br>
                <!-- Are you an employee? -->
                <div id ="buttons">
                <label>&nbsp;</label>
                <input type="checkbox" name="employee_status"
                    value="<?php echo $employee_status;?>">Employee?
                <br>
                <label>&nbsp;</label><br>

            <div id="buttons">
                <input type="submit" value="Calculate"><br>
        </form>
     </main>
</body>
</html>