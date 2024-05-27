<?php
include('./include/header.php');
include('./include/function.php');

if (isset($_POST['register'])) {
    include('./include/db_conn.php');

    // Getting values from HTML
    $user_name = $_POST['user_name'];
    $user_pass = $_POST['user_pass'];
    
    // Password hashing
    $hashed_pass = password_hash($user_pass, PASSWORD_DEFAULT);

    // Inserting the data into database using prepared statements
    $sql = "INSERT INTO reg_users (user_name, user_pass) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user_name, $hashed_pass);

    if (mysqli_stmt_execute($stmt)) {
        my_alert("success", "New record created successfully");
    } else {
        my_alert("danger", "Error while inserting the record");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<div class="container">
    <!-- <h1 class="text-center">Expense Management System</h1> -->
    <div class="card my-card">
        <div class="card-header bg-primary text-white">
            Register User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="post">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_pass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="user_pass" name="user_pass" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="register">Register</button>
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
