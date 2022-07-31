<?php
require_once('database.php');

// Get IDs
$username = filter_input(INPUT_POST, 'Username');

// Delete the product from the database
if ($username != false && $username != NULL) {
    $query = 'DELETE FROM carrental
              WHERE Username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Product List page
include('display_results.php');
