<?php
$rows = $data["rows"];
foreach ($rows as $row){ ?>
<tr>
    <td><?= $row["START_YEAR"]?></td>
    <td><?= $row["START_MONTH"]?></td>
    <td><?= $row["END_YEAR"]?></td>
    <td><?= $row["END_MONTH"]?></td>
    <td><?= $row["IS_ACTIVE"]=="Y" ? "Active" : "Deactivate"?></td>
    <td>
        <a href="#"><i class="fa-solid fa-eye"></i></a> 
        <a href="#" class="text-success ml-3"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="#" class="text-danger" ml-3><i class="fa-solid fa-trash"></i></a>
    </td>
</tr>
<?php
}
?>