<?php
include "dbconn.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $education=$_POST['education'];
    $skills=$_POST['skills'];
    $bank_account = $_POST['bank_account'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $job=$_POST['job'];

    // Check if the username already exists
    $checkSql = "SELECT * FROM users1 WHERE username = ?";
    $checkStmt = mysqli_prepare($conn, $checkSql);
    mysqli_stmt_bind_param($checkStmt, "s", $username);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username already exists
        $errorMessage = "Username is already taken. Please choose another username.";
        echo '<script type="text/javascript">';
        echo 'alert("' . $errorMessage . '");';
        echo 'window.location.href = "signup.html";';
        echo '</script>';
    } else {
        // Username is available, proceed with insertion
        $insertSql = "INSERT INTO users1 (username, password, first_name, middle_name, last_name, bank_account, phone_number, email, address,education,skills,job) VALUES (?, MD5(?), ?, ?, ?, ?, ?, ?, ?,?,?,?)";
        $insertStmt = mysqli_prepare($conn, $insertSql);
        mysqli_stmt_bind_param($insertStmt, "ssssssssssss", $username, $password, $first_name, $middle_name, $last_name, $bank_account, $phone_number, $email, $address,$education,$skills,$job);
        
        if (mysqli_stmt_execute($insertStmt)) {
            // Insertion was successful
            echo '<script type="text/javascript">';
            echo 'alert("Signup Sucessfull")';
            header("Location: index.html");
            exit();
        } else {
            // An error occurred during insertion
            $errorMessage = "Signup Failed: " . mysqli_error($conn);
            echo '<script type="text/javascript">';
            echo 'alert("' . $errorMessage . '");';
            echo 'window.location.href = "signup.html";';
            echo '</script>';
        }
    }

    mysqli_stmt_close($checkStmt);
    mysqli_stmt_close($insertStmt);
}

mysqli_close($conn);
?>
