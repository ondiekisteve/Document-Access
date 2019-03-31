<?php
include '../includes/db-connection.php';
if(isset($_POST['ids'])) {
    $ids = $_POST['ids'];
    $deleteUser = "DELETE FROM users where id IN ($ids)";
    if (mysqli_query($connect, $deleteUser)) {
        echo "<div class='btn btn-success'>User Deleted Successfully</div>";
        exit();
    }
}
if(isset($_POST['id'])) {
    $ids = $_POST['id'];
    $deleteUser = "DELETE FROM users where id='$ids'";
    if (mysqli_query($connect, $deleteUser)) {
        echo "<div class='btn btn-success'>User Deleted Successfully</div>";
        exit();
    }
}
?>