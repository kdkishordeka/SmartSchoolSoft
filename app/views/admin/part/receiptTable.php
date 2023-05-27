<?php
$rows = $data["rows"];
$number = 1;
if(count($rows)>0){
foreach ($rows as $row){
?>
<tr>
    <td><?=$number?></td>
    <td><?=  date("d-m-Y", $row["LONGDATE"])?></td>
    <td><?=$row["FROM_NAME"]?> | <?=$row["FROM_ROLL_NO"]?> | <?=$row["FROM_FATHER_NAME"]?></td>
    <td><?=$row["TO_NAME"]?></td>
    <td><?=$row["TYPE"]?></td>
    <td><?=$row["AMOUNT"]?></td>
    <td>
        <a href="#"><i class="fa-solid fa-eye"></i></a> 
        <a href="#" class="text-success ml-3"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="#" class="text-danger" ml-3><i class="fa-solid fa-trash"></i></a>
    </td>
</tr>
<?php
$number ++;
}}
?>

