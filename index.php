





<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Car Record Page</title>
    <link rel="stylesheet" type="text/css" href="foo.css" />
</head>

<!-- the body section --


<select name="category_id">
<?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>

-->
<body>
<header><h1>Car Record Page</h1></header>
<main>

    <h1>Record Form</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>

    <form action="add_record.php" method="post">

    <fieldset> 
    <legend>Rental </legend>
            
    
                <div>
            
                <label>VIN:  </label>
                <input type="text" name = "vin"><br>

            
                <label>Vehicle Brand:  </label>
                <input type="text" name = "brand"><br>
           
                <label>Vehicle Model:  </label>
                <input type="text" name = "model"><br>
           
               



                

                <label>Renting</label>
                <select name="renting">
                    <option value = "True">True</option>
                    <option value = "False">False</option>
                </select>
                <br>
                                

                
            
                <label>Maintenance:</label>
                <input type = "text" name = "maintenance"><br>
           
                <label>PurchasedFrom:</label>
                <input type = "text" name = "purchasedfrom"><br>

                <div></div>

                <label>PreviousBookings:  </label>
                <textarea name="previousbookings" rows="2" cols="50"></textarea>

                
            
                <label>Comments</label>
                <textarea name="comments" rows="4" cols="50"></textarea>
                <div id = "submit_button">
                <input type="submit" value="Submit"/><br>
                </div>
   
        
    </fieldset>
    </form>


    <p><a href="display_results.php">Display Rentals</a></p>
    <p><a href="car_rental_form.php">Add Rental</a></p>
    <p><a href="display_record_results.php">Car Records</a></p>


    
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> My Car Rental, Inc.</p>
</footer>
</body>
</html>
