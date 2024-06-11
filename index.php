<?php
session_start(); // Start the session

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>Employees Data</title>
</head>

<body>

    <div class="container mt-5">
        <?php

        if (isset($_SESSION['status']) && $_SESSION['status'] == 'success') {
            // Display success alert
            echo '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
            '.$_SESSION['message'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

            unset($_SESSION['status']);
        }
        ?>
        <h3 class="text-center">Employee Data</h3>
        <a href="form-create.php" class="btn btn-outline-warning">Add New</a>
        <div class="row">

            <div class="col">
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Employee ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include 'db_config.php';

                        $i = 0;

                        $sql = "SELECT * FROM employees ORDER BY id DESC";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . ++$i . "</td>
                                    <td>" . $row["employee_id"] . "</td>
                                    <td>" . $row["first_name"] . "</td>
                                    <td>" . $row["last_name"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                    <td>" . $row["job_title"] . "</td>
                                    <td>
                                        <a class='btn btn-primary' href='detail_employee.php?id=" . $row["id"] . "'><i class=\"bi bi-eye-fill\"></i></a>
                                        <a class='btn btn-success' href='form-update.php?id=" . $row["id"] . "'><i class=\"bi bi-pencil-fill\"></i></a>
                                        <a class='btn btn-danger' href='delete_employee.php?id=" . $row["id"] . "' onClick=\"return confirm ('Are you sure to delete this data');\"><i class=\"bi bi-trash-fill\"></i></a>
                                    </td>
                                  </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>