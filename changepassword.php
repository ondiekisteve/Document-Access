<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: Vondieki27gmail.com
 * Date: 4/22/2018
 * Time: 7:56 PM
 */
include 'header.php';
include 'includes/db-connection.php';
$success="";
if(isset($_POST['update'])) {
    $oldpwd = md5($_POST['oldpwd']);
    $newpwd = md5($_POST['newpwd']);
    $rpwd = md5($_POST['rpwd']);
    if($newpwd==$rpwd)
    {
        $getOldPwd = "SELECT * FROM users WHERE pwd='$oldpwd'";
        $result=mysqli_query($connect,$getOldPwd);
        if (mysqli_num_rows($result) > 0) {
            $updatePwd="UPDATE users SET pwd='$newpwd' WHERE pwd='$oldpwd'";
            if(mysqli_query($connect,$updatePwd)){
                echo "<script>alert('Password Updated Successfully proceed to login')</script>";
                echo "<script>window.open('login.php','_self')</script>";
            }
        }
        else{

            $success="<span class='form-helper btn btn-danger'>Password does not Exist</span>";

        }

    }
    else{
        $success="<span class='form-helper btn btn-danger'>Password does not match</span>";
    }

}
?>
    <div class="row">
        <div class="col-sm-3">

        </div><!--End of col-sm-4-->
        <div class="col-sm-6 well">
            <div style="padding: 20px auto;box-shadow: 2px 3px 4px 4px grey;">
                <div class="panel-heading"style="background-color: #87c232;border-radius: 5px;position: relative;top: -30px;">
                    <h4 style="text-align: center;padding: 10px;color: white;font-family: 'Lucida Bright';">Change Your Password</h4>
                </div><!--End of panel heading-->
                <div class="panel-body">
                    <form method="POST"action="changepassword.php"id="changePasswordForm">
                        <div class="form-group">
                            <label for="username"class="control-label">Old Password</label>
                            <input type="text"name="oldpwd"class="form-control"/>
                        </div><!--End of form group-->
                        <div class="form-group">
                            <label for="password"class="control-label">New Password</label>
                            <input type="password"name="newpwd"class="form-control" id="newpwd"/>
                        </div><!--End of form group-->
                        <div class="form-group">
                            <label for="password"class="control-label">Repeat Password</label>
                            <input type="password"name="rpwd"class="form-control" id="rpwd"/>
                        </div><!--End of form group-->
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-9">
                                <?php
                                echo $success;
                                ?>
                            </div><!--End of col-sm-9-->
                        </div><!--End of form-group-->
                        <div class="form-group">
                            <input type="submit"name="update"value="LOGIN"class="btn pull-right"style="background-color: #87c232;padding: 15px 30px;color: white;margin-right: 20px;"/>
                        </div><!--End of form group-->
                    </form>
                </div><!--End of panel body-->
            </div><!--End of div-->
        </div><!--End of col-sm-4-->
    </div><!--End of row-->
<?php include 'footer.php';?>