<?php
$rows = $data["rows"];
foreach ($rows as $row){
?>
<tr>
    <td><?=$row["START_MONTH"].$row["START_YEAR"].'-'.$row["END_MONTH"].$row["END_YEAR"]?></td>
    <td><?=$row["CLASS_NAME"].'-'.$row["SECTION_NAME"]?></td>
    <td><?=$row["TYPE"]?></td>
    <td><?=$row["TITLE"]?></td>
    <td>
            <ul>
                <?php
                $details = json_decode($row["DETAILS"], true);
                foreach ($details as $detail) {
                    ?>
                    <li><?= $detail["fees_name"] ?> : <?= $detail["fees_value"] ?></li>
                    <?php
                }
                ?>
            </ul>
        </td>
    <td><?=$row["ACTIVE"]==="Y" ? '<div class="badge bg-success">Enable</div>' : '<div class="badge bg-danger">Disable</div>'?></td>
    <td>
        <a href="#"><i class="fa-solid fa-eye"></i></a> 
        <a href="#" class="text-success ml-3"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="#" class="text-danger" ml-3><i class="fa-solid fa-trash"></i></a>
    </td>
</tr>
<?php
}
?>