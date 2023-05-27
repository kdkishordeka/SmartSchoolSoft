<?php
    $rows = $data["rows"];
?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Fees Title</th>
            <th>Fees Details</th>
            <th>Total Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($rows as $row){ ?>
        <tr>
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
            <td><?=$row["TOTAL"]?></td>
            <td><button class="btn btn-sm btn-success" onclick="selectFees(<?=$row["ID"]?>)">Select</button></td>
        </tr>
       <?php
        }
        ?>
    </tbody>
</table>