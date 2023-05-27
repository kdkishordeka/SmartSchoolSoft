<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subject
 *
 * @author Administrator
 */
class subject extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {}
    
    public function add() {
        $resp = [];
        $resp["SUCCESS"] = 0;

        $arr = filter_input_array(INPUT_POST);
        $arr["school_id"] = Session::getSchoolId();
        $arr["create_by"] = Session::getUserId();
        $arr["create_on"] = time() * 1000;
        $arr["active"] = 'Y';

        $db = new Db_Save();
        $row = $db->set_table(TableName::SUBJECT_DETAILS)->set_columns($arr)->insert();
        if ($row > 0) {
            $resp["SUCCESS"] = $row;
        }
        echo json_encode($resp);
    }
    
    public function loadSubject($param) {
       $db     = new Db_Loader();
       $rows    = $db->select([" * "], TableName::VIEW_SUBJECT)->where(["SCHOOL_ID" => Session::getSchoolId()])->fetch_all();
       if(count($rows) > 0){
           $this->load_data("dashboard/part/table/subjectTable", ["rows" => $rows]);
       }
    }
}
