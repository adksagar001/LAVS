<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "lavs";

// Create a database connection
$conn = mysql_connect($host, $username, $password);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysql_error());
}

// Select the database
mysql_select_db($database, $conn);

// Handle image upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "uploads/"; // Create an "uploads" directory to store images
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Upload the image
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert the image path into the database
            $sql = "INSERT INTO image (image_path) VALUES ('$targetFile')";
            if (mysql_query($sql)) {
                echo "Image uploaded and inserted into the database successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . mysql_error();
            }
        } else {
            echo "Error uploading the image.";
        }
    } else {
        echo "File is not an image.";
    }
}

// Close the database connection
mysql_close($conn);
?>
