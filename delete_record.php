<?php
require_once('database.php');

// Get IDs
$vin = filter_input(INPUT_POST, 'vin');

// Delete the product from the database
if ($vin != false && $vin != NULL) {
    $query = 'DELETE FROM carrecord
              WHERE VehicleID = :vin';
    $statement = $db->prepare($query);
    $statement->bindValue(':vin', $vin);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Product List page
include('display_record_results.php');
