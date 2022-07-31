<?php
// Get the product data


$vin = filter_input(INPUT_POST, 'vin');
$brand = filter_input(INPUT_POST, 'brand');
$model = filter_input(INPUT_POST, 'model');
$bookings = filter_input(INPUT_POST, 'previousbookings');
$renting = filter_input(INPUT_POST, 'renting');
$maintenance = filter_input(INPUT_POST, 'maintenance');
$comments = filter_input(INPUT_POST, 'comments');
$purchasedfrom = filter_input(INPUT_POST, 'purchasedfrom');




/*

echo 'username:' . $new_username . '<br>';
echo 'vin:' . $vin . '<br>';
echo 'brand:' . $brand . '<br>';
echo 'model:' . $model . '<br>';
echo 'type:' . $cartype . '<br>';
echo 'price per day: ' . $priceperday . '<br>';
echo 'unlimited: ' . $unlimited .  '<br>';
echo 'pre paid gas: ' . $prepaidgas . '<br>';
echo 'price per mile: ' . $pricepermile . '<br>';
echo 'pickup: ' . $pickup . '<br>';
echo 'dropoff: ' . $dropoff . '<br>';

*/


// Validate inputs
if ($vin == NULL || $vin == FALSE ||$brand == NULL || $brand == FALSE || $model == NULL || $model == FALSE ||
    $bookings == NULL || $bookings == FALSE || $renting == FALSE || $renting == NULL
    || $maintenance == FALSE || $maintenance == NULL || $comments == FALSE ||
    $comments == NULL || $purchasedfrom == NULL || $purchasedfrom == FALSE)
        
    {
    $error = "Invalid car data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');


    $query = 'INSERT INTO carrecord
        (VehicleID, Brand, Model, PreviousBookings, Comments, Maintenance, 
        Renting, PurchasedFrom)
    VALUES
        (:vin, :brand, :model, :bookings, :comments,  :maintenance,
         :renting, :purchasedfrom)';

    $statement = $db->prepare($query);

    $statement->bindValue(':vin', $vin);
    $statement->bindValue(':brand', $brand);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':bookings', $bookings);

    $statement->bindValue(':renting', $renting);
    $statement->bindValue(':maintenance', $maintenance);
    $statement->bindValue(':comments', $comments);
    $statement->bindValue(':purchasedfrom', $purchasedfrom);

    $statement->execute();
    $statement->closeCursor();
    // Display the Product List page

    include('display_record_results.php');

  

}


?>



