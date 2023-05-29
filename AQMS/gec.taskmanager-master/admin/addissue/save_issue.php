<?php
include_once('../includes/header.php');

$user_id = $_SESSION['auth_user']['user_id'];

if (isset($_POST['add'])) {
    $issue_type = $_POST['issue_type'];
    $issue_subject = $_POST['subject'];
    $issue_description = $_POST['description'];
    $issue_status = $_POST['status'];
    $issue_assigner = $user_id; // Using the logged-in user's ID as the assigner
    $issue_category = $_POST['category'];
    $issue_due_date = $_POST['due_date'];
    $issue_assignee = $_POST['assignee'];
    $issue_file_input = $_POST['file_input'];
    $date = date;

    // Prepare the SQL statement for inserting into the issues table
    $issues_sql = "INSERT INTO issues (issue_type, `subject`, `description`, `status`, assigner, project, duedate, assignee, dateCreated) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $issues_stmt = mysqli_prepare($con, $issues_sql);

    // Bind the parameters with the values
    mysqli_stmt_bind_param($issues_stmt, "sssssssss", $issue_type, $issue_subject, $issue_description, $issue_status, $issue_assigner, $issue_category, $issue_due_date, $issue_assignee, $date);

    // Execute the statement
    if (mysqli_stmt_execute($issues_stmt)) {
        // Get the ID of the inserted issue
        $issue_id = mysqli_insert_id($con);

        // Prepare the SQL statement for inserting into the issues_attachment table
        $attachment_sql = "INSERT INTO issues_attachment (issues_id, attachment) 
            VALUES (?, ?)";

        // Prepare the statement
        $attachment_stmt = mysqli_prepare($con, $attachment_sql);

        // Bind the parameters with the values
        mysqli_stmt_bind_param($attachment_stmt, "is", $issue_id, $issue_file_input);

        // Execute the statement
        if (mysqli_stmt_execute($attachment_stmt)) {
            $_SESSION['status'] = "Added Successfully.";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "addissue/index.php");
        } else {
            $_SESSION['status'] = "Error adding attachment: " . mysqli_error($con);
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "addissue/index.php");
        }
    } else {
        $_SESSION['status'] = "Error adding issue: " . mysqli_error($con);
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "addissue/index.php");
    }

    // Close the prepared statements
    mysqli_stmt_close($issues_stmt);
    mysqli_stmt_close($attachment_stmt);

    // Close the database connection
    mysqli_close($con);

    // Redirect to the desired page
    header('Location: index.php');
    exit();
}
?>