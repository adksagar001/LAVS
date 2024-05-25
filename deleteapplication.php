<?php
include "dbconn.php";

if(isset($_GET['application_id'])) {
    $application_id = $_GET['application_id'];

    $res = mysqli_query($conn, "DELETE FROM application1 WHERE application_id = '$application_id'");

    if ($res) {
        echo "Deletion successful";
        header("Location: viewapplicationadmin.php");
        exit;
    } else {
        echo "Error deleting loan data";
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
