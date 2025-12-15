<?php
ini_set('display_errors', 1);  // Display errors to help debug
error_reporting(E_ALL);

// Database connection settings
$servername = "localhost:3307";  // Specify the custom port (3307)
$username = "root";              // MySQL username
$password = "";                  // MySQL password (leave blank for root with no password)
$dbname = "tabledb";             // Your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'concern' POST data is received
if (isset($_POST['concern'])) {
    $concern = $_POST['concern'];  // Get the concern data from the POST request

    // Prepare the SQL statement to insert the concern into the database
    $stmt = $conn->prepare("INSERT INTO concerns (concern_text) VALUES (?)");
    $stmt->bind_param("s", $concern);  // "s" means the parameter is a string

    // Execute the query
    if ($stmt->execute()) {
        echo 'success';  // If the insert is successful, return 'success'
    } else {
        echo 'Error: ' . $stmt->error;  // If there's an error, return the error message
    }

    $stmt->close();  // Close the prepared statement
} else {
    echo 'No concern received';  // If no concern is provided in POST data, return an error
}

$conn->close();  // Close the database connection
?>
