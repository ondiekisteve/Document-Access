<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">View Users</h3>

<button type="button" id="delete_all2" class="btn btn-primary pull-right">Delete Selected</button>

<table class="table table-bordered table-condensed table-striped" id="viewUsers" style="font-size: 10px;">
    <thead style="background-color: #87c232;color: white; font-family: 'Lucida Bright';">
    <tr style="text-transform: lowercase;">
        <th><input type="checkbox" id="masteruser"></th>
        <th>NO</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>EMAIL</th>
        <th>COMPANY</th>
        <th>DEPARTMENT</th>
        <th>LAST LOGIN</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $counter=1;
    $getRecords="SELECT u.id,u.fname,u.lname,u.email,dp.depart_name,u.last_login,c.name FROM users u,companies c,departments dp where dp.id=u.departId and c.id=u.companyId ";
    $result=mysqli_query($connect,$getRecords);
    while ($row=mysqli_fetch_array($result))
    {
        $id=$row[0];
        $fname=$row[1];
        $lname=$row[2];
        $email=$row[3];
        $departName=$row[4];
        $last_login=$row[5];
        $companyName=$row[6];
        date_default_timezone_set('Africa/Nairobi');

        $newDate = date("d-m-Y  (H:i:s a)", strtotime($last_login));
        // Then call the date function
//         $timenow=date('Y-m-d H:i:s');
//        $diff=dateDiff($last_login,$timenow);

        // Time format is UNIX timestamp or
        // PHP strtotime compatible strings

        ?>
        <tr data-row-id="<?php echo $id; ?>">
            <td><input type="checkbox" class="sub_chk" data-id="<?php echo $id;  ?>" id="selectedIds2"></td>
            <td><?php echo $counter; ?></td>
            <td><?php echo $fname; ?></td>
            <td><?php echo $lname; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $companyName; ?></td>
            <td><?php echo $departName; ?></td>
            <td><?php echo $newDate; ?></td>
            <td><a href="index.php?edituserId=<?php echo $id; ?>"><img src="../img/edit_16x16.gif"></a></td>
            <td><a type="button" name="delete_btn" data-id3="<?php echo $id; ?>"class="glyphicon glyphicon-trash btn_deleteuser"></a></td>
<!--            <td><a href="index.php?descriptionId=--><?php //echo $id; ?><!--"><span class="glyphicon glyphicon-trash"></span></a></td>-->
        </tr>
        <?php
        $counter++;
    } ?>
    </tbody>
</table>
<span id="message2"></span>
<?php

function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
        $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
        $time2 = strtotime($time2);
    }

    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
        $ttime = $time1;
        $time1 = $time2;
        $time2 = $ttime;
    }

    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();

    // Loop thru all intervals
    foreach ($intervals as $interval) {
        // Create temp time from time1 and interval
        $ttime = strtotime('+1 ' . $interval, $time1);
        // Set initial values
        $add = 1;
        $looped = 0;
        // Loop until temp time is smaller than time2
        while ($time2 >= $ttime) {
            // Create new temp time from time1 and interval
            $add++;
            $ttime = strtotime("+" . $add . " " . $interval, $time1);
            $looped++;
        }

        $time1 = strtotime("+" . $looped . " " . $interval, $time1);
        $diffs[$interval] = $looped;
    }

    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
        // Break if we have needed precission
        if ($count >= $precision) {
            break;
        }
        // Add value and interval
        // if value is bigger than 0
        if ($value > 0) {
            // Add s if value is not 1
            if ($value != 1) {
                $interval .= "s";
            }
            // Add value and interval to times array
            $times[] = $value . " " . $interval;
            $count++;
        }
    }

    // Return string with times
    return implode(", ", $times);
}
?>

<a href="index.php?register" class="btn btn-success"> <span class="glyphicon glyphicon-plus-sign"></span> Register</a><br/><br/>

