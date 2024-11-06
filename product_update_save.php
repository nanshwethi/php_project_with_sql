<?php

echo '<pre>';
$id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$instock=$_POST['instock'];

$servername = "localhost";
$username = "gigi";
$password = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, 'wad_first_testing_database');

$update = "UPDATE products SET name='$name',price=$price,instock=$instock WHERE id=$id";
var_dump($update);

$query = mysqli_query($conn,$update); // working stage
var_dump($query);

if($query){
    header("location:index.php");
}