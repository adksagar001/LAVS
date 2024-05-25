<?php
session_start(); // Start the session

require_once "dbconn.php"; // Include your database connection

 if (isset($_POST['login_admin'])) {
    // Admin clicked the "Login as Admin" button
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Add your sanitization and validation here if needed
        
        // Prepare the SQL statement with a placeholder
        $sql = "SELECT * FROM adminn WHERE username = ?";

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
            if (($password) === $row['password']) {
                // Password is correct
                $_SESSION['admin_username'] = $row['username'];
                $message="Welcome Admin.";
                echo "<script type='text/javascript'> alert ('$message'); </script>";
                header("Refresh: 0; homepageadminn.php");
            } else {
                // Password is incorrect
                ?>
                <script>
                alert("Incorrect Password");
                </script>
                <?php
                        include "adminlogin.php";            }
        } else {
            // No admin found
            ?>
            <script>
            alert("Admin not found");
            </script>
            <?php
                    include "adminlogin.php";        }

        // Close the statement
        $stmt->close();
    } 
}
?>