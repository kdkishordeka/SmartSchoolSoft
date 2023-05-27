<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of section
 *
 * @author KDKishorDeka
 */
class section extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {}
    
    public function loadData($param) {
        if ($param == "all") {
            $db = new Db_Loader();
            $rows = $db->select([" * "], TableName::SECTION_DETAILS)->where(["SCHOOL_ID" => Session::getSchoolId()])->fetch_all();
            if (count($rows) > 0) {
                $this->load_data("admin/part/sectionTable", ["rows" => $rows]);
            }
            return;
        }
        if ($param == "select"){
            $resp =[];
            $resp["SUCCESS"] = 0;
            $db = new Db_Loader();
            $rows =$db->select([" * "], TableName::SECTION_DETAILS)->filter("SCHOOL_ID = ? AND ACTIVE = ?", [Session::getSchoolId(), "Y"])->fetch_all();
            if(count($rows) > 0){
                $resp["SUCCESS"] = count($rows);
                $resp["DATA"] = $rows;
            }
            echo json_encode($resp);
        }
        
    }
    
    public function insertData() {
        $resp = [];
        $resp["SUCCESS"] = 0;
        $arr  = [];
        $arr["school_id"]       = Session::getSchoolId();
        $arr["section_name"]    = filter_input(INPUT_POST, "section_name");
        $arr["active"]          = "Y";
        $db = new Db_Save();
        $row = $db->set_table(TableName::SECTION_DETAILS)->set_columns($arr)->insert();
        if($row > 0){
            $resp["SUCCESS"] = $row;
        }
        echo json_encode($resp);
    }
}
