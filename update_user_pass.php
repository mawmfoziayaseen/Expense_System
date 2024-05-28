<?php
include('./include/header.php');
include('./include/function.php');
include('./include/db_conn.php');

$_update_pass_id = null;
$db_user_name = null;

// Fetching data from database
if (isset($_REQUEST['update_pass_id'])) {
    $update_pass_id = $_REQUEST['update_pass_id'];
    $sql = "SELECT user_name FROM reg_users WHERE reg_id='$update_pass_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {  // Check if query was successful
        $row = mysqli_fetch_assoc($result);
        if ($row) {  // Check if the user was found
            $db_user_name = $row['user_name'];
        }
    }
}

// Updating user password in database
if (isset($_REQUEST['update_pass'])) {
    // Remove the space before 'update_user_pass'
    $update_user_pass = $_REQUEST['update_user_pass'];
    $enc_password = password_hash($update_user_pass,PASSWORD_BCRYPT);

    // Corrected variable name $_update_pass_id to $update_pass_id
    $update_query = "UPDATE reg_users SET user_pass='$enc_password' WHERE reg_id=$update_pass_id";
    $run_update_query = mysqli_query($conn, $update_query);

    if ($run_update_query) {
        my_alert("success", "Password updated successfully");
    } else {
        my_alert("danger", "Password not updated");
    }
}

mysqli_close($conn);
?>

<div class="container">
    <div class="card my-card">
        <div class="card-header bg-primary text-white">
            Set New Password
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="post">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">User Name</label>
                            <input type="text" class="form-control" value="<?php echo $db_user_name ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="user_pass" class="form-label">Password</label>
                            <!-- Removed the space before 'update_user_pass' in the name attribute -->
                            <input type="password" class="form-control" id="user_pass" name="update_user_pass" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="update_pass">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./include/footer.php');
?>