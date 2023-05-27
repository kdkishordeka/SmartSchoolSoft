<?php
    $types = $data["type"];
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
            <?php include view_path.'admin/main/navBar.php'; ?>
        <!--Nav Bar End-->
        <div id="layoutSidenav">
            <!--Side Nav Bar Start-->
                <?php include view_path.'admin/main/sideNavbar.php'; ?>
            <!--Side Nav Bar End-->    
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Fees Collection</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="?url=admin">Fees Summary</a></li>
                            <li class="breadcrumb-item active">Fees Collection</li>
                        </ol>
                        <div class="card mt-4">
                            <div class="card-header">
                                <i class="fa-solid fa-file-invoice"></i> Fees Collection
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 form-group">
                                        <label>Select Fees Type :</label>
                                        <select class="form-control" id="fees_type" name="fees_type" onchange="loadClass()">
                                            <option selected disabled>Select Fees Type</option>
                                            <?php
                                                if(count($types)>0){
                                                    foreach ($types as $type){ ?>
                                                    <option value="<?=$type["TYPE"]?>"><?=strtoupper($type["TYPE"])?></option>
                                                <?php }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4 form-group">
                                        <label>Select Class :</label>
                                        <select class="form-control" id="fees_class" name="fees_class" onchange="loadStudent()">
                                            <option selected disabled>Select Class</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4 form-group">
                                        <label>Select Student</label>
                                        <select class="form-control" id="fees_student" name="fees_student">
                                            <option selected disabled>Select Student</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 mt-4" align="center">
                                        <button class="btn-sm btn-success" onclick="loadFees()">Load Fees</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <i class="fa-solid fa-file-invoice"></i> Fees Details
                            </div>
                            <div class="card-body" id="fees_details">
                                
                            </div>
                        </div>
                    </div>
                </main>
                <!--footer start-->
                <?php include view_path.'admin/main/footer.php'; ?>
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
            const loadClass =()=>{
                $.post("?q=fees/loadClass", {"type" : $("#fees_type").val()}, (html)=>$("#fees_class").html(html));
            }
            
            const loadStudent = () =>{
                $.post("?q=fees/loadClass", {"class_id" : $("#fees_class").val()}, (html)=>$("#fees_student").html(html));
            }
            
            const loadFees = () =>{
                if($("#fees_type").val()===null){
                    $("#fees_type").focus();
                    return;}
                if($("#fees_class").val()===null){
                    $("#fees_class").focus();
                    return;}
                $.post("?q=fees/loadFees",{"fees_type" : $("#fees_type").val(), "fees_class" : $("#fees_class").val()}, (html)=>$("#fees_details").html(html));
            }
            
            const selectFees = (feesid) =>{
                if($("#fees_student").val()===null){
                    $("#fees_student").focus();
                    return;}
                $.post("?q=fees/createFees",{"fees_student" : $("#fees_student").val(), "fees_id" : feesid}, (resp)=>{
                   if(parseJsonData(resp, "SUCCESS") > 0){
                      window.location = "?url=admin/receiptCreate/"+parseJsonData(resp, "SUCCESS");
                   }
                });
            }
        </script>
    </body>
</html>