<h3 class="well" style="text-align: center;font-family: 'Lucida Bright';">View Documents</h3>
<button type="button" id="delete_all" class="btn btn-primary pull-right">Delete Selected</button>
<table class="table table-bordered table-condensed table-striped" id="viewDocuments" style="font-size: 10px;">
    <thead style="background-color: #87c232;color: white; font-family: 'Lucida Bright';">
    <tr style="text-transform: lowercase;">
        <th><input type="checkbox" id="masterdoc"></th>
        <th>NO</th>
        <th>TITLE</th>
<!--        <th>DESCRIPTION</th>-->
        <th>COMPANYS</th>
        <th>DEPARTMENTS</th>
        <th>DOCUMENTS</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
    </thead>
    <?php
    $counter=1;
    $getRecords="SELECT d.id,d.title,d.description,c.name,dp.depart_name,d.document FROM documents d,companies c,departments dp where dp.id=d.departmentId and c.id=d.companyId ";
    $result=mysqli_query($connect,$getRecords);
    while ($row=mysqli_fetch_array($result))
    {
        $id=$row[0];
        $title=$row[1];
        $description=$row[2];
        $companyName=$row[3];
        $departName=$row[4];
        $document=$row[5];
        ?>
        <tr data-row-id="<?php echo $id; ?>">
            <td><input type="checkbox" class="sub_chk" data-id="<?php echo $id;  ?>" id="selectedIds"></td>
            <td><?php echo $counter; ?></td>
            <td><?php echo $title; ?></td>
<!--            <td>--><?php //echo $description; ?><!--</td>-->
            <td><?php echo $companyName; ?></td>
            <td><?php echo $departName; ?></td>
            <td><a href="../img/<?php echo $document; ?>"><?php echo $document;  ?></a> </td>
            <td><a href="index.php?editDocument=<?php echo $id; ?>"><img src="../img/edit_16x16.gif"></a></td>
<!--            <td><a id="deleteDoc" href="index.php?deleteDocument=--><?php //echo $id; ?><!--"><span class="glyphicon glyphicon-trash"></span></a></td>-->
            <td><a type="button" name="delete_btn" data-id3="<?php echo $id; ?>"class="glyphicon glyphicon-trash btn_delete"></a></td>
<!--            <td><a id="deleteDoc" href="index.php?deleteDocument=--><?php //echo $id; ?><!--"></a></td>-->
        </tr>
        <?php
        $counter++;
    } ?>
</table>
<span id="message"></span>
<a href="index.php?addDocument" class="btn btn-success"> <span class="glyphicon glyphicon-plus-sign"></span> Add Document</a><br/><br/>
