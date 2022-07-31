<?php
    

    require_once('database.php');

    // Get all rentals
    $query = 'SELECT * FROM carrental
                           ORDER BY Username';
    $statement = $db->prepare($query);
    $statement->execute();
    $rentals = $statement->fetchAll();
    $statement->closeCursor();

   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rental Accounts Information</title>
    <link rel="stylesheet" type="text/css" href="display.css"/>
</head>
<body>
    <main>


    <table>
            <tr>
                <th>Username</th>
                <th>VehicleID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Type</th>
                <th>PricePerDay</th>
                <th>Mileage</th>
                <th>PrePaidGas</th>
                <th>PickUp</th>
                <th>DropOff</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($rentals as $rental) : ?>
            <tr>
                <td><?php echo $rental['Username']; ?></td>
                <td><?php echo $rental['VehicleID']; ?></td>
                <td><?php echo $rental['Brand']; ?></td>
                <td><?php echo $rental['Model']; ?></td>
                <td><?php echo $rental['Car_Type']; ?></td>
                <td><?php echo $rental['PricePerDay']; ?></td>
                <td><?php echo $rental['Mileage']; ?></td>
                <td><?php echo $rental['PrePaidGas']; ?></td>
                <td><?php echo $rental['PickUp']; ?></td>
                <td><?php echo $rental['DropOff']; ?></td>

                <td><form action="delete_rental.php" method="post">
                    <input type="hidden" name="Username"
                           value="<?php echo $rental['Username']; ?>">
                    <div id = "delete_button">
                    <input type="submit" value="Delete">
                    </div>
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
            
    </main>



</body>

<footer>
    <p><a href="index.php">Add Car Record</a></p>
    <p><a href="car_rental_form.php">Add Rental</a></p>
    <p><a href="display_record_results.php">Car Records</a></p>
</footer>
</html>