<?php

class user extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        
    }
    
    public function login() {
        $resp = array();
        $resp["SUCCESS"] = 0;
        $userid     = filter_input(INPUT_POST, "userid");
        $password   = filter_input(INPUT_POST, "password");
        $db     = new Db_Loader();
        $row    = $db->select([" * "], TableName::LOGIN_USERS)->filter("PHONE = ? OR EMAIL = ?", [$userid, $userid])->fetch_row();

        if($row){
            if($row["PASSWORD"] === $password){
                $resp["SUCCESS"] = $row["ID"];
                Session::init();
                Session::setSession(Session::USER_ID, $row["ID"]);
                Session::setSession(Session::USER_NAME, $row["NAME"]);
                Session::setSession(Session::USER_TYPE, $row["TYPE"]);
                Session::setSession(Session::USER_ACCESS, $row["ACCESS"]);
            }else{
                $resp["SUCCESS"] = -1;
            }
        }
        echo json_encode($resp);
    }
    
    public function checkPhone($param) {
        $resp = 0;
        $db     = new Db_Loader();
        $rows   = $db->select(["ID"], TableName::LOGIN_USERS)->where(["PHONE"=>$param])->fetch_all();
        if(count($rows) > 0){
           $resp = count($rows); 
        }
        return $resp;
    }
    
    public function checkEmail($param) {
        $resp = 0;
        $db     = new Db_Loader();
        $rows   = $db->select(["ID"], TableName::LOGIN_USERS)->where(["EMAIL"=>$param])->fetch_all();
        if(count($rows) > 0){
           $resp = count($rows); 
        }
        return $resp;
    }
    
    public function insertData() {
        $arr = filter_input_array(INPUT_POST);
        $arr["designation"] = "ADMIN";
        $arr["type"]        = "ADMIN";
        $arr["access"]      = "ADMIN";
        $arr["create_on"]   = time()*1000;
        $arr["active"]      = "Y";
        
        $resp = [];
        $resp["SUCCESS"] = 0;
        $resp["CHECKPHONE"] = $this->checkPhone($arr["phone"]);
        $resp["CHECKEMAIL"] = $this->checkEmail($arr["email"]);
        
        if($resp["CHECKPHONE"] === 0 && $resp["CHECKEMAIL"] === 0){
            $db  = new Db_Save();
            $row = $db->set_table(TableName::LOGIN_USERS)->set_columns($arr)->insert();
            if($row > 0){
                $resp["SUCCESS"] = $row;
            }
        }
        echo json_encode($resp);
    }

    public function saveData() {
        $arr = filter_input_array(INPUT_POST);
        $arr["access"]      = "ADMIN";
        $arr["create_by"]   = Session::getUserId();
        $arr["create_on"]   = time()*1000;
        $arr["active"]      = "Y";
        
        $resp = [];
        $resp["SUCCESS"] = 0;
        $resp["CHECKPHONE"] = $this->checkPhone($arr["phone"]);
        $resp["CHECKEMAIL"] = $this->checkEmail($arr["email"]);
        
        if($resp["CHECKPHONE"] === 0 && $resp["CHECKEMAIL"] === 0){
            $db  = new Db_Save();
            $row = $db->set_table(TableName::LOGIN_USERS)->set_columns($arr)->insert();
            if($row > 0){
                $db1 = new Db_Save();
                $su = $db1->set_table(TableName::SOFT_USER)->set_columns(["USER_ID"=>$row, "SCHOOL_ID"=> Session::getSchoolId()])->insert();
                if($su>0){
                    $resp["SUCCESS"] = $su;
                }
            }
        }
        echo json_encode($resp);
    }
    
    public function fetchData($param) {
        $db     = new Db_Loader();
        $rows   = $db->select([" * "], TableName::VIEW_SOFT_USER)->where(["SCHOOL_ID"=> Session::getSchoolId()])->fetch_all();
        $this->load_data("admin/part/userTable", ["rows" => $rows]);
    }
}
