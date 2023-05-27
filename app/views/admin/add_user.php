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
                        <h1 class="mt-4">User Management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="?url=admin/userManagement">User Management</a></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-user-plus"></i> Add New User
                                    </div>
                                    <div class="card-body">
                                    <div class="alert text-white d-none" id="alert"></div>
                                    <form id="userRegister">
                                        <div class="mb-3">
                                            <label>Full Name <span class="text-danger">*</span> :</label>
                                            <input type="text" id="name" name="name" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Select Designation <span class="text-danger">*</span> :</label>
                                            <select class="form-control" id="designation" name="designation">
                                                <option value="" selected disabled>Choose your option</option>
                                                <option value="Principal">Principal</option>
                                                <option value="Vice principal">Vice principal</option>
                                                <option value="Superintendent">Superintendent</option>
                                                <option value="Academic coordinator">Academic coordinator</option>
                                                <option value="Teacher">Teacher</option>
                                                <option value="Teaching assistant">Teaching assistant</option>
                                                <option value="Bus driver">Bus driver</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Select Type <span class="text-danger">*</span> :</label>
                                            <select class="form-control" id="type" name="type">
                                                <option value="" selected disabled>Choose your option</option>
                                                <option value="ADMIN">Admin</option>
                                                <option value="USER">User</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Phone No <span class="text-danger">*</span> :</label>
                                            <input type="number" id="phone" name="phone" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Email id <span class="text-danger">*</span> :</label>
                                            <input type="email"  id="email" name="email" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label>Password <span class="text-danger">*</span> :</label>
                                            <input type="password" id="password" name="password" class="form-control" />
                                        </div>
                                        <div class="mt-4 mb-0" align="center">
                                            <input type="submit" name="btnSave" id="btnSave" class="btn btn-primary" value="Save" />
                                        </div>
                                    </form>
                                    </div>
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
                    if(inputCheck("name")){
                      inputFocus("name");
                      alertBox('alert', 'Please enter full name !', 'bg-danger');
                      return;
                    }
                    if(selectCheck('designation')){
                      inputFocus("designation");
                      alertBox('alert', 'Please select designation !', 'bg-danger');
                      return;  
                    }
                    if(selectCheck('type')){
                      inputFocus("type");
                      alertBox('alert', 'Please select type !', 'bg-danger');
                      return;  
                    }
                    if(inputCheck("phone")){
                      inputFocus("phone");
                      alertBox('alert', 'Please enter phone no !', 'bg-danger');
                      return;
                    }
                    if(inputCheck("email")){
                      inputFocus("email");
                      alertBox('alert', 'Please enter email id !', 'bg-danger');
                      return;
                    }
                    if(inputCheck("password")){
                      inputFocus("password");
                      alertBox('alert', 'Please enter password !', 'bg-danger');
                      return;
                    }
                    classRemove('alert', 'bg-danger');
                    btnActionDisable('btnSave');
                    
            $.post("?q=user/saveData", $("#userRegister").serialize(), (resp)=>{
                btnActionDisable("btnSave");
                console.log(resp);
                    if(parseJsonData(resp, 'SUCCESS') === 0){
                          if(parseJsonData(resp, 'CHECKPHONE') > 0){
                              inputFocus("phone");
                              alertBox('alert', 'Phone no already registered !', 'bg-warning');
                          }
                          if(parseJsonData(resp, 'CHECKEMAIL') > 0){
                              inputFocus("email");
                              alertBox('alert', 'Email already registered !', 'bg-warning');
                          }
                          btnActionEnable("btnSave");
                          return;
                    }
                    if(parseJsonData(resp, 'SUCCESS') > 0){
                        formReset("userRegister");
                        btnActionEnable("btnSave");
                        alertBox('alert', 'Registration success !', 'bg-success');
                        window.location = "?url=admin/userManagement";
                        return;
                    }
                  });
                });
            }
        </script>
    </body>
</html>