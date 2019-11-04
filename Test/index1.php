<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is secure area.</p>
<?php
require('db.php');

$sql = "SELECT id, food, suburb, restaurant, price, quantity FROM list";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Food: " . $row["food"]. " - Suburb: " . $row["suburb"]. " - Restaurant: " . $row["restaurant"]. " - Price: " . $row["price"]. " - Quantity: " . $row["quantity"]. '<a href="dashboard.php?varname=<?php echo $row["id"] ?> Book Now</a>' . "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($con);
?>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>