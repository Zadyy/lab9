<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab9";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch items from the database
$sql1 = "SELECT * FROM iteminfo";
$result1 = $conn->query($sql1);

$sql2 = "SELECT * FROM origin";
$result2 = $conn->query($sql2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items from Database</title>
</head>
<body>

    <h1>Items from Database</h1>

    <?php
    // Check if there are items in the result set
    if ($result1->num_rows > 0) {
        // Output data of each row
        while($row1 = $result1->fetch_assoc()) {
            echo "<p><strong>ID:</strong> " . $row1["itemid"]. " - <strong>Name In English:</strong> " . $row1["nameen"]. " - <strong>Name In Mongolian:</strong> " . $row1["namemn"].  " - <strong>Wikipedia Link:</strong> " . $row1["wikilink"]. " - <strong>Type:</strong> " . $row1["type"]."</p>";
        }

        if ($result2->num_rows > 0) {
            echo "<h1>Items from Origin Table</h1>";
            while($row2 = $result2->fetch_assoc()) {
                echo "<p><strong>ID:</strong> " . $row2["itemid"]. " - <strong>Country:</strong> " . $row2["countryoforigin"]. " - <strong>Condition:</strong> " . $row2["condition1"]. " - <strong>Total Weight:</strong> " . $row2["weight"]. " - <strong>Unit:</strong> " . $row2["unit"]. " - <strong>Shipped via:</strong> " . $row2["shippedby"]. " - <strong>Number of container:</strong> " . $row2["quantity"]. "</p>";
            }
        }
    } else {
        echo "0 results";
    }



    // Close the database connection
    $conn->close();
    ?>

</body>
</html>