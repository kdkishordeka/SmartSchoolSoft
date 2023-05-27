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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="?url=admin/accountMaster">Account Management</a></li>
                            <li class="breadcrumb-item active">Add Account</li>
                        </ol>
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-user-plus"></i> Add Account
                            </div>
                            <form id="acForm">
                                <div class="card-body row">
                                    <div class="alert text-white d-none" id="alert"></div>
                                    <div class="col-sm-12 col-md-4 form-group">
                                        <label>Account Name :</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Account Name"/>
                                    </div>
                                    <div class="col-sm-12 col-md-4 form-group">
                                        <label>Select Account Type :</label>
                                        <select class="form-control" id="type" name="type">
                                            <option selected disabled>Select Account Type</option>
                                            <option value="CASH">Cash</option>
                                            <option value="BANK">Bank</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4 form-group">
                                        <label>Select Account Group :</label>
                                        <select class="form-control" id="ac_group" name="ac_group">
                                            <option selected disabled>Select Account Group</option>
                                            <option value="CASH">Cash</option>
                                            <option value="BANK">Bank</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4 form-group mt-4">
                                        <label>Account Number :</label>
                                        <input type="number" id="number" name="number" class="form-control" placeholder="Enter Account Number"/>
                                    </div>
                                    <div class="col-sm-12 col-md-4 form-group mt-4">
                                        <label>IFSC :</label>
                                        <input type="text" id="ifsc" name="ifsc" class="form-control" placeholder="Enter IFSC"/>
                                    </div>
                                    <div class="col-sm-12 col-md-4 form-group mt-4">
                                        <label>Bank Name :</label>
                                        <input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Enter Bank Name"/>
                                    </div>
                                    <div class="col-sm-12 mt-4" align="center">
                                        <input type="submit" id="btnSave" class="btn btn-sm btn-success" value="save"/>
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
            $(document).ready(()=>{
               saveData(); 
            });
            const saveData = () =>{
                $(document).on("click", "#btnSave", (e)=>{
                   e.preventDefault();
                   if(inputCheck('name')){
                       inputFocus('name');
                       alertBox('alert', 'Please enter account name !', 'bg-danger');
                       return;
                   }
                   if(selectCheck('type')){
                       inputFocus('type');
                       alertBox('alert', 'Please select account type !', 'bg-danger');
                       return;
                   }
                   if(selectCheck('ac_group')){
                       inputFocus('ac_group');
                       alertBox('alert', 'Please select account group !', 'bg-danger');
                       return;
                   }
                   classRemove('alert', 'bg-danger');
                   btnActionDisable('btnSave');
                   
                   $.post("?q=account/saveData", $("#acForm").serialize(), (resp)=>{
                     if(parseJsonData(resp, 'SUCCESS') > 0){
                        alertBox('alert', 'Registration success !', 'bg-success');
                        formReset('acForm');
                        btnActionEnable('btnSave');
                        return;
                     }
                   });
                });
            }
        </script>
    </body>
</html>