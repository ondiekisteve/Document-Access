<?php
include '../includes/db-connection.php';
if(isset($_POST['companyids'])) {
    $ids = $_POST['companyids'];
    $deleteDocument = "DELETE FROM companies where id IN ($ids)";
    if (mysqli_query($connect, $deleteDocument)) {
        echo "<div class='btn btn-success'>Company Deleted Successfully</div>";
        exit();
    }
}
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $deleteDoc = "DELETE FROM companies where id='$id'";
    if (mysqli_query($connect, $deleteDoc)) {
        echo "<div class='btn btn-success'>Company Deleted Successfully</div>";
        exit();
    }
}

?>