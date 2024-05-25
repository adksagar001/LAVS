<?php
session_start(); // Start the session

require_once "dbconn.php"; // Include your database connection

if (isset($_POST['login_user'])) {
    // User clicked the "Login as User" button
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Add your sanitization and validation here if needed
        
        // Prepare the SQL statement with a placeholder
        $sql = "SELECT * FROM users1 WHERE username = ?";

        // Prepare a statement
        $stmt = $conn->prepare($sql);

        // Bind the username parameter
        $stmt->bind_param("s", $username);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Compare the MD5 hashed password
            if (md5($password) === $row['password']) {
                // Password is correct
                $_SESSION['username'] = $row['username'];
                // Redirect to the user dashboard after successful login
                $message="Login Success.";
                echo "<script type='text/javascript'> alert ('$message'); </script>";
                header("Refresh: 0; homepageuser.php");
            } else {
                // Password is incorrect
                ?>
                <script>
                alert("Incorrect Password");
                </script>
                <?php
                        include "index.html";
            }
        } else {
            // No user found
            ?>
            <script>
            alert("User not found");
            </script>
            <?php
                    include "index.html";        
                }

        // Close the statement
        $stmt->close();
    } 
}

?>