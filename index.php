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
        while($row = $result1->fetch_assoc()) {
            echo "<p><strong>ID:</strong> " . $row["itemid"]. " - <strong>Name In English:</strong> " . $row["nameen"]. " - <strong>Name In Mongolian:</strong> " . $row["namemn"].  " - <strong>Wikipedia Link:</strong> " . $row["wikilink"]. " - <strong>Type:</strong> " . $row["type"]."</p>";
        }

        if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                echo "<p><strong>ID:</strong> " . $row["itemid"]. " - <strong>Country:</strong> " . $row["countryoforigin"]. " - <strong>Condition:</strong> " . $row["condition1"]. " - <strong>Total Weight:</strong> " . $row["weight"]. " - <strong>Unit:</strong> " . $row["unit"]. " - <strong>Shipped via:</strong> " . $row["shippedby"]. " - <strong>Number of container:</strong> " . $row["quantity"]. "</p>";
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