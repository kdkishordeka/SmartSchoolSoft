<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of receipt
 *
 * @author KISHOR PC
 */
class receipt extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        
    }
    public function createData() {
        $resp = [];
        $resp["SUCCESS"] = 0;
        $arr = filter_input_array(INPUT_POST);
        $arr["school_id"]   = Session::getSchoolId();
        $arr["longdate"]    = strtotime($arr["longdate"]);
        $arr["create_by"]   = Session::getUserId();
        $arr["create_on"]   = time();
        $student_fees_id    = $arr["student_fees_id"];
        unset($arr["student_fees_id"]);
        
        $db = new Db_Save();
        $save = $db->set_table(TableName::RECEIPT_VOUCHER)->set_columns($arr)->insert();
        if($save > 0){
          $resp["SUCCESS"] = $save;
          $db1 = new Db_Save();
          $up = $db1->set_table(TableName::STUDENT_FEES)->set_columns(["RECEIPT_ID"=> $save])->update(["ID" => $student_fees_id]);
          if($up > 0){
              $resp["SUCCESS"] = $up;
          }
        }
        echo json_encode($resp);
    }
    
    public function fetchData() {
        $db = new Db_Loader();
        $rows = $db->select([" * "], TableName::VIEW_RECEIPT_VOUCHER)->filter("ACTIVE = ? AND SCHOOL_ID = ?", ["Y", Session::getSchoolId()])->fetch_all();
        $this->load_data("admin/part/receiptTable", ["rows" => $rows]);
    }
}
