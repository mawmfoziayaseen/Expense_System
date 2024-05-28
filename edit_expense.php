<?php
include('./include/header.php');
include('./include/function.php');
include('./include/db_conn.php');

check_user();

$edit_expense_id = null;
$db_item_name = null;
$db_item_price = null;
$db_item_date = null;
$db_item_detail = null;

// Fetching data from database
if (isset($_REQUEST['edit_expense_id'])) {
    $edit_expense_id = $_REQUEST['edit_expense_id'];
    $sql = "SELECT * FROM expense_info WHERE item_id='$edit_expense_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {  // Check if query was successful
        $row = mysqli_fetch_assoc($result);
        if ($row) {  // Check if the user was found
            $db_item_name = $row['item_name'];
            $db_item_price = $row['item_price'];
            $db_item_date = $row['item_date'];
            $db_item_detail = $row['item_detail'];
        }
    }
}

// Updating expense info table in database
if (isset($_POST['update_item'])) {
    $update_item_name = $_POST['update_item_name'];
    $update_item_price = $_POST['update_item_price'];
    $update_item_date = $_POST['update_item_date'];
    $update_item_detail = $_POST['update_item_detail'];

    $update_query = "UPDATE expense_info SET item_name='$update_item_name', item_price='$update_item_price', item_date='$update_item_date', item_detail='$update_item_detail' WHERE item_id=$edit_expense_id";
    $run_update_query = mysqli_query($conn, $update_query);

    if ($run_update_query) {
        my_alert("success", "Expense updated successfully");
    } else {
        my_alert("danger", "Expense not updated");
    }
}

mysqli_close($conn);
?>

<div class="container py-3">
    <h2 class="text-center display-4 fw-semibold py-3">Update Expense</h2>
    <form method="POST">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="update_item_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="update_item_name" name="update_item_name" placeholder="Item Name" value="<?php echo htmlspecialchars($db_item_name); ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="update_item_price" class="form-label">Price</label>
                <input type="number" class="form-control" id="update_item_price" name="update_item_price" placeholder="Amount" value="<?php echo htmlspecialchars($db_item_price); ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="update_item_date" class="form-label">Date</label>
                <input type="date" class="form-control" id="update_item_date" name="update_item_date" value="<?php echo htmlspecialchars($db_item_date); ?>">
            </div>
            <div class="col-md-12 mb-3">
                <label for="update_item_detail" class="form-label">Details</label>
                <input type="text" class="form-control" id="update_item_detail" name="update_item_detail" value="<?php echo htmlspecialchars($db_item_detail); ?>" placeholder="Details">
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary" name="update_item">Update Expense</button>
            </div>
        </div>
    </form>
</div>

<?php
include('./include/footer.php');
?>
