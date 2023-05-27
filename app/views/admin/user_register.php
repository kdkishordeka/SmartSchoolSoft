<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - User Registration</title>
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
    <body class="bg-light">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <br />
                                <br />
                                <h3 class="text-center text-danger mt-5"><b>Smart School Soft</b></h3>
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">User Registration</h3></div>
                                    <div class="card-body">
                                        <div class="alert text-white d-none" id="alert">
                                            
                                        </div>
                                        <form id="userRegister">
                                            <div class="mb-3">
                                                <label>Full Name</label>
                                                <input type="text" id="name" name="name" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label>Phone No</label>
                                                <input type="number" id="phone" name="phone" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label>Email id</label>
                                                <input type="email"  id="email" name="email" class="form-control"/>
                                            </div>
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" id="password" name="password" class="form-control" />
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" name="btnSave" id="btnSave" class="btn btn-primary" value="Save" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; School Management System <?php echo date('Y'); ?></div>
                        </div>
                    </div>
                </footer>
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
            btnActionDisable("btnSave");
                  
            $.post("?q=user/insertData", $("#userRegister").serialize(), (resp)=>{
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
                        window.location = "?url=admin";
                        return;
                    }
                  });
              });
          }
      </script>
    </body>
</html>
