<?php
include "dbconn.php";

if(isset($_GET['loan_name'])) {
    $loan_name = $_GET['loan_name'];

    // Delete the record from the database
    $sql = "DELETE FROM addloan1 WHERE loan_name = '$loan_name'";
    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">';
        echo 'alert("Deletion Successful!");';
        echo 'window.location.href = "viewloanforadmin.php";'; // Redirect back to the view page
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
