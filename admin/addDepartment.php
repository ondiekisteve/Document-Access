<?php
$success="";
$url=$_SERVER['PHP_SELF'];
$word = explode('/',$url);
$search = array_flip($word);
if (isset($search['admin']))
{
    include '../includes/db-connection.php';

}else{
    include 'includes/db-connection.php';

}
if(isset($_POST['addDepart']))
{
    $depart_name=$_POST['depart_name'];
    $compayId=$_POST['companyId'];
    $insert="INSERT INTO departments(companyId,depart_name) VALUES('$compayId','$depart_name')";
    if(mysqli_query($connect,$insert))
    {
        $success="<span class='form-helper btn btn-success'>Department Successfully Added</span>";
        echo $success;
        exit();
    }
}
if(isset($_POST['departmentName'])){
    $departName=$_POST['departmentName'];
    $getDepartName="SELECT * FROM departments where depart_name='$departName'";
    $result=mysqli_query($connect,$getDepartName);
    if(mysqli_num_rows($result)>0){
        $success="<span class='form-helper btn btn-danger'>Department Name Already Exist</span>";
        echo $success;
        exit();
    }else{
        exit();
    }
}
?>
<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Add Department</h3>
<form method="post"action="index.php?addDepartment"class="form-horizontal" style="border: 1px solid lightgrey;padding: 10px;" id="departmentForm">
    <div class="form-group">
        <label class="control-label col-sm-3">Department</label>
        <div class="col-sm-9">
            <input type="text"name="depart_name" class="form-control"placeholder="Enter Department Name" id="depart_name"/>
            <span id="msg"></span>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Company</label>
        <div class="col-sm-9">
            <select class="form-control" name="companyId" id="companyId">
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
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
            <button type="button" name="addDepart" class="btn btn-success" id="addDepart"><span class="glyphicon glyphicon-plus-sign"></span> Add</button>
            <span id="departMessage"></span>
            <a href="index.php?viewDepartments" class="btn btn-success">view Departments</a><br/><br/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
</form>