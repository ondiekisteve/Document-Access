<?php
include "../includes/db-connection.php";
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $getUser="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($connect,$getUser);
    if(mysqli_num_rows($result)>0){
        echo "<i class='btn btn-danger'>User with Email $email Already Exist</i>";
    }else{

    }
}
?>