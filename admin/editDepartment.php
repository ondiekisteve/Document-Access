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
if(isset($_POST['departId']))
{
    $edId=$_POST['departId'];
    $depart_name=$_POST['depart_name'];
    $compayId=$_POST['companyId'];
    $insert="UPDATE departments SET companyId='$compayId',depart_name='$depart_name' WHERE id='$edId'";
    if(mysqli_query($connect,$insert))
    {
        $success="<span class='form-helper btn btn-success'>Department Successfully Updated</span>";
        echo $success;
        exit();
    }
}
?>
<?php
if(isset($_GET['editdepartId']))
{
    $editId=$_GET['editdepartId'];
    $counter=1;
    $getRecords="SELECT dp.id,dp.depart_name,c.name,c.id FROM companies c, departments dp where c.id=dp.companyId and dp.id='$editId'";
    $result=mysqli_query($connect,$getRecords);
    while ($row=mysqli_fetch_array($result))
    {
        $id=$row[0];
        $departmentName=$row[1];
        $companyName=$row[2];
        $compId=$row[3];
        ?>
<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Update Department</h3>
<form method="post"action="index.php?addDepartment"class="form-horizontal" style="border: 1px solid lightgrey;padding: 10px;" id="departmentForm">
    <div class="form-group">
        <label class="control-label col-sm-3">Department</label>
        <div class="col-sm-9">
            <input type="hidden" name="departId" value="<?php echo $id; ?>" id="departId">
            <input type="text"name="depart_name" class="form-control"placeholder="Enter Department Name" id="depart_name" value="<?php echo $departmentName; ?>"/>
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
                    <option value="<?php echo $id; ?>" <?php if($id==$compId){echo "selected='selected'"; } ?>><?php echo $name; ?></option>
                <?php } ?>
            </select>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
            <input type="button"name="updateDepart" value="Update" class="btn btn-success" id="updateDepart"/><br/><br/>
            <span id="departMessage"></span>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
</form>

<?php } } ?>