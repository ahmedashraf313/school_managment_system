<?php
$user='ahmed';
$pass='1234';
try {
    $conn = new PDO("mysql:host=localhost:3306;dbname=task4", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
?>