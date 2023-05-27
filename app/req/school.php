<?php

class school extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
    }
    
    public function register() {
        $resp["SUCCESS"] = 0;
        $arr = filter_input_array(INPUT_POST);
        $arr["valid_till"]  = time()*1000+ Dates::$thirty_day_millis;
        $arr["active"]      = "Y";
        $arr["register_on"] = time()*1000;
        $arr["create_by"]   = Session::getUserId();
        $arr["create_on"]   = time()*1000;
        
        $db     = new Db_Save();
        $row    = $db->set_table(TableName::SCHOOL_DETAILS)->set_columns($arr)->insert();
        
        if($row > 0){
            $db1 = new Db_Save();
            $res = $db1->set_table(TableName::SOFT_USER)->set_columns(["USER_ID"=> Session::getUserId(), "SCHOOL_ID"=>$row])->insert();
            if($res > 0){
                $resp["SUCCESS"] = $res;
            }
        }
        echo json_encode($resp);
    }
    
    public function updateSchool() {
        $resp = [];
        $resp["SUCCESS"] = 0;
        $arr = filter_input_array(INPUT_POST);
        $arr["modify_by"] = Session::getUserId();
        $arr["modify_on"] = time()*1000;
        $db = new Db_Save();
        $row = $db->set_table(TableName::SCHOOL_DETAILS)->set_columns($arr)->update(["ID"=> Session::getSchoolId()]);
        if($row > 0){
            $resp["SUCCESS"] = $row;
        }
        echo json_encode($resp);
    }
    
    public function loaddata($resp){
        $resp = [];
        $resp["SUCCESS"] = 0;
        $db = new Db_Loader();
        $row = $db->select([" * "], TableName::SCHOOL_DETAILS)->where(["ID" => Session::getSchoolId()])->fetch_row();
        if($row){
            $resp = $row;
            $resp["SUCCESS"] = $row["ID"];
        }
        echo json_encode($resp);
    }
}