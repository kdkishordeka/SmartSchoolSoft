<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - Academic Standard Management</title>
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
            <div id="layoutSidenav_nav">
                <!--Side Nav Bar Start-->
                    <?php include view_path.'admin/main/sideNavbar.php'; ?>
                <!--Side Nav Bar End-->    
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Academic Standard Management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="?url=admin/academicStandarMatser">Academic Standard Management</a></li>
                            <li class="breadcrumb-item active">Add Academic Class</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-user-plus"></i> Add Academic Class
                                    </div>
                                    <div class="card-body">
                                        <div class="alert text-white d-none" id="alert"></div>
                                        <form method="POST" id="classForm">
                                            <div class="mb-3">
                                                <label>Enter Class Name :<span class="text-danger">*</span></label>
                                                <input type="text" name="class_name" id="class_name" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label>Select Section :<span class="text-danger">*</span></label>
                                                <select name="section_id" id="section_id" class="form-control">
                                                </select>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <input type="submit" name="clssSaveBtn" id="clssSaveBtn" class="btn btn-success btn-sm" value="Save" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                List Of Section
                                            </div>
                                            <div class="col-sm-4">
                                                <p align="right" style="margin: 0; padding: 0">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Section</button>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Section Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="fetchDevision"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Academic Section</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Section Name :</label>
                                            <input type="text" class="form-control" id="section_name" name="section_name"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <p id="erromsg" style="margin: 0; padding: 0"></p>
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="divSaveBtn" class="btn btn-primary btn-sm" onclick="saveDevision()">Save</button>
                                    </div>
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
        <script type="text/javascript">
            $(document).ready(()=>{
                saveClass();
                loadDevision();
                loadDevisionSelect();
            });
            const saveDevision = () =>{
                if(inputCheck('section_name')){
                    alertBox('erromsg', 'Please enter devision name !', ' text-danger');
                    inputFocus('section_name');
                    return;
                }
                btnActionDisable('divSaveBtn');
                $.post('?q=section/insertData', {"section_name" : $("#section_name").val()}, (resp)=>{
                    btnActionEnable('divSaveBtn');
                    if(parseJsonData(resp, 'SUCCESS') === 0){
                       alertBox('erromsg', 'something went wrong please try again !', ' text-danger');
                       return;
                    }
                    if(parseJsonData(resp, 'SUCCESS') > 0){
                       $("#section_name").val(""); 
                       alertBox('erromsg', 'Data inserted successfully !', ' text-success');
                       loadDevision();
                       loadDevisionSelect();
                       return;
                    }
                });
            }
            
            const loadDevision = ()=>{$.get('?q=section/loadData/all', (html)=>$("#fetchDevision").html(html))}
            
            const loadDevisionSelect = ()=>{
                $.get('?q=section/loadData/select', (resp)=>{
                    var data = parseJsonData(resp, 'DATA');
                    var html = '<option value="" selected disabled>Select Section</option>';
                    if(parseJsonData(resp, 'SUCCESS') > 0){
                        for(var i=0; i < data.length; i++ ){
                            html += '<option value="'+data[i]['ID']+'">'+data[i]['SECTION_NAME']+'</option>'; 
                        }
                    }
                    $("#section_id").html(html);
                });
            }
            
            const saveClass = () =>{
                $(document).on("click", "#clssSaveBtn", (e)=>{
                    e.preventDefault();
                    if(inputCheck('class_name')){
                        inputFocus('class_name');
                        alertBox('alert', 'Please enter standard name !', 'bg-danger');
                        return;
                    }
                    if($("#division").val()===null){
                      $("#division").focus();
                      alertBox('alert', 'Please select academic division !', ' bg-danger');
                      return;
                   }
                   classRemove('alert', 'bg-danger');
                   btnActionDisable('clssSaveBtn');
                   
            $.post("?q=schoolClass/insertData", $("#classForm").serialize(),(resp)=>{
                       btnActionEnable('clssSaveBtn');
                       if(parseJsonData(resp, "SUCCESS")===0){
                           alertBox('alert', 'Something happened wrong ! please try ageen! ', 'bg-warning');
                           return;
                       }
                       if(parseJsonData(resp, "SUCCESS") > 0){
                           alertBox('alert', 'Registration success !', 'bg-success');
                           formReset('classForm');
                           return;
                       }
                   })
                })
            }
        </script>
    </body>
</html>
