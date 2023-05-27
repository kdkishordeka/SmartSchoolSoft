<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - Academic Registration</title>
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
                        <h3 class="text-center text-danger mt-5"><b>Smart School Soft</b></h3>
                        <div class="card shadow-lg border-0 rounded-lg mt-3">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">School Registration</h3></div>
                            <div class="card-body">
                                <div class="alert text-white d-none" id="alert">

                                </div>
                                <form id="schRegisterForm">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 form-group mb-3">
                                            <label>School Name :</label>
                                            <input class="form-control" placeholder="Enter school name" name="school_name" id="school_name" type="text">
                                        </div>
                                        <div class="col-sm-12 col-md-6 form-group mb-3">
                                            <label>Tag Name :</label>
                                            <input class="form-control" placeholder="Enter tag name" name="tag_name" id="tag_name" type="text">
                                        </div>
                                        <div class="col-sm-12 col-md-6 form-group mb-3">
                                            <label>Phone No :</label>
                                            <input class="form-control" placeholder="Enter phone no" name="phone" id="phone" type="number">
                                        </div>
                                        <div class="col-sm-12 col-md-6 form-group mb-3">
                                            <label>Email ID :</label>
                                            <input class="form-control" placeholder="Enter email" name="email" id="email" type="email">
                                        </div>
                                        <div class="col-sm-12 form-group mb-3">
                                            <label>School Address :</label>
                                            <textarea class="form-control" id="school_address" name="school_address" placeholder="Enter school address"></textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-4 form-group mb-3">
                                            <label>City :</label>
                                            <input class="form-control" placeholder="Enter city" name="school_city" id="school_city" type="text">
                                        </div>
                                        <div class="col-sm-12 col-md-4 form-group mb-3">
                                            <label>State :</label>
                                            <input class="form-control" placeholder="Enter state" name="school_state" id="school_state" type="text">
                                        </div>
                                        <div class="col-sm-12 col-md-4 form-group mb-3">
                                            <label>Zip :</label>
                                            <input class="form-control" placeholder="Enter zip code" name="school_zip" id="school_zip" type="number">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <input type="submit" name="btnSave" id="btnSave" class="btn btn-primary" value="Save" />
                                    </div>
                                </form>
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
          
          const saveData = ()=>{
              $(document).on("click", "#btnSave", (e)=>{
                 e.preventDefault();
                 if(inputCheck('school_name')){
                   inputFocus('school_name');
                   alertBox('alert', 'Please enter school name !', 'bg-danger');
                   return;
                 }
                 if(inputCheck('phone')){
                   inputFocus('phone');
                   alertBox('alert', 'Please enter phone no !', 'bg-danger');
                   return;
                 }
                 if(inputCheck('school_address')){
                   inputFocus('school_address');
                   alertBox('alert', 'Please enter address !', 'bg-danger');
                   return;
                 }
                 if(inputCheck('school_city')){
                   inputFocus('school_city');
                   alertBox('alert', 'Please enter city !', 'bg-danger');
                   return;
                 }
                 btnActionDisable('btnSave');
                 $.ajax({
                     url    : "?q=school/register",
                     type   : "POST",
                     data   : $("#schRegisterForm").serialize(),
                     datatype : "json",
                     error  : function (html)
                     {
                         alertBox('alert', 'Something happened wrong ! '+html, 'bg-warning');
                     },
                     success: function (resp)
                     {
                         btnActionEnable('btnSave');
                         if(parseJsonData(resp, 'SUCCESS') === 0){
                             alertBox('alert', 'Something happened wrong ! please try ageen! ', 'bg-warning');
                             return;
                          }
                          if(parseJsonData(resp, 'SUCCESS') > 0){
                             formReset("schRegisterForm");
                             btnActionEnable("btnSave"); 
                             alertBox('alert', 'Registration success !', 'bg-success');
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
