<?php
session_start();

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $pass = $_POST['pass'];

    // Check if the employee_id already exists
    $check_sql = "SELECT employee_id FROM employees WHERE employee_id = '$employee_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $_SESSION['status'] = 'failed';
        $_SESSION['message'] = 'Employee ID already exists!';
        header('Location: form-create.php');
        exit();
    }

    // Hash the password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Insert new employee record
    $sql = "INSERT INTO employees (employee_id, first_name, last_name, job_title, department_id, date_of_birth, date_hired, email, phone_number, address, pass) 
            VALUES ('$employee_id','$first_name', '$last_name', '$job_title', $department_id, '$date_of_birth', '$date_hired', '$email', '$phone_number', '$address', '$hashed_pass')";

    try {
        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Successfully Inserted!';
            header('Location: index.php');
            exit();
        } else {
            throw new Exception("Failed to insert data");
        }
    } catch (Exception $e) {
        $error_message = urlencode($e->getMessage());
        $_SESSION['status'] = 'failed';
        $_SESSION['message'] = $error_message;
        header("Location: form-create.php");
        exit();
    }
} else {
    // Redirect if accessed directly without POST data
    header('Location: index.php');
    exit();
}
?>
