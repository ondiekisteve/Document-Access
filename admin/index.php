<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header("Location:admin_login.php");
}
include "admin-header.php";
include '../includes/db-connection.php';
?>

<div class="row">
    <div class="col-sm-3">
        <h3 class="well well-sm">Admin Operations</h3>
        <div style="background-color: #87c232;color: white;" id="admin-sidebar-links">
            <?php include "admin-sidebar.php" ?>
        </div>
    </div><!--End of col-sm-4-->
    <div class="col-sm-9 content">
        <?php
        if(isset($_GET['addDocument']))
        {
            include 'addDocument.php';
        }
        elseif(isset($_GET['addCompany']))
        {
            include 'addCompany.php';
        }
        elseif(isset($_GET['addDepartment']))
        {
            include 'addDepartment.php';
        }
        elseif(isset($_GET['viewDocuments']))
        {
            include 'viewDocuments.php';
        }
        elseif(isset($_GET['register']))
        {
            include 'register.php';
        }
        elseif(isset($_GET['viewUsers']))
        {
            include 'viewUsers.php';
        }
        elseif(isset($_GET['assignRoles']))
        {
            include 'assignRoles.php';
        }
        elseif(isset($_GET['deleteDocument']))
        {
            include 'deleteDocument.php';
        }
        elseif(isset($_GET['editDocument']))
        {
            include 'editDocument.php';
        }
        elseif(isset($_GET['edituserId']))
        {
            include 'editUser.php';
        }
        elseif(isset($_GET['viewCompanies']))
        {
            include 'viewCompanies.php';
        }
        elseif(isset($_GET['viewDepartments']))
        {
            include 'viewDepartments.php';
        }
        elseif(isset($_GET['editdepartId']))
        {
            include 'editDepartment.php';
        }
        elseif(isset($_GET['editcompanyId']))
        {
            include 'editCompany.php';
        }
        else
        {
            include 'viewDocuments.php';
        }
        



        ?>
    </div><!--End of col-sm-4-->
</div><!--End of row-->

<?php include "admin-footer.php";    ?>
