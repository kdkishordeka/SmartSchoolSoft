<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - Academic Year Management</title>
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
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Academic Year Management</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="?url=admin/academicYear">Academic Management</a></li>
                        <li class="breadcrumb-item active">Add Academic Year</li>
                    </ol>
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-6 m-auto">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-user-plus"></i> Add Academic Year
                                </div>
                                <div class="card-body">
                                    <div class="alert text-white d-none" id="alert"></div>
                                    <form method="post" id="academicYearForm">
                                        <div class="row">
                                            <div class="mb-3 form-group col-sm-12 col-md-6">
                                                <label>Select Start Year <span class="text-danger">*</span></label>
                                                <select name="start_year" id="start_year" class="form-control">
                                                    <option value="" selected disabled>Select Start Year</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>    
                                                </select>
                                            </div>
                                            <div class="mb-3 form-group col-sm-12 col-md-6">
                                                <label>Select Start Month <span class="text-danger">*</span></label>
                                                <select name="start_month" id="start_month" class="form-control">
                                                    <option value="" selected disabled>Select Start Month</option>
                                                    <option value="JANUARY">January</option>
                                                    <option value="FEBRUARY">February</option>
                                                    <option value="MARCH">March</option>
                                                    <option value="APRIL">April</option>
                                                    <option value="MAY">May</option>
                                                    <option value="JUNE">June</option>
                                                    <option value="JULY">July</option>
                                                    <option value="AUGUST">August</option>
                                                    <option value="SEPTEMBER">September</option>
                                                    <option value="OCATOBER">October</option>
                                                    <option value="NOVEMBER">November</option>
                                                    <option value="DECEMBER">December</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 form-group col-sm-12 col-md-6">
                                                <label>Select End Year <span class="text-danger">*</span></label>
                                                <select name="end_year" id="end_year" class="form-control">
                                                    <option value="" selected disabled>Select End Year</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2027">2027</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 form-group col-sm-12 col-md-6">
                                                <label>Select End Month <span class="text-danger">*</span></label>
                                                <select name="end_month" id="end_month" class="form-control">
                                                    <option value="" selected disabled>Select End Month</option>
                                                    <option value="JANUARY">January</option>
                                                    <option value="FEBRUARY">February</option>
                                                    <option value="MARCH">March</option>
                                                    <option value="APRIL">April</option>
                                                    <option value="MAY">May</option>
                                                    <option value="JUNE">June</option>
                                                    <option value="JULY">July</option>
                                                    <option value="AUGUST">August</option>
                                                    <option value="SEPTEMBER">September</option>
                                                    <option value="OCATOBER">October</option>
                                                    <option value="NOVEMBER">November</option>
                                                    <option value="DECEMBER">December</option>  
                                                </select>
                                            </div>
                                            <div class="col-sm-12 mt-4 mb-0 centered">
                                                <input type="submit" name="btnSave" id="btnSave" class="btn btn-success" value="SAVE" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            $(document).ready(()=>{
                saveData();
            });
            
            const saveData = () =>{
               $(document).on("click", "#btnSave", (e)=>{
                   e.preventDefault();
                   if($("#start_year").val()===null){
                      $("#start_year").focus();
                      alertBox('alert', 'Please select academic start year !', ' bg-danger');
                      return;
                   }
                   if($("#start_month").val()===null){
                      $("#start_month").focus();
                      alertBox('alert', 'Please select academic start month !', ' bg-danger');
                      return;
                   }
                   if($("#end_year").val()===null){
                      $("#end_year").focus();
                      alertBox('alert', 'Please select academic end year !', ' bg-danger');
                      return;
                   }
                   if($("#end_month").val()===null){
                      $("#end_month").focus();
                      alertBox('alert', 'Please select academic end month !', ' bg-danger');
                      return;
                   }
                   
                   classRemove('alert', 'bg-danger');
                   btnActionDisable('btnSave');
                   
                   $.post("?q=academicyear/saveData", $("#academicYearForm").serialize(), (resp)=>{
                       btnActionEnable('btnSave');
                       if(parseJsonData(resp, "SUCCESS")===0){
                           alertBox('alert', 'Something happened wrong ! please try ageen! ', 'bg-warning');
                           return;
                       }
                       if(parseJsonData(resp, "SUCCESS") > 0){
                           alertBox('alert', 'Registration success !', 'bg-success');
                           formReset('academicYearForm');
                           return;
                       }
                   })
               }); 
            }
        </script>
    </body>
</html>