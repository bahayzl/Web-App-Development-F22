<?php
  if(!isset($years)) { $years = '5'; }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Financial Calculator App</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
<body>
    <main>
        <h1>Financial Calculator</h1>
        <?php if (!empty($error_message)) { ?>
            <p> class="error"><?php echo $error_message; ?></p>
        <?php } //end if ?>
        <form action="display_results.php" method="post">
            <div id="data">
                <label>Investment Amount</label>
                <select name="investment">
                    <?php for ($v = 10000; $v <=30000; $v += 2500) : ?>
                        <option value="<?php echo $v; ?>" >
                            <?php echo $v; ?>
                        </option>
                    <?php endfor; ?>
                </select><br>
            </div>

            <div id ="buttons">
                <label>&nbsp;</label>
                <input type="checkbox" name="compound_monthly">Compound Monthly
                <br>
                <label>&nbsp;</label>
                <input type="submit" value="Calculate"><br>
         </form>
</body>