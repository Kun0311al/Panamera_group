<!--delete the existing unwanted data without going to cpanel-->
<?php
$servername = 'server_name_of_cpanel';
$username = "database_editor_name";
$password = "user_password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $deleteEmail = $_POST['deleteEmail'];

    // Delete data from the database
    $sql = "DELETE FROM Client_login WHERE Email='$deleteEmail'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: admin.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
