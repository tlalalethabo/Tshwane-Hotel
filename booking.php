<?php
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "tshwane_booking");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get values from POST request
$adults = isset($_POST['adults']) ? (int)$_POST['adults'] : 1;
$children = isset($_POST['children']) ? (int)$_POST['children'] : 0;
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$email = $_POST['email'];

// Insert into the database
$sql = "INSERT INTO bookings (email, adults, children, checkin_date, checkout_date)
        VALUES ('$email', $adults, $children, '$checkin', '$checkout')";

if ($conn->query($sql) === TRUE) {
  echo "✅ Room successfully booked!";
} else {
  echo "❌ Error: " . $conn->error;
}

$conn->close();
?>