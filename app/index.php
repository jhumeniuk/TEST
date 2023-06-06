<!DOCTYPE html>
<html>
<head>
    <title>MySQL Tables</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Company Information</h1>

<?php
$host = '172.21.0.2';  // The hostname of the MySQL container
$username = 'root';
$password = 'password';  // The password you set for the MySQL container
$database = 'mydatabase';  // The name of the MySQL database

// Create a new MySQLi object
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch data from the database
$result = $mysqli->query("SELECT * FROM users");

// Display the data in a table
echo "<table>";
echo "<tr><th>Company_Name</th><th>Company_ID</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['company_id'] . "</td>";
    echo "<td>" . $row['company_name'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Fetch data from the database
$result = $mysqli->query("SELECT * FROM Account");

// Display the data in a table
echo "<table>";
echo "<tr><th>Account_ID</th><th>Account_name</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['account_id'] . "</td>";
    echo "<td>" . $row['account_name'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Fetch data from the database
$result = $mysqli->query("SELECT * FROM Project");

// Display the data in a table
echo "<table>";
echo "<tr><th>Project_ID</th><th>Project_name</th><th>Project_Status</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['project_id'] . "</td>";
    echo "<td>" . $row['project_name'] . "</td>";
    echo "<td>" . $row['project_status'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close the MySQL connection
$mysqli->close();
?>

</body>
</html>

