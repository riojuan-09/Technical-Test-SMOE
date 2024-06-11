<?php
session_start();
include("db_config.php");

if (isset($_GET['id'])) {


    $id = $_GET['id'];


    $sql = "DELETE FROM employees WHERE id=$id";


    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = 'Succesfully Deleted!';
        header('Location: index.php');
        exit();
    } else {
        die("Delete Data Failed");
    }
} else {
    die();
}
