<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">View Departments</h3>

<button type="button" id="delete_allDepart" class="btn btn-primary pull-right">Delete Selected</button>

<table class="table table-bordered table-condensed table-striped" id="viewDeparts" style="font-size: 10px;">
    <thead style="background-color: #87c232;color: white; font-family: 'Lucida Bright';">
    <tr style="text-transform: lowercase;">
        <th><input type="checkbox" id="masterdepart"></th>
        <th>NO</th>
        <th>DEPARTMENT NAME</th>
        <th>COMPANY NAME</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $counter=1;
    $getRecords="SELECT dp.id,dp.depart_name,c.name FROM companies c, departments dp where c.id=dp.companyId";
    $result=mysqli_query($connect,$getRecords);
    while ($row=mysqli_fetch_array($result))
    {
        $id=$row[0];
        $departmentName=$row[1];
        $companyName=$row[2];
        ?>
        <tr data-row-id="<?php echo $id; ?>">
            <td><input type="checkbox" class="sub_chk" data-id="<?php echo $id;  ?>" id="selectedIds2"></td>
            <td><?php echo $counter; ?></td>
            <td><?php echo $departmentName; ?></td>
            <td><?php echo $companyName; ?></td>
            <td><a href="index.php?editdepartId=<?php echo $id; ?>"><img src="../img/edit_16x16.gif"></a></td>
            <td><a type="button" name="delete_btn" data-id3="<?php echo $id; ?>"class="glyphicon glyphicon-trash btn_deletedepart"></a></td>
            <!--            <td><a href="index.php?descriptionId=--><?php //echo $id; ?><!--"><span class="glyphicon glyphicon-trash"></span></a></td>-->
        </tr>
        <?php
        $counter++;
    } ?>
    </tbody>
</table>
<span id="message2"></span>
<a href="index.php?addDepartment" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Department</a><br/><br/>
