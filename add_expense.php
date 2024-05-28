<?php

include('./include/header.php');
include('./include/function.php');
include('./include/db_conn.php');

check_user();
if(isset($_POST['add_item'])){
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_detail = $_POST['item_detail'];
    $item_date = $_POST['item_date'];
    echo $item_date.$item_detail.$item_name.$item_price;

}



?>

<div class="container py-3">
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