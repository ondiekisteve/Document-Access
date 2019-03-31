<?php
$success="";
include '../includes/db-connection.php';
if(isset($_POST['registerUser']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $companyId=$_POST['company'];
    $departId=$_POST['department'];
    $superUser=$_POST['superUser'];

    $pwd=md5($email);
    $last_login=0;
    $role=0;
    $register="INSERT INTO users(fname,lname,email,pwd,companyId,departId,last_login,role,superUser)VALUES('$fname','$lname','$email','$pwd','$companyId','$departId','$last_login','$role','$superUser')";
    if(mysqli_query($connect,$register))
    {
        $success="<span class='form-helper btn btn-success'>User Successfully Registered</span>";
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
<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Register User</h3>
<form method="post"action="index.php?register"class="form-horizontal" style="border: 1px solid lightgrey;padding: 10px;" id="registerForm">
    <div class="form-group">
        <label class="control-label col-sm-3">First Name</label>
        <div class="col-sm-9">
            <input type="text"name="fname" class="form-control"placeholder="Enter First Name" id="fname"/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Last Name</label>
        <div class="col-sm-9">
            <input type="text"name="lname" class="form-control"placeholder="Enter Last Name" id="lname"/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Email</label>
        <div class="col-sm-9">
            <input type="email"name="email" class="form-control"placeholder="Enter Email"id="email"/>
            <span id="validUser"></span>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Company</label>
        <div class="col-sm-9">
            <select class="form-control company" name="company" id="company">
                <option>Select Company</option>
                <?php
                $getCompany="SELECT * FROM companies";
                $result=mysqli_query($connect,$getCompany);
                while ($row=mysqli_fetch_array($result)){
                    $id=$row['id'];
                    $name=$row['name'];
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                <?php } ?>
            </select>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Department</label>
        <div class="col-sm-9">
            <select class="form-control department" name="department" id="department">
<!--                --><?php
//                $getdepartments="SELECT * FROM departments";
//                $result=mysqli_query($connect,$getdepartments);
//                while ($row=mysqli_fetch_array($result)){
//                    $id=$row['id'];
//                    $companyId=$row['companyId'];
//                    $depart_name=$row['depart_name'];
//                    ?>
<!--                    <option value="--><?php //echo $id; ?><!--">--><?php //echo $depart_name; ?><!--</option>-->
<!--                --><?php //} ?>
            </select>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Super User?</label>
        <div class="col-sm-9">
            <input type="radio" value="YES" name="superUser" class="superUser"> YES
            <input type="radio" value="NO" name="superUser" class="superUser" checked="checked"> NO
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
            <button type="button" name="registerUser" class="btn btn-success" id="registerUser"><span class="glyphicon glyphicon-plus-sign"></span> Register</button>
            <a href="index.php?viewUsers" class="btn btn-success">View Users</a><br/><br/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
</form>