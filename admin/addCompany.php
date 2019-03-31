<?php
$url=$_SERVER['PHP_SELF'];
$word = explode('/',$url);
$search = array_flip($word);
if (isset($search['admin']))
{
    include '../includes/db-connection.php';

}else{
    include 'includes/db-connection.php';

}
$success="";
if(isset($_POST['add']))
{
    $name=$_POST['name'];
    $insert="INSERT INTO companies(name) VALUES('$name')";
    if(mysqli_query($connect,$insert))
    {
        $success="<span class='form-helper btn btn-success'>Company Added Successfully</span>";
        echo $success;
        exit();
    }
}
if(isset($_POST['company'])){
    $name=$_POST['company'];
    $checkNameExisits="SELECT * FROM companies WHERE name='$name'";
    $result=mysqli_query($connect,$checkNameExisits);
    if(mysqli_num_rows($result)>0){
        $success="<span class='form-helper btn btn-danger'>Company Name Already Exist</span>";
        echo $success;
        exit();
    }else{
        exit();
    }
}
?>
<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Add Company</h3>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
        <form method="POST"action="index.php?addCompany"class="form-inline" id="companyForm">
            <div class="form-group">
                <label class="control-label">Company Name</label>
                <div style="text-align: center;">
                    <input type="text"name="name"class="form-control"size="50" id="company"/>
                    <button type="button" name="add" class="btn btn-success" id="add"><span class="glyphicon glyphicon-plus-sign"></span> Add</button>
                    <a href="index.php?viewCompanies" class="btn btn-success">View Companies</a><br/><br/>
                    <span id="msg"></span>
                </div>

            </div><!--End of form group-->
            <div class="form-group">
                <br/><span class="form-helper"id="message"></span><br>
            </div>
        </form>
    </div>
</div>