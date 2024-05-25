<?php
include "dbconn.php";

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    // JavaScript confirmation dialog
    echo '<script type="text/javascript">';
    echo 'var confirmation = confirm("Are you sure you want to DELETE?");';
    echo 'if(confirmation) {';
    echo '   window.location.href = "delete_user.php?username=' . $username . '";'; // Redirect to the delete script
    echo '} else {';
    echo '   alert("Deletion Cancelled!");';
    echo '   window.location.href = "viewusers.php";'; // Redirect back to the view page
    echo '}';
    echo '</script>';
}
?>
