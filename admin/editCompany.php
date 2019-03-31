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
if(isset($_POST['editId']))
{
    $edid=$_POST['editId'];
    $name=$_POST['name'];
    $insert="UPDATE companies set name='$name' WHERE id='$edid'";
    if(mysqli_query($connect,$insert))
    {
        $success="<span class='form-helper btn btn-success'>Company Updated Successfully</span>";
        echo $success;
        exit();
    }
}
?>
<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Update Company</h3>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
<?php
if(isset($_GET['editcompanyId']))
{
    $editId=$_GET['editcompanyId'];
$counter=1;
$getRecords="SELECT * FROM companies WHERE id='$editId'";
$result=mysqli_query($connect,$getRecords);
while ($row=mysqli_fetch_array($result))
{
    $id=$row['id'];
    $name=$row['name'];
    ?>
        <form method="POST"action="index.php?addCompany"class="form-inline" id="companyForm">
            <div class="form-group">
                <label class="control-label">Company Name</label>
                <div style="text-align: center;">
                    <input type="hidden"name="editId" id="editId" value="<?php echo $id; ?>">
                    <input type="text"name="name"class="form-control"size="50" id="company" value="<?php echo $name; ?>"/>
                    <input type="button"name="updateCompany"class="btn btn-success"value="Update" id="updateCompany"/>
                </div>

            </div><!--End of form group-->
            <div class="form-group">
                <br/><span class="form-helper"id="message"></span>
            </div>
        </form>
        <?php } } ?>
    </div>
</div>