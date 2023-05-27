<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Administrator
 */
class admin extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        if(Session::has_login()){
            if(Session::getSchoolId()>0){
                $this->dashboard(Session::getSchoolId());
            }else{
                $db     = new Db_Loader();
                $row   = $db->select([" * "], TableName::VIEW_SOFT_USER)->where(["USER_ID"=> Session::getUserId()])->fetch_row();
                if($row){
                    Session::setSession(Session::SCHOOL_ID, $row["SCHOOL_ID"]);
                    Session::setSession(Session::SCHOOL_NAME, $row["SCHOOL_NAME"]);
                    $this->dashboard($row["SCHOOL_ID"]);
                }else{
                    header("location:?url=admin/schoolRegister");
                }
            }
        }else{
            header("location:?url=admin/login");
        }
    }
    
    public function dashboard($schoolID) {
        $db = new Db_Loader();
        $countStudent = $db->count("ID", TableName::STUDENT)->where(["SCHOOL_ID" => $schoolID])->fetch_row();
        $db1 = new Db_Loader();
        $countStudentStandard = $db1->count(" ID ", TableName::STUDENT_STANDARD)->where(["SCHOOL_ID" => $schoolID])->fetch_row();
        $db2 = new Db_Loader();
        $sumAdmission = $db2->sum(" AMOUNT ", TableName::RECEIPT_VOUCHER)
                            ->filter("SCHOOL_ID = ? AND TYPE = ? AND ACTIVE = ?", [Session::getSchoolId(), "admission", "Y"])
                            ->fetch_row();
        $db3 = new Db_Loader();
        $sumFees = $db3->sum(" AMOUNT ", TableName::RECEIPT_VOUCHER)
                            ->filter("SCHOOL_ID = ? AND TYPE = ? AND ACTIVE = ?", [Session::getSchoolId(), "monthly", "Y"])
                            ->fetch_row();
        $this->load_data("admin/dashboard", ["count" =>$countStudent, "count1" =>$countStudentStandard, "count2" => $sumAdmission, "count3" => $sumFees]);
    }
    
    public function login() {
        $this->load("admin/login");
    }
    
    public function userRegister() {
        $this->load("admin/user_register");
    }
    
    public function addUser() {
        $this->load("admin/add_user");
    }
    
    public function schoolRegister() {
        $this->load("admin/school_register");
    }
    
    public function studentRegister() {
        $this->load("admin/student/register");
    }
    
    public function studentMaster() {
        $this->load("admin/student/masterList");
    }
    
    public function academicYear() {
        $this->load("admin/academic/yearMasterList");
    }
    
    public function academicYearRegister() {
        $this->load("admin/academic/yearRegister");
    }
    
    public function academicStandardRegister() {
        $this->load("admin/academic/standardRegister");
    }
    
    public function academicStandarMatser() {
        $this->load("admin/academic/standardMasterList");
    }
    
    public function studentStandarMatser() {
        $this->load("admin/student/standard_MasterList");
    }
    
    public function academicFeesMatser() {
        $this->load("admin/fees/masterList");
    }
    
    public function academicFeesRegister() {
        $db1 = new Db_Loader();
        $years      = $db1->select([" * "], TableName::ACADEMIC_YEAR)->filter("SCHOOL_ID = ? AND IS_ACTIVE = ?", [Session::getSchoolId(), "Y"])->fetch_all();
        $db2 = new Db_Loader();
        $s_class    = $db2->select([" * "], TableName::VIEW_CLASS_DETAILS)->filter("SCHOOL_ID = ? AND ACTIVE = ?", [Session::getSchoolId(), "Y"])->fetch_all();
        $this->load_data("admin/fees/feesRegister", ["years"=>$years, "s_class"=>$s_class]);
    }
    
    public function studentStandarRegister() {
        $this->load("admin/student/standard_Register");
    }
    
    public function studentAdmission($studentid) {
        $db = new Db_Loader();
        $row        = $db->select([" * "], TableName::STUDENT)->where(["ID"=>$studentid])->fetch_row();
        $db1 = new Db_Loader();
        $years      = $db1->select([" * "], TableName::ACADEMIC_YEAR)->filter("SCHOOL_ID = ? AND IS_ACTIVE = ?", [Session::getSchoolId(), "Y"])->fetch_all();
        $db2 = new Db_Loader();
        $s_class    = $db2->select([" * "], TableName::VIEW_CLASS_DETAILS)->filter("SCHOOL_ID = ? AND ACTIVE = ?", [Session::getSchoolId(), "Y"])->fetch_all();
        $this->load_data("admin/student/standardAdmission", ["row" => $row, "years" =>$years, "s_class"=>$s_class]);
    }
    
    public function userManagement(){
        $this->load("admin/user_management");
    }

    public function logOut(){
        Session::init();
        Session::remove(Session::USER_ID);
        Session::remove(Session::USER_PARENT);
        Session::remove(Session::USER_NAME);
        Session::remove(Session::USER_TYPE);
        Session::remove(Session::USER_EMAIL);
        Session::remove(Session::USER_PHONE);
        Session::remove(Session::USER_ACCESS);
        Session::remove(Session::SCHOOL_ID);
        Session::remove(Session::SCHOOL_NAME);
        header("location:?url=admin/login");
    }
    
    public function feesCollection() {
        $db = new Db_Loader();
        $type = $db->select([" TYPE "], TableName::VIEW_FEES_MADULE)
                ->filter("SCHOOL_ID = ? AND ACTIVE = ?", [Session::getSchoolId(), 'Y'])
                ->group_by("TYPE")
                ->fetch_all();
        $this->load_data("admin/fees/collection", ["type"=>$type]);
    }
    
    public function accountMaster() {
        $this->load("admin/account/masterList");
    }
    
    public function registerAccount() {
        $this->load("admin/account/masterRegister");
    }
    
    public function receiptCreate($student_fees_id) {
        $db = new Db_Loader();
        $row = $db->select([" * "], TableName::VIEW_STUDENT_FEES)->where(["STUDENT_FEES_ID" => $student_fees_id])->fetch_row();
        if($row["RECEIPT_ID"] > 0){
            $this->load("admin/receipt/masterList");
        }else{
            $this->load_data("admin/receipt/create", ["row"=>$row]);
        }
    }
    
    public function receiptMasterList() {
        $this->load("admin/receipt/masterList");
    }
}