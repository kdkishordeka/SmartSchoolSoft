<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of schoolClass
 *
 * @author KDKishorDeka
 */
class schoolClass extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
    }
    
    public function loadData($param) {
        $db = new Db_Loader();
        $rows = $db->select([" * "], TableName::VIEW_CLASS_DETAILS)->where(["SCHOOL_ID" => Session::getSchoolId()])->fetch_all();
        if(count($rows) > 0){
            $this->load_data("admin/part/standardTable", ["rows" => $rows]); 
        }
    }
    
    public function insertData() {
        $resp                   = [];
        $resp["SUCCESS"]        = 0;
        $columns                = [];
        $columns["school_id"]   = Session::getSchoolId();
        $columns["class_name"]  = filter_input(INPUT_POST, "class_name");
        $columns["section_id"]  = filter_input(INPUT_POST, "section_id");
        $columns["create_by"]   = Session::getUserId();
        $columns["create_on"]   = time()*1000;
        $columns["active"]      = "Y";
        
        
        $db     = new Db_Save();
        $row    = $db->set_table(TableName::CLASS_DETAILS)->set_columns($columns)->insert();
        if($row > 0){
            $resp["SUCCESS"]    = $row;
        }
        echo json_encode($resp);
    }
    
    public function loadAll($param) {
        $resp               = [];
        $resp["SUCCESS"]    = 0;
        $db     = new Db_Loader();
        $rows   = $db   ->select([" * "], TableName::VIEW_CLASS_DETAILS)
                        ->filter("SCHOOL_ID = ? AND ACTIVE = ?", [Session::getSchoolId(), "Y"])
                        ->fetch_all();
        if(count($rows) > 0){
            $resp["SUCCESS"]    = count($rows);
            $resp["DATA"]       = $rows;
        }
        echo json_encode($resp);
    }
}
