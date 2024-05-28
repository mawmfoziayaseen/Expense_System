<?php
include('./include/header.php');
include('./include/function.php');
include('./include/db_conn.php');

if (isset($_REQUEST['del_expense_id'])) {
    $del_expense_id = $_REQUEST['del_expense_id'];
    $sql = "DELETE FROM `expense_info` WHERE `item_id`='$del_expense_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        my_alert("success", "Expense deleted successfully");
        header("Location: ./all_expense.php");
        exit(); // Ensure no further code is executed after redirection
    } else {
        my_alert("danger", "Expense not deleted");
    }
}

mysqli_close($conn);
?>

<?php
include('./include/footer.php');
?>
