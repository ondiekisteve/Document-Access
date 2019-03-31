<?php
include '../includes/db-connection.php';
if(isset($_POST['ids'])) {
    $ids = $_POST['ids'];
    $deleteDocument = "DELETE FROM departments where id IN ($ids)";
    if (mysqli_query($connect, $deleteDocument)) {
        echo "<div class='btn btn-success'>Department Deleted Successfully</div>";
        exit();
    }
}
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $deleteDoc = "DELETE FROM departments where id='$id'";
    if (mysqli_query($connect, $deleteDoc)) {
        echo "<div class='btn btn-success'>Department Deleted Successfully</div>";
        exit();
    }
}

?>