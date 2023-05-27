<?php
$standard = $data["standard"];
$fees = $data["fees"];
?>
<div class="card-header">
    <i class="fas fa-user-plus"></i> Student Admission Fess
</div>
<div class="card-body row">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Fees Title</th>
                <th>Fees Type</th>
                <th>Fees Details</th>
                <th>Fees Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $fees["TITLE"] ?></td>
                <td><?= $fees["TYPE"] ?></td>
                <td>
                    <ul>
                        <?php
                        $details = json_decode($fees["DETAILS"], true);
                        foreach ($details as $detail) {
                            ?>
                            <li><?= $detail["fees_name"] ?> : <?= $detail["fees_value"] ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </td>
                <td><?= $fees["TOTAL"] ?></td>
                <td align="center">
                    <button onclick="saveStudentFees(<?=$standard['ID']?>, <?=$fees['ID']?>)" class="btn btn-sm btn-primary">Save</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>