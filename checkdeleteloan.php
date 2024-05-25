<?php
include "dbconn.php";

if(isset($_GET['loan_name'])) {
    $loan_name = $_GET['loan_name'];

    // JavaScript confirmation dialog
    echo '<script type="text/javascript">';
    echo 'var confirmation = confirm("Are you sure you want to DELETE?");';
    echo 'if(confirmation) {';
    echo '   window.location.href = "delete_loan.php?loan_name=' . $loan_name . '";'; // Redirect to the delete script
    echo '} else {';
    echo '   alert("Deletion Cancelled!");';
    echo '   window.location.href = "viewloanforadmin.php";'; // Redirect back to the view page
    echo '}';
    echo '</script>';
}
?>
