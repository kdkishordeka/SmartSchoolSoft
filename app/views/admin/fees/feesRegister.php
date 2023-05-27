<?php 
    $years = $data["years"];
    $s_class = $data["s_class"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - Fees Register</title>
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
                        <h1 class="mt-4">Fees Master</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="?url=admin/academicFeesMatser">Fees Master</a></li>
                            <li class="breadcrumb-item active">Add New Fees Data</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert text-white d-none" id="alert"></div>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-user-plus"></i> Add New Fees Data
                                    </div>
                                    <form id="feesMasterForm">
                                    <div class="card-body row">
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Fees Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" id="title" class="form-control" />
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Fees Description</label>
                                                <input type="text" name="description" id="description" class="form-control" />
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Select Academic Year <span class="text-danger">*</span></label>
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option selected disabled>Select Academic Year</option>
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
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Select Class <span class="text-danger">*</span></label>
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option selected disabled>Select Class</option>
                                                    <?php
                                                    if (!empty($s_class)) {
                                                        foreach ($s_class as $sc) {
                                                            ?>
                                                            <option value="<?= $sc["ID"] ?>"><?= $sc["CLASS_NAME"] . "-" . $sc["SECTION_NAME"] ?></option>   
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Select Fees Type <span class="text-danger">*</span></label>
                                                <select name="type" id="type" class="form-control">
                                                    <option selected disabled>Select Fees Type</option>
                                                    <option value="admission">Admission</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="exam">Exam</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Fees Note</label>
                                                <input type="text" name="fees_note" id="fees_note" class="form-control"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6 m-auto">
                                                <label>Enter Fees Details <span class="text-danger">*</span></label>
                                                <div id="dynamic_fees_area"></div>
                                            </div>
                                            <div align="center">
                                                <input type="submit" name="btnSave" id="btnSave" class="btn btn-success" value="Save" />
                                            </div>
                                    </div>
                                    </form>
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
            $(document).ready(function () {
                saveData();
                var index = 0;
                Make_fees_field(0);
                function Make_fees_field(index)
                {
                    var output = '';
                    var dynamic_button = '';
                    if (index == 0)
                    {
                        dynamic_button = '<button type="button" class="btn btn-success" id="add_fees_data"><b>+</b></button>';
                    } else
                    {
                        dynamic_button = '<button type="button" class="btn btn-danger remove_fees_data" data-id="' + index + '"><b>-</b></button>';
                    }

                    output = '<div class = "mb-3 row" id = "row_' + index + '">';
                    output += '<div class = "col-md-6">';

                    output += '<input type = "text" name = "fees_name[]" class = "form-control" placeholder = "Fees Name"/>';
                    output += '</div>';
                    output += '<div class = "col-md-4">';
                    output += '<input type = "number" name = "fees_value[]" class = "form-control" placeholder = "Fees Amount"/>';
                    output += '</div>';
                    output += '<div class = "col-md-2">';
                    output += dynamic_button;
                    output += '</div>';
                    output += '</div>';
                    $('#dynamic_fees_area').append(output);
                }
                $(document).on('click', '#add_fees_data', function () {
                    index++;
                    Make_fees_field(index);
                });
                $(document).on('click', '.remove_fees_data', function () {
                    $('#row_' + $(this).data("id") + '').remove();
                });
            });
            
        const saveData = () =>{
            $('#feesMasterForm').submit(function(e){
                e.preventDefault();
                if(inputCheck('title')){
                    inputFocus('title');
                    alertBox('alert', 'Please enter fees title !', 'bg-danger');
                    return;
                }    
                if(selectCheck('year_id')){
                    inputFocus('year_id');
                    alertBox('alert', 'Please select academic year !', 'bg-danger');
                    return;
                }
                if(selectCheck('class_id')){
                    inputFocus('class_id');
                    alertBox('alert', 'Please select class !', 'bg-danger');
                    return;
                }
                if(selectCheck('type')){
                    inputFocus('type');
                    alertBox('alert', 'Please select fees type !', 'bg-danger');
                    return;
                }
        
                var hasEmptyFields = false;
                $('input[name="fees_name[]"]').each(function() {
                    if ($(this).val() === '') {
                        hasEmptyFields = true;
                        return false; // exit the loop early
                    }
                });
                
                $('input[name="fees_value[]"]').each(function() {
                    if ($(this).val() === '') {
                        hasEmptyFields = true;
                        return false; // exit the loop early
                    }
                });
                    if (hasEmptyFields) {
                        alertBox('alert', 'Please enter fees details !', 'bg-danger');
                        return; 
                    }
                classRemove('alert', 'bg-danger');
                btnActionDisable('btnSave');
                $.post("?q=fees/saveFess", $("#feesMasterForm").serialize(), (resp)=>{
                    if(resp===0){
                        alertBox('alert', 'Something happened wrong ! please try ageen !', 'bg-warning');
                        btnActionEnable('btnSave');
                        return;
                    }
                    if(resp > 0){
                        alertBox('alert', 'Registration success !', 'bg-success');
                        formReset('feesMasterForm');
                        btnActionEnable('btnSave');
                        return;
                    }
                });
            });
        }
        </script>
    </body>
</html>





   