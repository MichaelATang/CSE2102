<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO students (fname, lname, major) VALUES ('John', 'Doe', 'Computer Science')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql . " <br> ". $conn->error;
}


$conn->close();
?>
