<?php
$success="";
if(isset($_POST['submit']))
{
    $addDocument=$_POST['addDocument'];
    $addCompany=$_POST['addCompany'];
    $addDepartment=$_POST['addDepartment'];
    $viewAllDocuments=$_POST['viewAllDocuments'];
    $userId=$_POST['userId'];
    $registerUsers=$_POST['registerUsers'];
    $assignRoles=$_POST['assignRoles'];
    $insert="INSERT INTO roles(addDocument,addCompany,addDepartment,viewAllDocuments,userId,registerUsers,assignRoles) VALUES('$addDocument','$addCompany','$addDepartment','$viewAllDocuments','$userId','$registerUsers','$assignRoles')";
    if(mysqli_query($connect,$insert))
    {
        $success="<span class='form-helper btn btn-success'>Role Successfully Added</span>";
    }
}
?>
<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Assign Roles</h3>
<form method="post"action="index.php?assignRoles"class="form-horizontal" style="border: 1px solid lightgrey;padding: 10px;" id="property">
    <div class="form-group">
        <label class="control-label col-sm-3">User</label>
        <div class="col-sm-9">
            <select class="form-control" name="userId">
                <?php
                $getUser="SELECT u.id,u.fname,u.lname,u.email,dp.depart_name,c.name FROM users u,companies c,departments dp where dp.id=u.departId and c.id=u.companyId";
                $result=mysqli_query($connect,$getUser);
                while ($row=mysqli_fetch_array($result)){
                    $id=$row[0];
                    $fname=$row[1];
                    $lname=$row[2];
                    $email=$row[3];
                    $departName=$row[4];
                    $companyName=$row[5];
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo $fname." ".$lname." [Company: $companyName] "." [Department : $departName]"; ?></option>
                <?php } ?>
            </select>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Add Documents</label>
        <div class="col-sm-9">
            <input type="radio" value="YES" name="addDocument"> YES
            <input type="radio" value="NO" name="addDocument"> NO
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Add Company</label>
        <div class="col-sm-9">
            <input type="radio" value="YES" name="addCompany"> YES
            <input type="radio" value="NO" name="addCompany"> NO
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Add Department</label>
        <div class="col-sm-9">
            <input type="radio" value="YES" name="addDepartment"> YES
            <input type="radio" value="NO" name="addDepartment"> NO
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">View All Documents</label>
        <div class="col-sm-9">
            <input type="radio" value="YES" name="viewAllDocuments"> YES
            <input type="radio" value="NO" name="viewAllDocuments"> NO
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Register Users</label>
        <div class="col-sm-9">
            <input type="radio" value="YES" name="registerUsers"> YES
            <input type="radio" value="NO" name="registerUsers"> NO
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Assign Roles</label>
        <div class="col-sm-9">
            <input type="radio" value="YES" name="assignRoles"> YES
            <input type="radio" value="NO" name="assignRoles"> NO
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
            <?php echo $success; ?>
            <input type="submit"name="submit" value="Add" class="btn btn-success"/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
</form>