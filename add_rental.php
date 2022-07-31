<?php
// Get the product data
$new_username = filter_input(INPUT_POST, 'username');
$vin = filter_input(INPUT_POST, 'vin');
$brand = filter_input(INPUT_POST, 'brand');
$model = filter_input(INPUT_POST, 'model');
$cartype = filter_input(INPUT_POST, 'type');
$priceperday = filter_input(INPUT_POST, 'priceperday');
$unlimited = filter_input(INPUT_POST, 'unlimited');
$prepaidgas = filter_input(INPUT_POST, 'prepaidgas');
$pricepermile = filter_input(INPUT_POST,"pricepermile");
$pickup = filter_input(INPUT_POST, "pickup");
$dropoff = filter_input(INPUT_POST,"dropoff");
$date = filter_input(INPUT_POST, 'date');





if($unlimited === "True"){
    $pricepermile = 'UNL'; 
} 


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
echo 'date:  ' . $date . '<br>';

*/

// Validate inputs
if ($new_username == NULL  || $new_username == FALSE || $vin == NULL 
|| $vin == FALSE ||
    $brand == NULL || $brand == FALSE || $model == NULL || 
    $model == FALSE ||
    $cartype == NULL || $cartype == FALSE || $priceperday == NULL || 
    $priceperday == FALSE
    || $pickup == NULL || $pickup == FALSE || $dropoff == NULL ||
     $dropoff == FALSE || $date == FALSE || $date == NULL) 
        
    {
    $error = "Invalid rental data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    try{
        echo 'Should be updating the database...';

        $query = 'INSERT INTO carrental
            (Username, VehicleID, Brand, Model, Car_Type, PricePerDay, Mileage,
            PrePaidGas, PickUp, DropOff)
        VALUES
            (:username, :vin, :brand, :model, :Car_Type, :priceperday, :mileage,
            :prepaid, :pickup, :dropoff)';

        $statement = $db->prepare($query);

        $statement->bindValue(':username', $new_username);
        $statement->bindValue(':vin', $vin);
        $statement->bindValue(':brand', $brand);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':Car_Type', $cartype);
        $statement->bindValue(':priceperday', $priceperday);
        $statement->bindValue(':mileage', $pricepermile);
        $statement->bindValue('prepaid', $prepaidgas);
        $statement->bindValue(':pickup', $pickup);
        $statement->bindValue(':dropoff', $dropoff);

        $statement->execute();
        $statement->closeCursor();
        // Display the Product List page



        
        $query = 'SELECT PreviousBookings FROM carrecord
        WHERE VehicleID = :vehicle_id'; 
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vin); 
        $statement->execute(); 
        $date_p = $statement->fetch(); 
        $statement->closeCursor();
        $previous_dates = $date_p[0];
        echo $previous_dates;


        $query = "UPDATE carrecord
        SET PreviousBookings = :date1 
        WHERE VehicleID = :vehicle_id";

        $date_insert = $previous_dates . ' ' . $date;
        $statement = $db->prepare($query); 
        $statement->bindValue(':date1', $date_insert);
        $statement->bindValue(':vehicle_id', $vin); 
        $statement->execute(); 
        $statement->closeCursor();

        include('display_results.php');
    } catch(Exception $e){
        echo 'Exception ->';
        var_dump($e->getMessage());
    }

    

}


   


?>



