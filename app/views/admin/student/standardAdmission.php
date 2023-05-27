<?php
$row = $data["row"];
$years = $data["years"];
$s_class = $data["s_class"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - Admission Register</title>
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
            <div id="layoutSidenav_nav">
                <!--Side Nav Bar Start-->
                <?php include view_path . 'admin/main/sideNavbar.php'; ?>
                <!--Side Nav Bar End-->    
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Student Admission</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Student Standard Management</a></li>
                            <li class="breadcrumb-item active">Student Admission</li>
                        </ol>
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-user-plus"></i> Student Admission
                            </div>
                            <form id="standardForm">
                                <input type="hidden" name="student_id" id="student_id" value="<?= $row["ID"] ?>"/>
                                <div class="card-body row">
                                    <div class="alert text-white d-none" id="alert"></div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label>Select Academic Year</label>
                                        <select class="form-control" id="year_id" name="year_id">
                                            <option value="" selected disabled>Select Academic Year</option>
                                            <?php
                                            if (!empty($years)) {
                                                foreach ($years as $year) {
                                                    ?>
                                                    <option value="<?= $year["ID"] ?>"><?= $year["START_MONTH"] . "-" . $year["START_YEAR"] . " " . $year["END_MONTH"] . "-" . $year["END_YEAR"] ?></option>  
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label>Select Class</label>
                                        <select class="form-control" id="class_id" name="class_id">
                                            <option value="" selected disabled>Select Class</option>
                                            <?php
                                            if (!empty($s_class)) {
                                                foreach ($s_class as $sc) {
                                                    ?>
                                                    <option value="<?=$sc["ID"]?>"><?= $sc["CLASS_NAME"] . "-" . $sc["SECTION_NAME"] ?></option>   
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label>Roll No</label>
                                        <input type="text" class="form-control" id="roll_no" name="roll_no" placeholder="Enter Roll No"/>
                                    </div>
                                    <div class="form-group col-sm-12 mt-3">
                                        <p align="center" style="margin: 0; padding: 0">
                                            <input type="submit" value="save" name="btnSave" id="btnSave" class="btn btn-success btn-sm"/> 
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-user-plus"></i> Student Details
                            </div>
                            <div class="card-body row">
                                <div class="col-sm-12 col-md-4">
                                    <b>Student Name :</b> <?=$row["NAME"]?>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <b>Father Name :</b> <?=$row["FATHER_NAME"]?>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <b>Mother Name :</b> <?=$row["MOTHER_NAME"]?>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <b>Gender :</b> <?=$row["GENDER"]?>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <b>Date of Birth :</b> <?=$row["DATE_OF_BIRTH"]?>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <b>Mobile No :</b> <?=$row["CONTACT_MOBILE"]?>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <b>Vill/Town :</b> <?=$row["C_VILL_TOWN"]?>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <b>Post Office :</b> <?=$row["C_PO"]?>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <b>Police Station :</b> <?=$row["C_PS"]?>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <b>District :</b> <?=$row["C_DIST"]."-".$row["C_ZIP"]?>
                                </div>
                            </div>
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
            $(document).ready(()=>{
                saveData();
            });
            
            const saveData = () =>{
                $(document).on("click", "#btnSave", (e)=>{
                    e.preventDefault();
                    if(inputCheck('student_id')){
                        window.location = "?url=admin/studentMaster";
                        return;
                    }
                    
                    if(selectCheck('year_id')){
                        inputFocus('year_id');
                        alertBox('alert', 'Please select academic year !', 'bg-danger');
                        return;
                    }
                    
                    if(selectCheck('class_id')){
                        inputFocus('class_id');
                        alertBox('alert', 'Please select academic class !', 'bg-danger');
                        return;
                    }
                    
                    if(inputCheck('roll_no')){
                        inputFocus('roll_no');
                        alertBox('alert', 'Please enter roll no !', 'bg-danger');
                        return;
                    }
                    
                    classRemove('alert', 'bg-danger');
                    btnActionDisable('btnSave');
                    
                    $.post("?q=admission/saveData", $('#standardForm').serialize(), (resp)=>{
                        if(parseJsonData(resp, 'SUCCESS')===0){
                            alertBox('alert', 'Something happened wrong ! please try ageen !', 'bg-warning');
                            btnActionEnable('btnSaves');
                            return;
                        }
                        if(parseJsonData(resp, 'SUCCESS') > 0){
                            alertBox('alert', 'Admission successful !', 'bg-success');
                            window.location = "?url=admin/studentStandarMatser";
                            return;
                        }
                        if(parseJsonData(resp, 'SUCCESS') < 0){
                            alertBox('alert', 'This student is already admission done !', 'bg-success');
                            window.location = "?url=admin/studentStandarMatser";
                            return;
                        }
                    })
                });
            }
        </script>
    </body>
</html>