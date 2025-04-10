<?php
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "tshwane_booking");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch all bookings
$sql = "SELECT * FROM bookings ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Bookings</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    table { border-collapse: collapse; width: 100%; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
    th { background-color: #f5f5f5; }
  </style>
</head>
<body>
  <h2>All Room Bookings</h2>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th>Adults</th>
          <th>Children</th>
          <th>Check-in</th>
          <th>Check-out</th>
          <th>Booked On</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["adults"] ?></td>
            <td><?= $row["children"] ?></td>
            <td><?= $row["checkin_date"] ?></td>
            <td><?= $row["checkout_date"] ?></td>
            <td><?= $row["created_at"] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No bookings found.</p>
  <?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
