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
$sql = "SELECT * FROM iteminfo";
$result = $conn->query($sql);

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
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>ID:</strong> " . $row["itemid"]. " - <strong>Name In English:</strong> " . $row["nameen"]. " - <strong>Name In Mongolian:</strong> " . $row["namemn"].  " - <strong>Wikipedia Link:</strong> " . $row["wikilink"]. " - <strong>Type:</strong> " . $row["type"]."</p>";
        }
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>