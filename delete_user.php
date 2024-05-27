<?php
include('./include/header.php');
include('./include/function.php');
include('./include/db_conn.php');

if (isset($_REQUEST['delete_id'])) {
    $delete_id = $_REQUEST['delete_id'];
    $sql = "DELETE FROM `reg_users` WHERE `reg_id`='$delete_id'";
    $result = mysqli_query($conn, $sql);
}
if ($result) {
    my_alert("success", "user deleted successfully");
    header("Location:./display_reg_users.php");
} else {
    my_alert("danger", "user not deleted");
}



mysqli_close($conn);


?>


<?php
include('./include/footer.php');
?>