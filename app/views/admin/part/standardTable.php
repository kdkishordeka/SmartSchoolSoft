<?php
$rows = $data["rows"];
$number = 1;
foreach ($rows as $row){
?>
    <tr>
        <td><?= $number ?></td>
        <td><?= $row["CLASS_NAME"] ?></td>
        <td><?= $row["SECTION_NAME"] ?></td>
        <td><?= $row["ACTIVE"] == "Y" ? "Active" : "Deactivate" ?></td>
        <td>
            <a href="#"><i class="fa-solid fa-eye"></i></a> 
            <a href="#" class="text-success ml-3"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="#" class="text-danger" ml-3><i class="fa-solid fa-trash"></i></a>
        </td>
    </tr>
<?php
$number++;
}
?>