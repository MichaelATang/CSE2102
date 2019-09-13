<?php
$servername = "localhost";
$username = "root";
$password = "password";
try {
    $conn = new PDO("mysql:host=$servername;dbname=employees", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

        $data = $conn->query("SELECT * FROM departments")->fetchAll();
        foreach ($data as $row) {
                echo $row['dept_name']."<br />\n";
        }

        // try to fix the error below    
        $data = $conn->query("SELECT count(1) as employees_count FROM employees")->fetchAll();
        foreach ($data as $row) {
                echo $row['employees count']."<br />\n";
        }
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

// Close database connection
$conn = null;
?>
