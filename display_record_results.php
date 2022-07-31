<?php
    

    require_once('database.php');

    // Get all rentals
    $query = 'SELECT * FROM carrecord
                           ORDER BY VehicleID';
    $statement = $db->prepare($query);
    $statement->execute();
    $rentals = $statement->fetchAll();
    $statement->closeCursor();

   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Car Records Information</title>
    <link rel="stylesheet" type="text/css" href="display.css"/>
</head>
<body>
    <main>


    <table>
    <div class="tablestuff1 table">
        <thead>
            <tr>
                <th>VehicleID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Bookings</th>
                <th>Comments</th>
                <th>Maintenance</th>
                <th>Renting</th>
                <th>Seller</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

            <tbody>

            <?php foreach ($rentals as $rental) : ?>
            <tr>
                <td><?php echo $rental['VehicleID']; ?></td>
                <td><?php echo $rental['Brand']; ?></td>
                <td><?php echo $rental['Model']; ?></td>
                <td><?php echo $rental['PreviousBookings']; ?></td>
                <td><?php echo $rental['Comments']; ?></td>
                <td><?php echo $rental['Maintenance']; ?></td>
                <td><?php echo $rental['Renting']; ?></td>
                <td><?php echo $rental['PurchasedFrom']; ?></td>

                <td><form action="delete_record.php" method="post">
                    <input type="hidden" name="vin"
                           value="<?php echo $rental['VehicleID']; ?>">
                    <div id = "delete_button">
                    <input type="submit" value="Delete">
                    </div>
                </form></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
            
    </main>


    
</body>
<footer>
    <p><a href="index.php">Add Car Record</a></p>
    <p><a href="car_rental_form.php">Add Rental</a></p>
    <p><a href="display_results.php">Rental Records</a></p>
</footer>

</html>


            