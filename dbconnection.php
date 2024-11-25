<?php
include 'dbconnection.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];
    $address1 = $_POST['address_line1'];
    $address2 = $_POST['address_line2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postal_code'];
    $country = $_POST['country'];

    $query = "INSERT INTO addresses (user_id, address_line1, address_line2, city, state, postal_code, country) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issssss", $userId, $address1, $address2, $city, $state, $postalCode, $country);
    if ($stmt->execute()) {
        echo "Address saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
