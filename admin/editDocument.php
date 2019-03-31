<?php
@session_start();
include "../includes/db-connection.php";
$success="";
if(isset($_POST['id']))
{
    $editDocumentId=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $companyId=$_POST['company'];
    $departmentId=$_POST['department'];
    $document=$_FILES['document']['name'];
    if($document==''){
        $getDocument="SELECT document FROM documents where id='$editDocumentId'";
        $result=mysqli_query($connect,$getDocument);
        while ($row=mysqli_fetch_array($result)){
            $document=$row['document'];
        }
    }
    $document_tmp=$_FILES['document']['tmp_name'];
    move_uploaded_file($document_tmp,"../img/$document");
    $userId=$_SESSION['adminuserId'];
    $update_document="UPDATE documents SET title='$title',description='$description',companyId='$companyId',departmentId='$departmentId',document='$document',userId='$userId' WHERE id='$editDocumentId'";
    if(mysqli_query($connect,$update_document))
    {
        $success="<span class='form-helper btn btn-success'>Document Updated Successfully</span>";
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
if(isset($_GET['editDocument']))
{
    $editDocumentId=$_GET['editDocument'];
    $getRecords="SELECT * FROM documents d,companies c,departments dp where dp.id=d.departmentId and c.id=d.companyId  AND d.id='$editDocumentId'";
    $result=mysqli_query($connect,$getRecords);
    while ($row=mysqli_fetch_array($result))
    {
        $id=$row['id'];
        $title=$row['title'];
        $compId=$row['companyId'];
        $description=$row['description'];
        $companyName=$row['name'];
        $description=$row['description'];
        $departName=$row['depart_name'];
        $document=$row['document'];
?>
<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Update Document</h3>
<form method="post"action="index.php?editDocument=<?php echo $editDocumentId; ?>"class="form-horizontal" style="border: 1px solid lightgrey;padding: 10px;" id="editDocumentForm" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label col-sm-3">Title</label>
        <div class="col-sm-9">
            <input type="hidden" name="id" value="<?php echo $editDocumentId; ?>">
            <input type="text"name="title" class="form-control"value="<?php echo $title; ?>"/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="description">
                <?php echo $description; ?>
            </textarea>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Company</label>
        <div class="col-sm-9">
            <select class="form-control company" name="company">
                <?php
                $getCompany="SELECT * FROM companies";
                $result=mysqli_query($connect,$getCompany);
                while ($row=mysqli_fetch_array($result)){
                    $id=$row['id'];
                    $name=$row['name'];
                    ?>
                    <option value="<?php echo $id; ?>" <?php if($name==$companyName){echo 'selected="selected"'; } ?>><?php echo $name; ?></option>
                <?php } ?>
            </select>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Department</label>
        <div class="col-sm-9">
            <select class="form-control department" name="department">
                <?php
                $getdepartments="SELECT * FROM departments WHERE companyId='$compId'";
                $result=mysqli_query($connect,$getdepartments);
                while ($row=mysqli_fetch_array($result)){
                    $id=$row['id'];
                    $companyId=$row['companyId'];
                    $depart_name=$row['depart_name'];
                    ?>
                    <option value="<?php echo $id; ?>" <?php if($depart_name==$departName){echo 'selected="selected"'; } ?>><?php echo $depart_name; ?></option>
                <?php } ?>
            </select>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Upload Document</label>
        <div class="col-sm-9">
            <span class="form-helper"><?php echo $document; ?></span>
            <input type="file"name="document" class="form-control" value="<?php echo $document; ?>"/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
            <?php
            echo $success;
            ?>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
            <input type="button"name="updateDocument" id="updateDocument" value="Update" class="btn btn-success"/>
            <a href="index.php?viewDocuments" class="btn btn-success">view Documents</a><br/><br/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
</form>
        <div id="message"></div>
<?php } } ?>