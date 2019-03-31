<?php
session_start();
include 'header.php';
?>
    <div class="row" style="margin-top: 50px;">
        <div class="col-sm-2">

        </div><!--End of row-->
        <div class="col-sm-8">
            <form method="POST"action="signup.php"class="well"style="box-shadow: 4px 4px 6px 6px grey;">
                <div class="row">
                    <div style="text-align: center;position: relative;top: -70px;">
                        <div class="panel-heading">
                            <div class="well"style="background-color:#87c232;color: white;font-family: 'Lucida Bright';">
                                <h4>Our Contact Information</h4>
                            </div><!--End of well-->
                        </div><!--End of panel heading-->
                        <div class="panel-body"style="box-shadow: 2px 6px 6px 3px grey;margin: 10px;">
                            <table class="table table-striped">
                                <tr>
                                    <td>Telephone</td>
                                    <td>0774477447</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>infor@smartdocumentaccess.com</td>
                                </tr>
                                <tr>
                                    <td>Website</td>
                                    <td>www.smartdocumentaccess.com</td>
                                </tr>
                                <tr>
                                    <td>Postal Address</td>
                                    <td>34 Nairobi</td>
                                </tr>
                            </table>
                        </div><!--End of panel body-->
                    </div><!--End of div-->
                </div><!--End of row-->
            </form>
        </div><!--End of col-->
    </div><!--End of row-->
<?php include 'footer.php'; ?>