<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">Availlable Documents</h3>

<table class="table table-bordered table-condensed table-striped">
    <thead style="background-color: #87c232;color: white; font-family: 'Lucida Bright';">
    <tr style="text-transform: lowercase;">
        <th>NO</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
        <th>DOCUMENTS</th>
        <th>download</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $getRecords="";
    $counter=1;
    $userId=$_SESSION['userId'];
    $getRole="SELECT superUser from users WHERE id='$userId'";
    $result2=mysqli_query($connect,$getRole);
    $role=mysqli_fetch_array($result2);
    if($role[0]=='YES'){
        $getRecords="SELECT * FROM documents d,companies c,departments dp where dp.id=d.departmentId and c.id=d.companyId";
    }
    else{
        $getRecords="SELECT * FROM documents d,companies c,departments dp where dp.id=d.departmentId and c.id=d.companyId and dp.id=(SELECT departId from users where id='$userId')";
    }
    $result=mysqli_query($connect,$getRecords);
    while ($row=mysqli_fetch_array($result))
    {
        $id=$row['id'];
        $title=$row['title'];
        $description=$row['description'];
        $companyName=$row['name'];
        $description=$row['description'];
        $departName=$row['depart_name'];
        $document=$row['document'];
        ?>
        <tr>
            <td><?php echo $counter; ?></td>
            <td><?php echo $title; ?></td>
            <td><?php echo $description; ?></td>
            <td><?php echo $document;  ?> </td>
            <td><a href="img/<?php echo $document; ?>"class="btn btn-primary btn-block"><span class="glyphicon glyphicon-download"></span></a></td>
        </tr>
        <?php
        $counter++;
    } ?>
    </tbody>
</table>