# Employee Management System

This project is a web-based system for managing employee data using PHP and MySQL. It provides functionalities for creating, viewing, updating, and deleting employee records.

## Features

1. **Create Employee**: Add new employee records to the database.
2. **View Employee Details**: Display detailed information about a specific employee.
3. **Update Employee**: Edit and update existing employee records.
4. **Delete Employee**: Remove employee records from the database.

## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL

## Database Structure

### Tables

1. **departments**
    - `id` (int): Primary key, auto-increment
    - `name` (varchar): Name of the department

2. **employees**
    - `id` (int): Primary key, auto-increment
    - `employee_id` (varchar): Unique employee identifier
    - `first_name` (varchar): Employee's first name
    - `last_name` (varchar): Employee's last name
    - `job_title` (varchar): Employee's job title
    - `department_id` (int): Foreign key referencing `departments.id`
    - `date_of_birth` (date): Employee's date of birth
    - `date_hired` (date): Date when the employee was hired
    - `email` (varchar): Employee's email address
    - `phone_number` (varchar): Employee's phone number
    - `address` (varchar): Employee's address
    - `pass` (varchar): Hashed password

## Database Relations

The database consists of two main tables: `departments` and `employees`.
- Each employee belongs to one department, defined by the `department_id` in the `employees` table referencing the `id` in the `departments` table.
- The `departments` table's primary key (`id`) is linked to the `employees` table's foreign key (`department_id`).

## Usage

1. **Create Employee**:
    - Navigate to the "Add New" button on the homepage.
    - Fill in the required fields in the form.
    - Submit the form to add the new employee to the database.

2. **View Employee Details**:
    - Click on the "View" button next to an employee record on the homepage.
    - View detailed information about the employee.

3. **Update Employee**:
    - Click on the "Edit" button next to an employee record on the homepage.
    - Update the fields in the form.
    - Submit the form to save the changes.

4. **Delete Employee**:
    - Click on the "Delete" button next to an employee record on the homepage.
    - Confirm the deletion to remove the employee from the database.
