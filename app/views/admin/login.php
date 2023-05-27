<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - Login</title>
        <meta name="description" content="Streamline the management of school operations with Smart School Soft - a comprehensive school management system. Manage student information, grades, classes, payments, and more.">
        <meta name="keywords" content="smart school soft, school management software, student information, attendance, grading, reports, finances, personnel">
        <meta name="author" content="Kishor Deka" />
        <link rel="apple-touch-icon" sizes="180x180" href="web/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="web/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="web/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="web/images/favicon/site.webmanifest">
        <link href="web/assest/css/styles.css" rel="stylesheet" />
        <link href="web/assest/css/bootstrap-select.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                                    <div class="card-body">
                                        <div class="alert text-white d-none" id="alert">
                                            
                                        </div>
                                        <form id="loginForm">
                                            <div class="mb-3">
                                                <label>Email or Phone</label>
                                                <input type="text" id="userid" name="userid" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" id="password" name="password" class="form-control" />
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Login" />
                                                <a href="?url=admin/userRegister" class="btn btn-success">Register</a>
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
              submitData();
          });
          const submitData =()=>{
              $(document).on("click", "#submit", (e)=>{
                  e.preventDefault();
                  if($("#userid").val() === ""){
                      $("#userid").focus();
                      alertBox('alert', 'Please Enter Email or Phone No !', 'bg-danger');
                      return;
                  }
                  if($("#password").val() === ""){
                    $("#password").focus();
                    alertBox('alert', 'Please Enter Password !', 'bg-danger');
                    return;
                  }
                  btnActionDisable("submit");
                  $.ajax({
                      url   : "?q=user/login",
                      type  : "POST",
                      data  : $("#loginForm").serialize(),
                      datatype: "json",
                        error: function (html)
                        {
                          alertBox('alert', 'Something happened wrong! '+html, 'bg-danger');
                        },
                        success: function(resp){
                          btnActionEnable("submit");
                          if(parseJsonData(resp, "SUCCESS") === 0){
                             alertBox('alert', 'User Not Found !', 'bg-warning');
                             return;
                          }
                          if(parseJsonData(resp, "SUCCESS") === -1){
                             alertBox('alert', 'Incorrect Password !', 'bg-warning');
                             return; 
                          }
                          if(parseJsonData(resp, "SUCCESS") > 0){
                             alertBox('alert', 'Login success !', 'bg-success');
                             window.location = "?url=admin";
                             return; 
                          }
                        },
                  });
              });
          }
      </script>
    </body>
</html>
