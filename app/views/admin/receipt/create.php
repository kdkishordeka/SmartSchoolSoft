<?php
    $row = $data["row"];
    $fees_details = json_decode($row["DETAILS"], TRUE);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - Dashboard</title>
        <meta name="description" content="Streamline the management of school operations with Smart School Soft - a comprehensive school management system. Manage student information, grades, classes, payments, and more.">
        <meta name="keywords" content="smart school soft, school management software, student information, attendance, grading, reports, finances, personnel">
        <meta name="author" content="Kishor Deka" />
        <link rel="apple-touch-icon" sizes="180x180" href="web/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="web/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="web/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="web/images/favicon/site.webmanifest">
        <link href="web/assest/css/styles.css" rel="stylesheet" />
        <link href="web/assest/css/bootstrap-select.min.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        <!--Nav Bar Start-->
        <?php include view_path . 'admin/main/navBar.php'; ?>
        <!--Nav Bar End-->
        <div id="layoutSidenav">
            <!--Side Nav Bar Start-->
            <?php include view_path . 'admin/main/sideNavbar.php'; ?>
            <!--Side Nav Bar End-->    
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Receipt Voucher</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Receipt Voucher</a></li>
                            <li class="breadcrumb-item active">Create Voucher</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user-plus"></i> Create Voucher
                            </div>
                            <form id="receipt_form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-8">
                                        <label>Pay From Account :</label>
                                        <input type="hidden" name="student_fees_id" value="<?=$row["STUDENT_FEES_ID"]?>"/>
                                        <input type="hidden" name="from_ac" value="<?=$row["STANDARD_ID"]?>"/>
                                        <input type="text" class="form-control" value="<?=$row["NAME"]?>" readonly/>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label>Receipt Date :</label>
                                        <input type="date" class="form-control" id="longdate" name="longdate" value="<?= date("Y-m-d", time())?>"/>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Type :</label>
                                        <input type="text" class="form-control" id="type" name="type" value="<?=$row["TYPE"]?>"/>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Note :</label>
                                        <input type="text" class="form-control" id="notes" name="notes" value="<?=$row["TITLE"]?>"/>
                                        <input type="hidden" id="particilars" name="particilars" value='<?=$row["DETAILS"]?>'/>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Fees Details</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach ($fees_details as $fees_detail){
                                                ?>
                                            <tbody>
                                                <tr>
                                                    <td><?=$fees_detail["fees_name"]?></td>
                                                    <td><?=$fees_detail["fees_value"]?></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Receipt To Account :</label>
                                        <select class="form-control" id="to_ac" name="to_ac" onchange="loadPayMode()">
                                            <option selected disabled>Select Account</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Total Amount</label>
                                        <input type="number" class="form-control" id="amount" name="amount" value="<?=$row["TOTAL"]?>" readonly/>
                                    </div>
                                </div>
                                <div class="row mb-2" id="payMode">
                                    
                                </div>
                                <div class="alert text-white d-none" id="alert"></div>
                                <div class="mt-3 mb-3" align="center">
                                    <input type="submit" class="btn btn-success btn-sm" id="btnSave" value="save"/>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </main>
                <!--footer start-->
                <?php include view_path . 'admin/main/footer.php'; ?>
                <!--footer end-->
            </div>
        </div>
        <script src="web/js/fontawesome.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="web/js/jquery.js"></script>
        <script src="web/assest/js/bootstrap.bundle.min.js"></script>
        <script src="web/assest/js/scripts.js"></script>          
        <script src="web/assest/js/moment.min.js"></script>
        <script type="text/javascript" src="web/js/myJavaScript.js"></script>
    <script>
        let account = [];
        $(document).ready(()=>{
           loadAccount();
           createReceipt();
        });
        const createReceipt = () =>{
            $(document).on("click", "#btnSave", (e)=>{
                e.preventDefault();
                if(selectCheck('to_ac')){
                    inputFocus('to_ac');
                    alertBox('alert', 'Please select receipt to account !', 'bg-danger');
                    return;}
                classRemove('alert', 'bg-danger');
                btnActionDisable('btnSave');
                $.post("?q=receipt/createData", $("#receipt_form").serialize(), (resp)=>{
                    if(parseJsonData(resp, "SUCCESS") > 0){
                        window.location = "?url=admin/receiptMasterList";
                    }
                })
            })
        }
        const loadPayMode = () =>{
            const selectAc = $("#to_ac").val();
            for(let i=0; i<account.length; i++){
                if(selectAc===account[i]["ID"]){
                   let html = "";
                    if(account[i]["TYPE"] != "CASH"){
                      html +=`
                        <div class="col-sm-12 col-md-6">
                            <label>Payment Mode :</label>
                            <select class="form-control" name="mode">
                                <option>Swipe Machine</option>
                                <option>NEFT</option>
                                <option>UPI</option>
                                <option>Cheque</option>
                                <option>Challan</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label>Bank Name :</label>
                            <input type="text" class="form-control" name="bank_name"/>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label>Transaction No. :</label>
                            <input type="text" class="form-control" name="inst_no"/>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label>Transaction Date :</label>
                            <input type="date" class="form-control" name="inst_date" value="<?= date("Y-m-d", time())?>"/>
                        </div>
                    `;
                   }
                   $("#payMode").html(html);
                }
            }
        }
        
        const loadAccount = () =>{
            $.get("?q=account/fetchAccountDetails/all", (resp)=>{
                let j = JSON.parse(resp);
                let d = j.DATA;
                account = d;
                let html = "<option selected disabled>Select Account</option>";
                if(j.SUCCESS > 0){
                    for(let i = 0; i < d.length; i++){
                        html +=`<option value="${d[i]['ID']}">${d[i]['NAME']}</option>`;
                    }
                }
                $("#to_ac").html(html);
            })
        }
    </script>
    </body>
</html>