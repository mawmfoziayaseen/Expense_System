<?php
session_start();
include('./include/header.php');
include('./include/function.php');

if (isset($_POST['login'])) {
    include('./include/db_conn.php');

    // Getting values from HTML
    $user_name = $_POST['user_name'];
    $user_pass = $_POST['user_pass'];

    // SQL query to fetch user details
    $login_query = "SELECT * FROM reg_users WHERE user_name='$user_name'";
    $result_login_query = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($result_login_query) == 1) {
        $row = mysqli_fetch_assoc($result_login_query);
        $db_user_name = $row['user_name'];
        $db_user_pass = $row['user_pass'];
        $db_user_pic = $row['user_pic'];

        if ($user_pass === $db_user_pass) { // Use plain password comparison as per your requirement
            $_SESSION['name'] = $db_user_name;
            $_SESSION['picture'] = $db_user_pic;
            $_SESSION['is_login'] = true;



            my_alert("success", "Login successfully");
            header("Location: ./index.php");
            exit(); // Ensure to exit after redirection
        } else {
            my_alert("danger", "Incorrect password");
        }
    } else {
        my_alert("danger", "User not found");
    }

    mysqli_close($conn);
}
?>

<div class="container">
    <!-- <h1 class="text-center">Expense Management System</h1> -->
    <div class="card my-card">
        <div class="card-header bg-primary text-white">
            Login Form
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
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
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
