<?php
//write php code here
    $orchardregion = $_GET['orchardregion'];
    $appletype = $_GET['appletype'];
    $orchardname = $_GET['orchardname'];
?>

<html>
    <head>
            <title>First Php Page</title>
    </head>
    <body>
        <h2>Apple Orchards</h2>
        <p>Orchard Region: <?php echo $orchardregion; ?></p>
        <p>Apple Type: <?php echo $appletype; ?></p>
        <p>Orchard Name: <?php echo $orchardname; ?></p>
    </body>
</html>