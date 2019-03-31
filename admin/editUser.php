<?php
$success="";
include '../includes/db-connection.php';
if(isset($_POST['editId']))
{
    $id=$_POST['editId'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $companyId=$_POST['company'];
    $departId=$_POST['department'];
    $superUser=$_POST['superUser'];

    $pwd=md5($email);
    $last_login=0;
    $role=0;
    $update="UPDATE users SET fname='$fname',lname='$lname',email='$email',pwd='$pwd',companyId='$companyId',departId='$departId',superUser='$superUser' WHERE id='$id'";
    if(mysqli_query($connect,$update))
    {
        $success="<span class='form-helper btn btn-success'>User Successfully Updated</span>";
        echo $success;
        exit();
    }
    else{
        $success="<span class='form-helper btn btn-danger'>Error occured</span>";
        echo $success;
        exit();
    }
}
if(isset($_GET['company'])){
    $company=$_GET['company'];
    $result_array=array();
    $company=$_GET['company'];
    $getdepartments="SELECT * FROM departments WHERE companyId='$company'";
    $result=mysqli_query($connect,$getdepartments);
    while ($row=mysqli_fetch_array($result)){
        array_push($result_array,$row);
    }
    echo json_encode($result_array);
    exit();
}
?>
<?php
if(isset($_GET['edituserId'])){
    $id=$_GET['edituserId'];
    $getRecords="SELECT u.id,u.fname,u.lname,u.email,c.id,dp.id,dp.depart_name,u.last_login,c.name,u.superUser FROM users u,companies c,departments dp where dp.id=u.departId and c.id=u.companyId and u.id='$id'";
    $result=mysqli_query($connect,$getRecords);
    while ($row=mysqli_fetch_array($result))
    {
        $id=$row[0];
        $fname=$row[1];
        $lname=$row[2];
        $email=$row[3];
        $compId=$row[4];
        $depId=$row[5];
        $departName=$row[6];
        $last_login=$row[7];
        $companyName=$row[8];
        $superUser=$row[9];


?>
<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Edit User</h3>
<form method="post"action="index.php?register"class="form-horizontal" style="border: 1px solid lightgrey;padding: 10px;" id="editUserForm">
    <div class="form-group">
        <label class="control-label col-sm-3">First Name</label>
        <div class="col-sm-9">
            <input type="hidden"name="editId" value="<?php echo $id;?>" id="editId">
            <input type="text"name="fname" class="form-control"placeholder="Enter First Name" id="fname" value="<?php echo $fname;  ?>"/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Last Name</label>
        <div class="col-sm-9">
            <input type="text"name="lname" class="form-control"placeholder="Enter Last Name" id="lname" value="<?php echo $lname; ?>"/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Email</label>
        <div class="col-sm-9">
            <input type="email"name="email" class="form-control"placeholder="Enter Email"id="email" value="<?php echo $email; ?>"/>
            <span id="validUser"></span>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Company</label>
        <div class="col-sm-9">
            <select class="form-control company" name="company" id="company">
                <?php
                $getCompany="SELECT * FROM companies";
                $result=mysqli_query($connect,$getCompany);
                while ($row=mysqli_fetch_array($result)){
                    $id=$row['id'];
                    $name=$row['name'];
                    ?>
                    <option value="<?php echo $id; ?>"<?php if($id==$compId){?>selected="selected"<?php }?>><?php echo $name; ?></option>
                <?php } ?>
            </select>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Department</label>
        <div class="col-sm-9">
            <select class="form-control department" name="department" id="department">
                <?php
                $getdepartments="SELECT * FROM departments where companyId='$compId'";
                $result=mysqli_query($connect,$getdepartments);
                while ($row=mysqli_fetch_array($result)){
                    $id=$row['id'];
                    $companyId=$row['companyId'];
                    $depart_name=$row['depart_name'];
                    ?>$depId
                    <option value="<?php echo $id; ?>" <?php if($id==$depId){?>selected="selected"<?php } ?>><?php echo $depart_name; ?></option>
                <?php } ?>
            </select>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Super User?</label>
        <div class="col-sm-9">
            <input type="radio" value="YES" name="superUser" class="superUser" <?php if($superUser=='YES'){ ?>checked="checked"<?php } ?>> YES
            <input type="radio" value="NO" name="superUser" class="superUser" <?php if($superUser=='NO'){ ?>checked="checked"<?php } ?>> NO
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9" id="message2">
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
            <input type="button"name="registerUser"value="Update" id="editUser" class="btn btn-success">
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
</form>
<?php }} ?>