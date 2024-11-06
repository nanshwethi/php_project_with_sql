<?php

// echo "<pre>";

$id = $_GET['id'];

$servername = "localhost";
$username = "gigi";
$password = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, 'wad_first_testing_database');

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}

//SQL

$product_delete = "DELETE FROM products WHERE id=$id";
var_dump($product_delete);

$query = mysqli_query($conn, $product_delete); // working stage
var_dump($query);

if($query){
    header("location:index.php");
}

?>