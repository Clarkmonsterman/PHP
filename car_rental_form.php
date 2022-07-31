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

<!-- the head section -->

<head>
    <title>Car Record Page</title>
    <link rel="stylesheet" type="text/css" href="foo.css" />
</head>


<!-- the body section -->
<body>
<header><h1>Car Rental Page</h1></header>
<main>

    <h1>Rental Form</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>

    <form action="add_rental.php" method="post">

    <fieldset> 
    <legend>Rental </legend>

    
            
                <label>Username:       </label>
                <input type="text" name="username"><br>

            
                <label>VIN Number:</label>
                <select name = "vin">
                <?php foreach ($rentals as $rental) : ?>
                    <?php if($rental['Renting'] == 'True'): ?>
                    <option value = "<?php echo $rental['VehicleID']; ?>">
                        <?php echo $rental['VehicleID'];?>
                    </option>
                    <?php endif; ?>
                        
                    <?php endforeach; ?>
                </select>
    
                <br>


                <label>Brand:</label>
                <select name = "brand">
                <?php foreach ($rentals as $rental) : ?>
                    <?php if($rental['Renting'] == 'True'): ?>
                    <option value = "<?php echo $rental['Brand']; ?>">
                        <?php echo $rental['Brand'];?>
                    </option>
                    <?php endif; ?>
                        
                    <?php endforeach; ?>
                </select>
                <br>

            
                <label>Vehicle Model:</label>
                <select name = "model">
                <?php foreach ($rentals as $rental) : ?>
                    <?php if($rental['Renting'] == 'True'): ?>
                        <option value = "<?php echo $rental['Model']; ?>">
                            <?php echo $rental['Model'];?>
                        </option>
                    <?php endif; ?>
                
            
                    
                        
                    <?php endforeach; ?>
                </select>
                <br>


                
            
                <label>Vehicle Type:   </label>
                <input type = "text" name = "type"><br>
           
                <label>Price Per Day:  </label>
                <input type = "text" name = "priceperday"><br>
            
                <label>Unlimited Mileage:      </label>
                <select name="unlimited">
                    <option value = "True">True</option>
                    <option value = "False">False</option>
                </select>
                <br>

                <label>Pre-Paid Gas: </label>
                <select name="prepaidgas">
                    <option value = "True">True</option>
                    <option value = "False">False</option>
                </select>
                <br>
            
                <label>Price Per Mile: </label>
                <input type = "text" name ="pricepermile"><br>

                
            
                <label>Pickup Location:</label>
                <input type = "text" name = "pickup"><br>
           
                <label>DropOff Location:</label>
                <input type = "text" name = "dropoff"><br>
                <label>Date:</label>
                <input type = "text" name = "date"><br>
                <div id = "submit_button">
                <input type="submit" value="Submit"/><br>
                </div>
   
                
    </fieldset>
    </form>


    <p><a href="display_results.php">Display Rentals</a></p>
    <p><a href="index.php">Add Car Record</a></p>
    <p><a href="display_record_results.php">Car Records</a></p>


    
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> My Car Rental, Inc.</p>
</footer>
</body>
</html>
