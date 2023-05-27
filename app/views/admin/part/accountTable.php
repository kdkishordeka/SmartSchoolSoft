<?php
$rows = $data["rows"];
$number = 1;
foreach ($rows as $row){
?>
<tr>
    <td><?=$number?></td>
    <td><?=$row["NAME"]?></td>
    <td><?=$row["TYPE"]?></td>
    <td><?=$row["AC_GROUP"]?></td>
    <td><?=$row["NUMBER"]?></td>
    <td><?=$row["IFSC"]?></td>
    <td><?=$row["BANK_NAME"]?></td>
    <td><?= $row["ACTIVE"] === "Y" ? '<div class="badge bg-success">Enable</div>' : '<div class="badge bg-danger">Disable</div>' ?></td>
    <td>
        <a href="#"><i class="fa-solid fa-eye"></i></a> 
        <a href="#" class="text-success ml-3"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="#" class="text-danger" ml-3><i class="fa-solid fa-trash"></i></a>
    </td>
</tr>
<?php
$number ++;
}
?>

