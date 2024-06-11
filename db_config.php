<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_smoe";

// conncet to the database
$conn = mysqli_connect($host,$user,$pass,$db);

// check the database connection
if(!$conn){
    die("Cant Connect To the Database");
}

?>