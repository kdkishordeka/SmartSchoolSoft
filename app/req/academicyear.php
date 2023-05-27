<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of academicyear
 *
 * @author Administrator
 */
class academicyear extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {}
    
    public function saveData() {
        $arr = filter_input_array(INPUT_POST);
        $arr["school_id"] = Session::getSchoolId();
        $arr["create_on"] = time()*1000;
        $arr["create_by"] = Session::getUserId();
        $arr["is_active"] = "Y";
        
        $resp = [];
        $resp["SUCCESS"] = 0;
        
        $db     = new Db_Save();
        $rows   = $db->set_table(TableName::ACADEMIC_YEAR)->set_columns($arr)->insert();
        if($rows > 0){
            $resp["SUCCESS"] = $rows;
        }
        echo json_encode($resp);
    }
    
    public function loadData($param) {
        $db = new Db_Loader();
        $rows = $db->select([" * "], TableName::ACADEMIC_YEAR)->where(["SCHOOL_ID"=> Session::getSchoolId()])->fetch_all();
        if(count($rows)>0){
            $this->load_data("admin/part/academicYearTable", ["rows"=>$rows]);
        }
    }
}
