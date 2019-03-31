<?php
include '../includes/db-connection.php';
if(isset($_POST['ids'])) {
    $ids = $_POST['ids'];
    $deleteDocument = "DELETE FROM documents where id IN ($ids)";
    if (mysqli_query($connect, $deleteDocument)) {
        echo "<div class='btn btn-success'>Document Deleted Successfully</div>";
        exit();
    }
}
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $deleteDoc = "DELETE FROM documents where id='$id'";
    if (mysqli_query($connect, $deleteDoc)) {
        echo "<div class='btn btn-success'>Document Deleted Successfully</div>";
        exit();
    }
}

?>