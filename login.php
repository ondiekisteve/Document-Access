<?php
session_start();
if(isset($_SESSION['userId'])){
    header("Location:user.php");
}
/**
 * Created by IntelliJ IDEA.
 * User: Vondieki27gmail.com
 * Date: 4/22/2018
 * Time: 7:56 PM
 */
include 'includes/db-connection.php';
$success="";
$message='';
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $enc_pwd = md5($pwd);
    $enc_username = md5($username);
    $login = "SELECT * FROM users WHERE email='$username' AND pwd='$enc_pwd'";
    $result = mysqli_query($connect, $login);
    if (mysqli_num_rows($result) > 0) {
        if ($enc_username==$enc_pwd) {
          echo "change password";
          exit();
        }else{
            date_default_timezone_set('Africa/Nairobi');

            // Then call the date functions
            $date = date('Y-m-d H:i:s');
            $updateTime = "UPDATE users SET last_login='$date' WHERE email='$username'";
            mysqli_query($connect, $updateTime);
            $getUserid = "SELECT id FROM users WHERE email='$username'";
            $result = mysqli_query($connect, $getUserid);
            while ($row = mysqli_fetch_array($result)) {
                $userId = $row['id'];
                $_SESSION['userId'] = $userId;
                $message= "<span class='btn btn-success'>You have Successfully Logged In</span>";

                echo $message;
                exit();
            }
        }

    } else {
        $success = "<span class='form-helper btn btn-danger'>Incorrect Username and Password</span>";
        echo $success;
        exit();
    }
}
include  'header.php';
    ?>
<div class="row">
        <div class="col-sm-3">

        </div><!--End of col-sm-4-->
        <div class="col-sm-6 well" id="shake">
            <div style="padding: 20px auto;box-shadow: 2px 3px 4px 4px grey;">
                <div class="panel-heading"style="background-color: #87c232;border-radius: 5px;position: relative;top: -30px;">
                    <h4 style="text-align: center;padding: 10px;color: white;font-family: 'Lucida Bright';">Welcome User Please login</h4>
                </div><!--End of panel heading-->
                <div class="panel-body">
                    <form method="POST"action="login.php" id="form">
                        <div class="form-group">
                            <label for="username"class="control-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text"name="username"class="form-control" id="username"/>
                            </div>
                        </div><!--End of form group-->
                        <div class="form-group">
                            <label for="password"class="control-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password"name="pwd"class="form-control" id="password"/>
                            </div>
                        </div><!--End of form group-->
                        <div class="form-group">
                            <input type="checkbox"value="remember"name="remember"/> Remember Me
                            <span class="form-helper"><br /><a href="#"style="color: #87c232;">Forgot your password?</a></span>
                        </div><!--End of form group-->
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-9" id="message">
                            </div><!--End of col-sm-9-->
                        </div><!--End of form-group-->
                        <div class="form-group">
                            <input type="button"name="login"value="LOGIN"class="btn pull-right"style="background-color:#87c232;padding: 15px 30px;color: white;margin-right: 20px;"id="login"/>
                        </div><!--End of form group-->
                    </form>
                </div><!--End of panel body-->
            </div><!--End of div-->
        </div><!--End of col-sm-4-->
    </div><!--End of row-->
<?php include 'footer.php';?>