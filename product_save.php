<?php
echo "<pre>";

$name = $_POST['name'];
$price = $_POST['price'];
$instock = $_POST['instock'];

$servername = "localhost";
$username = "gigi";
$password = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password,'wad_first_testing_database');

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}


//SQL

$add = "INSERT INTO products (name,price,instock) VALUES ('$name',$price,$instock)";
var_dump($add);

$query = mysqli_query($conn,$add); // working stage
var_dump($query);

if($query){
    header("location:index.php");
}

