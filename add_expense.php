<?php

include('./include/header.php');
include('./include/function.php');
include('./include/db_conn.php');

check_user();
if (isset($_POST['add_item'])) {
    include('./include/db_conn.php');
    // Getting values from HTML
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_detail = $_POST['item_detail'];
    $item_date = $_POST['item_date'];



    // Inserting the data into the database
    $sql = "INSERT INTO expense_info (item_name,item_price ,item_date ,item_detail) VALUES ('$item_name', ' $item_price',' $item_date ',' $item_detail')";

    if (mysqli_query($conn, $sql)) {
        my_alert("success", "New record created successfully");
    } else {
        my_alert("danger", "Error while inserting the record: ");
    }

    mysqli_close($conn);
}



?>

<div class="container py-3">
    <h2 class="text-center display-4 fw-semibold py-3">Add Expense</h2>
    <form method="POST">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="item_name" placeholder="Item Name">

            </div>
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" class="form-control" name="item_price" placeholder="Amount">

            </div>
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Date</label>
                <input type="date" class="form-control" name="item_date">

            </div>
            <div class="col-md-12 mb-3">
                <label for="" class="form-label">Details</label>
                <input type="text" class="form-control" name="item_detail" placeholder="Details">

            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary" name="add_item">Add Expense</button>

            </div>

        </div>
    </form>

</div>















<?php
include('./include/footer.php');
?>