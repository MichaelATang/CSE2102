<<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT dept_no, dept_name FROM departments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "sid: " . $row["dept_no"]. " - Name: " . $row["dept_name"]. " <br>";
        echo "<hr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
