<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Car Rental Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>Car Rental Shop</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Car Rental Shop, Inc.</p>
    </footer>
</body>
</html>