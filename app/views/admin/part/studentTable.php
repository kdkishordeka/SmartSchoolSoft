<?php
$rows = $data["rows"];
foreach ($rows as $row){
?>
<tr>
    <td><img src="web/images/studentimages/<?=$row["PHOTO"]?>" width="25px" height="25px"/></td>
    <td><?=$row["NAME"]?></td>
    <td><?=$row["FATHER_NAME"]?></td>
    <td><?=$row["MOTHER_NAME"]?></td>
    <td><?=$row["DATE_OF_BIRTH"]?></td>
    <td align="center">
        <a class="btn btn-sm btn-primary" href="?url=admin/studentAdmission/<?=$row["ID"]?>"><i class="fa-sharp fa-solid fa-plus ml-3" style="color: #8cff00;"></i></a>
    </td>
    <td> 
        <a href="#"><i class="fa-solid fa-eye ml-3"></i></a> 
        <a href="#" class="text-success ml-3"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="#" class="text-danger" ml-3><i class="fa-solid fa-trash"></i></a>
    </td>
</tr>
<?php
}
?>