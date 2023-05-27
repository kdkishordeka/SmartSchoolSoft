<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author Administrator
 */
class account extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {}
    
public function fetchData() {
    if(isset($_POST["load"])){
        $db = new Db_Loader();
        $rows = $db->select([" * "], TableName::ACCOUNT)->where(["SCHOOL_ID"=> Session::getSchoolId()])->fetch_all();
        if(count($rows)>0){
            $this->load_data("admin/part/accountTable", ["rows"=>$rows]);
        }
    }
}

public function saveData() {
    $resp = [];
    $resp["SUCCESS"] = 0;
    $arr = filter_input_array(INPUT_POST);
    $arr["SCHOOL_ID"] = Session::getSchoolId();
    $arr["CREATE_BY"] = Session::getUserId();
    $arr["CREATE_ON"] = time();
    $db = new Db_Save();
    $row = $db->set_table(TableName::ACCOUNT)->set_columns($arr)->insert();
    if($row > 0){
      $resp["SUCCESS"] = $row;
    }
    echo json_encode($resp);
}

public function fetchAccountDetails($type) {
    $resp = [];
    $resp["DATA"]=[];
    $resp["SUCCESS"] = 0;
    $db = new Db_Loader();
    $rows = $db->select(["ID, NAME, TYPE"], TableName::ACCOUNT)->filter("SCHOOL_ID = ? AND ACTIVE = ?", [Session::getSchoolId(), "Y"])->fetch_all();
    if(count($rows) > 0){
        $resp["DATA"]=$rows;
        $resp["SUCCESS"] = count($rows);
    }
    echo json_encode($resp);
 }
}
