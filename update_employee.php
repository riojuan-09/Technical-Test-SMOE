<?php

session_start();

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $employee_id = $_POST['employee_id'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $job_title = $_POST['job_title'];
    $department_id = $_POST['department_id'];
    $date_of_birth = $_POST['date_of_birth'];
    $date_hired = $_POST['date_hired'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    // Update employee data in the database
    $update_sql = "UPDATE employees SET employee_ID = '$employee_id', first_name = '$first_name', last_name = '$last_name', job_title = '$job_title', department_id ='$department_id', date_of_birth='$date_of_birth', date_hired ='$date_hired' , email = '$email', phone_number='$phone_number', address='$address' WHERE id = $id";

    try {
        if ($conn->query($update_sql) === TRUE) {
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Succesfully Updated!';
            header('Location: index.php');
            exit();
        } else {
            throw new Exception("Failed to update data");
        }
    } catch (Exception $e) {
        $error_message = urlencode($e->getMessage());
        $_SESSION['status'] = 'failed';
        $_SESSION['message'] = $error_message;
        header("Location: form-update.php");
        exit();
    }
} else {
    // Redirect if accessed directly without POST data
    header('Location: index.php');
    exit();
}
