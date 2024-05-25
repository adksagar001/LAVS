<?php 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $applicationId = $_POST['application_id'];
    
    if (isset($_POST['verify'])) {
        $status = 'Verified';
    } elseif (isset($_POST['reject'])) {
        $status = 'Rejected';
    } else {
        $status = 'Pending';
    }

    // Update the status in the database using prepared statement
    $sql = "UPDATE application1 SET status = ? WHERE application_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $status, $applicationId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Status updated successfully
        } else {
            // Handle the error if the update fails
            echo "Error updating status: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle the error if the prepared statement fails
        echo "Error preparing statement: " . mysqli_error($con);
    }
}


 <?php
                                            if ($row['status'] == 'Pending') {
                                                ?>
                                                <button type="submit" name="verify" class="btn btn-success">Verify</button>
                                                <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                                <?php
                                            } elseif ($row['status'] == 'Verified') {
                                                ?>
                                                <button type="button" class="btn btn-success" disabled>Verified</button>
                                                <?php
                                            } elseif ($row['status'] == 'Rejected') {
                                                ?>
                                                <button type="button" class="btn btn-danger" disabled>Rejected</button>
                                                <?php
                                            }
                                            ?>
