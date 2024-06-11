<?php
session_start();
include 'db_config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM employees WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $employee_data = $result->fetch_assoc();
} else {
    die("Employee Not Found");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Update Employee</title>
</head>

<body>

    <div class="container form-container mt-5">
        <?php
        include 'db_config.php';
        if (isset($_SESSION['status']) && $_SESSION['status'] == 'failed') {
            $error_message = urldecode($_SESSION['message']);
            // Display error alert
            echo '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
                        ' . htmlspecialchars($error_message) . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

            unset($_SESSION['status']);
        }
        ?>
        <h3 class="text-center">Update Employee Data</h3>
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Update Employee
                    </div>
                    <div class="card-body">
                        <form action="update_employee.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $employee_data['id'] ?>" />

                            <div class="form-group mb-3">
                                <label for="employee_id">Employee ID</label>
                                <input type="text" name="employee_id" id="employee_id" placeholder="Employee ID" class="form-control" value="<?php echo $employee_data['employee_id']; ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control" value="<?php echo $employee_data['first_name']; ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control" value="<?php echo $employee_data['last_name']; ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $employee_data['email']; ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" class="form-control" value="<?php echo $employee_data['phone_number']; ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="job_title">Job Title</label>
                                <input type="text" name="job_title" id="job_title" placeholder="Job Title" class="form-control" value="<?php echo $employee_data['job_title']; ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="department_id">Department</label>
                                <select class="form-select" id="department_id" name="department_id" required>
                                    <?php
                                    include 'db_config.php';

                                    // Fetch all departments from the database
                                    $sql = "SELECT * FROM departments";
                                    $result = $conn->query($sql);

                                    // Iterate over each department and create an option element
                                    while ($row = $result->fetch_assoc()) {
                                        $selected = ($row['id'] == $employee_data['department_id']) ? 'selected' : '';
                                        echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="date_of_birth">Date Of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo $employee_data['date_of_birth']; ?>" required></input>
                            </div>

                            <div class="form-group mb-3">
                                <label for="date_hired">Date Hired</label>
                                <input type="date" class="form-control" name="date_hired" id="date_hired" value="<?php echo $employee_data['date_hired']; ?>" required></input>
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">Alamat</label>
                                <textarea class="form-control" name="address" id="address" placeholder="Address" rows="4" required><?php echo $employee_data['address']; ?></textarea>
                            </div>

                            <div class="form-group text-center mb-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>