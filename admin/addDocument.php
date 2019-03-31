<?php
@session_start();
$success="";
$userId="";
include '../includes/db-connection.php';
if(isset($_POST['title']))
{
    $title=mysqli_real_escape_string($connect,$_POST['title']);
    $description=mysqli_real_escape_string($connect,$_POST['description']);
    $companyId=mysqli_real_escape_string($connect,$_POST['company']);
    $departmentId=mysqli_real_escape_string($connect,$_POST['department']);
    $document=$_FILES['document']['name'];
    $document=preg_replace('/\s+/', '_', $document);
    $document_tmp=$_FILES['document']['tmp_name'];
    move_uploaded_file($document_tmp,"../img/$document");
    if(isset($_SESSION['adminuserId'])) {
        $userId = $_SESSION['adminuserId'];
    }
    $insert_document="INSERT INTO documents(title,description,companyId,departmentId,document,userId)VALUES('$title','$description','$companyId','$departmentId','$document','$userId')";
    if(mysqli_query($connect,$insert_document))
    {
        $success="<span class='form-helper btn btn-success'>Document Successfully Added</span>";
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
<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Add Document</h3>
<form method="post"action="index.php?addDocument"class="form-horizontal" style="border: 1px solid lightgrey;padding: 10px;" id="documentForm" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label col-sm-3">Title</label>
        <div class="col-sm-9">
            <input type="text"name="title" class="form-control"placeholder="Title of document" id="title"/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3">Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="description" id="description"></textarea>
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
        <label class="control-label col-sm-3">Upload Document</label>
        <div class="col-sm-9">
            <input type="file"name="document" class="form-control" id="document"/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9" id="message">

        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
            <button type="button" name="submit" class="btn btn-success" id="addDocument"><span class="glyphicon glyphicon-plus-sign"></span> Add</button>
            <a href="index.php?viewDocuments" class="btn btn-success">view Documents</a><br/><br/>
        </div><!--End of col-sm-9-->
    </div><!--End of form-group-->
</form>