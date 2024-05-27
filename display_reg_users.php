<?php
include('./include/header.php');
include('./include/function.php');
include('./include/db_conn.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 py-5">
            <h1 class="text-center">Registered Users</h1>
        </div>
        <div class="col-md-12 mb-3">
            <a href="register_user.php" class="btn btn-primary">Add User</a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User Picture</th>
                <th scope="col">operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT reg_id, user_name, user_pic FROM reg_users";
            $result = mysqli_query($conn, $sql);
            // var_dump($result);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $row['reg_id']; ?></th>
                        <td><?php echo $row['user_name']; ?></td>
                        <td>
                            <a href="./upload_img.php?user_id=<?php echo $row['reg_id']; ?>">
                                <img src="./images/user_image/<?php echo $row['user_pic']; ?>" alt="User Image" style="width: 50px; height: 50px;">
                            </a>
                        </td>
                        <td>
                            
                            <a class="me-5"  href="./update_user_pass.php?update_pass_id=<?php echo $row['reg_id']; ?>">Set New Password</a>
                            <a href="./delete_user.php?delete_id=<?php echo $row['reg_id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="3">
                        <h3 class="text-danger text-center">No Records Found</h3>
                    </td>
                </tr>
            <?php
            }
            mysqli_free_result($result);
            ?>
        </tbody>
    </table>
</div>
<?php
include('./include/footer.php');
?>