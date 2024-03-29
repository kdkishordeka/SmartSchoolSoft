<?php
$rows = $data["rows"];
$number = 1;
foreach ($rows as $row){ ?>
<tr>
        <td><?= $number ?></td>
        <td><?= $row["START_MONTH"] . $row["START_YEAR"] . "-" . $row["END_MONTH"] . $row["END_YEAR"] ?></td>
        <td><?= $row["CLASS_NAME"] . "-" . $row["SECTION_NAME"] ?></td>
        <td><?= $row["ROLL_NO"] ?></td>
        <td><?= $row["NAME"] ?></td>
        <td><?= $row["FATHER_NAME"] ?></td>
        <td><?= $row["MOTHER_NAME"] ?></td>
        <td><?= $row["ACTIVE"] === "Y" ? '<div class="badge bg-success">Enable</div>' : '<div class="badge bg-danger">Disable</div>' ?></td>
        <td>
            <a href="#"><i class="fa-solid fa-eye"></i></a> 
            <a href="#" class="text-success ml-3"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="#" class="text-danger" ml-3><i class="fa-solid fa-trash"></i></a>
        </td>
</tr>
<?php
$number++;
}
?>                                                                                       