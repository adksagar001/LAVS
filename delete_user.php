<?php
include "dbconn.php";

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    // Delete the record from the database
    $sql = "DELETE FROM users1 WHERE username = '$username'";
    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">';
        echo 'alert("Deletion Successful!");';
        echo 'window.location.href = "viewusers.php";'; // Redirect back to the view page
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
