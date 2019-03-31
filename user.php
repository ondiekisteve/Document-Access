<?php
session_start();
//if(!isset($_SESSION['userId'])){
//    header("Location:login.php");
//}
include "includes/db-connection.php";
?>
<?php include "header.php";  ?>
<div class="row">
    <div class="col-sm-4">
        <?php
        include 'userSidebar.php';
        ?>
    </div><!--End of col-sm-4-->
    <div class="col-sm-8">
<!--        --><?php
//        include 'viewDocuments.php';
//        ?>
        <?php
        if(isset($_GET['addCompany'])){
            include 'admin/addCompany.php';
        }else if(isset($_GET['viewDocuments'])){
            include 'admin/viewDocuments.php';
        }
        else if(isset($_GET['addDocument'])){
            include 'admin/addDocument.php';
        }
        else if(isset($_GET['register'])){
            include 'admin/register.php';
        }
        else if(isset($_GET['assignRoles'])){
            include 'admin/assignRoles.php';
        }
        else if(isset($_GET['addCompany'])){
            include 'admin/addCompany.php';
        }
        else if(isset($_GET['addDepartment'])){
            include 'admin/addDepartment.php';
        }
        else if(isset($_GET['viewcustomDocuments'])){
            include 'viewDocuments.php';
        }
        else{
            include 'viewDocuments.php';
        }
        ?>
    </div><!--End of col-sm-8-->
</div><!--End of row-->
<?php include "footer.php";  ?>