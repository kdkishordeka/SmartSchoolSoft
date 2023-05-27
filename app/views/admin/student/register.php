<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - Student Register</title>
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
                        <h1 class="mt-4">Student Management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="?url=admin/studentMaster">Student Management</a></li>
                            <li class="breadcrumb-item active">Add Student</li>
                        </ol>
                        <div class="container">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-user-plus"></i> Add New Student
                                </div>
                                <div class="card-body">
                                    <div class="alert text-white d-none" id="alert"></div>
                                    <form method="post" id="student_form" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="mb-3 col-sm-12 col-md-8">
                                                <label>Student Name <span class="text-danger">*</span> :</label>
                                                <input type="text" placeholder="Enter Student Name" id="name" name="name" class="form-control" />
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-4">
                                                <label>Gender Select <span class="text-danger">*</span> :</label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="" disabled selected>Choose your option</option>
                                                    <option class="male">Male</option>
                                                    <option class="female">Female</option>
                                                    <option class="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Father's Name <span class="text-danger">*</span> :</label>
                                                <input class="form-control" placeholder="Enter father's name" type="text" id="father_name" name="father_name"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Occupation of father :</label>
                                                <input type="text" class="form-control" placeholder="Enter father occupation" id="father_occupation" name="father_occupation"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Mother's Name <span class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" placeholder="Enter mother's name" id="mother_name" name="mother_name"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Occupation of mother :</label>
                                                <input type="text" class="form-control" placeholder="Enter mother occupation" id="mother_occupation" name="mother_occupation"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-4">
                                                <label>Date of Birth <span class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" class="datepicker" id="date_of_birth" name="date_of_birth"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-4">
                                                <label>Identification Mark :</label>
                                                <input type="text" class="form-control" placeholder="Physical identification mark" id="identification" name="identification"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-4">
                                                <label>Nationality :</label>
                                                <input type="text" class="form-control" placeholder="Enter nationality" id="nationality" name="nationality"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>Vill/Town <span class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" placeholder="Enter vill/town name" id="c_vill_town" name="c_vill_town"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>Post Office :</label>
                                                <input type="text" class="form-control" placeholder="Enter post office" id="c_po" name="c_po"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>Police Station :</label>
                                                <input type="text" class="form-control" placeholder="Enter police station" id="c_ps" name="c_ps"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>District :</label>
                                                <input type="text" class="form-control" placeholder="Enter district" id="c_dist" name="c_dist"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>City :</label>
                                                <input type="text" class="form-control" placeholder="Enter city" id="c_city" name="c_city"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>State :</label>
                                                <input type="text" class="form-control" placeholder="Enter state" id="c_state" name="c_state"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>Pin Code :</label>
                                                <input type="text" class="form-control" placeholder="Enter pin code" id="c_zip" name="c_zip"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>Email :</label>
                                                <input type="email" class="form-control" placeholder="Enter email" id="email" name="email"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>Caste Select :</label>
                                                <select id="caste" name="caste" class="form-control">
                                                    <option value="" disabled selected>Choose your option</option>
                                                    <option class="Gen">Gen</option>
                                                    <option class="Gen">SC</option>
                                                    <option class="ST">ST</option>
                                                    <option class="OBC/MONC">OBC/MONC</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>Mobile No <span class="text-danger">*</span> :</label>
                                                <input type="number" class="form-control" placeholder="Enter mobile no" id="contact_mobile" name="contact_mobile"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>Whatsapp No :</label>
                                                <input type="number" class="form-control" placeholder="Enter Whatsapp No" id="whatsapp_no" name="whatsapp_no"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-3">
                                                <label>Blood Group :</label>
                                                <input type="text" class="form-control" placeholder="Enter blood group" id="blood_group" name="blood_group"/>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Student Photo :</label>
                                                <input type="file" class="form-control" name="photo" id="photo" />
                                                <span class="text-muted">Only .jpg & .png file allowed</span>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-md-6">
                                                <label>Student Signature :</label>
                                                <input type="file" class="form-control" name="sing" id="sing" />
                                                <span class="text-muted">Only .jpg & .png file allowed</span>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <input type="submit" name="saveBtn" id="saveBtn" value="Save" class="btn btn-success" />
                                        </div>
                                    </form>
                                </div>
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
            $(document).ready(()=>{
                saveData();
            });
            
            const saveData = () =>{
                $('form').submit(function(e){
                e.preventDefault();
                if(inputCheck('name')){
                    inputFocus('name');
                    alertBox('alert', 'Please enter student name !', 'bg-danger');
                    return;
                }
                if(!$("#gender").val()){
                    $("#gender").focus();
                    alertBox('alert', 'Please select gender !', 'bg-danger');
                    return;
                }
                if(inputCheck('father_name')){
                    inputFocus('father_name');
                    alertBox('alert', 'Please enter father name !', 'bg-danger');
                    return;
                }
                if(inputCheck('mother_name')){
                    inputFocus('mother_name');
                    alertBox('alert', 'Please enter Mother name !', 'bg-danger');
                    return;
                }
                if(inputCheck('date_of_birth')){
                    inputFocus('date_of_birth');
                    alertBox('alert', 'Please enter date of birth !', 'bg-danger');
                    return;
                }
                if(inputCheck('c_vill_town')){
                    inputFocus('c_vill_town');
                    alertBox('alert', 'Please enter village and town !', 'bg-danger');
                    return;
                }
                if(inputCheck('contact_mobile')){
                    inputFocus('contact_mobile');
                    alertBox('alert', 'Please enter mobile no !', 'bg-danger');
                    return;
                }
                
                classRemove('alert', 'bg-danger');
                btnActionDisable('saveBtn');
                
                var formData = new FormData($(this)[0]);
                $.ajax({
                        url: '?q=studentRegister/saveStudent',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(resp) {
                            console.log('POST request was successful '+resp);
                            if(parseJsonData(resp, 'SUCCESS')===0){
                                alertBox('alert', 'Something happened wrong ! please try ageen !', 'bg-warning');
                                btnActionEnable('saveBtn');
                            }
                            if(parseJsonData(resp, 'SUCCESS') > 0){
                                alertBox('alert', 'insert success !', 'bg-success');
                                formReset('student_form');
                                btnActionEnable('saveBtn');
                            }
                            if(parseJsonData(resp, 'SUCCESS') === -1){
                                alertBox('alert', parseJsonData(resp, 'MSG'), 'bg-warning');
                                btnActionEnable('saveBtn');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('An error occurred');
                            console.log(error);
                            btnActionEnable('saveBtn');
                        }
                    });
                });
            }
        </script>
    </body>
</html>