<?php
include('./include/header.php');
include('./include/function.php');
include('./include/db_conn.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 py-5">
            <h1 class="text-center">Expense Dashboard</h1>
        </div>
        <div class="col-md-12 mb-3">
            <a href="add_expense.php" class="btn btn-primary">Add Expense</a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col"> Name</th>
                <th scope="col">Price</th>
                <th scope="col">Date Added</th>
                <th scope="col">Expense Details</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php  
            $fetch_expense = "SELECT * FROM expense_info ";
            $result = mysqli_query($conn, $fetch_expense);
            $expense_counter = 1;
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo  $expense_counter;?></td>
                        <td><?php echo $row['item_name'];?></td>
                        <td><?php echo $row['item_price'];?></td> <!-- this should be price -->
                        <td><?php echo $row['item_date'];?></td> <!-- this should be date -->
                        <td><?php echo $row['item_detail'];?></td>
                        <td>
                        <a href="./delete.expense.php?del_expense_id=<?php echo $row['item_id']; ?>">Delete</a>
                    </td>
                    </tr>
                    <?php
                    $expense_counter++;
                }
                } else {
                    echo "<tr><td colspan='6'>No expense added yet</td></tr>";
                }





            
            ?>
        </tbody>
       
    </table>
</div>
<?php
include('./include/footer.php');
?>