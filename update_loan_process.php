<?php
$con = mysqli_connect('localhost', 'root', '', 'lavs');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'loanname' parameter exists in the POST request
    if (isset($_POST['loanname'])) {
        $loanname = $_POST['loanname'];
        $tenureperiod = $_POST['tenureperiod'];
        $quote = $_POST['quote'];
        $interestrate = $_POST['interestrate'];
        $maxloanamount = $_POST['maxloanamount'];
        $condition1 = $_POST['condition1'];
        $condition2 = $_POST['condition2'];
        $condition3 = $_POST['condition3'];
        $feature1 = $_POST['feature1'];
        $feature2 = $_POST['feature2'];
        $feature3 = $_POST['feature3'];
        $eligibility1 = $_POST['eligibility1'];
        $eligibility2 = $_POST['eligibility2'];
        $eligibility3 = $_POST['eligibility3'];
        $collateral1 = $_POST['collateral1'];
        $collateral2 = $_POST['collateral2'];
        $collateral3 = $_POST['collateral3'];

        // Update the loan details in the database
        $update_query = "UPDATE addloan1 SET 
                         tenure_period = '$tenureperiod',
                         quote = '$quote',
                         interest_rate = '$interestrate',
                         max_loan_amount = '$maxloanamount',
                         condition1 = '$condition1',
                         condition2 = '$condition2',
                         condition3 = '$condition3',
                         feature1 = '$feature1',
                         feature2 = '$feature2',
                         feature3 = '$feature3',
                         eligibility1 = '$eligibility1',
                         eligibility2 = '$eligibility2',
                         eligibility3 = '$eligibility3',
                         collateral1 = '$collateral1',
                         collateral2 = '$collateral2',
                         collateral3 = '$collateral3'
                         WHERE loan_name = '$loanname'";

        if (mysqli_query($con, $update_query)) {

?>
            <script>
            alert("Loan Data Updated Successfully.");
            </script>
            <?php
                    include "viewloanforadmin.php";

        } else {
            echo "Error updating loan details: " . mysqli_error($con);
        }
    } else {
        echo "Loan name not provided.";
    }
} else {
    echo "Invalid request method.";
}

mysqli_close($con);
?>
