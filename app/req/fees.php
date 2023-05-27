<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fees
 *
 * @author Administrator
 */
class fees extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    function saveFess() {
        $arr = filter_input_array(INPUT_POST);
        $fees_name  = $arr["fees_name"];
        $fees_value = $arr["fees_value"];
        $fees_arr   = [];
        $i = 0;
        $t_fees = 0;
        while ($i < count($fees_name)) {
            $fees_arr[] = array(
                'fees_name' => $fees_name[$i],
                'fees_value' => $fees_value[$i]
            );
            $t_fees += $fees_value[$i];
            $i++;
        }
        unset($arr["fees_name"]);
        unset($arr["fees_value"]);
        $arr["details"]     = json_encode($fees_arr);
        $arr["total_fees"]  = $t_fees;
        $arr["total"]       = $t_fees;
        $arr["school_id"]   = Session::getSchoolId();
        $arr["create_by"]   = Session::getUserId();
        $arr["create_on"]   = time()*1000;
        
        $resp = 0;
        $db = new Db_Save();
        $row = $db->set_table(TableName::FEES_MODULE)->set_columns($arr)->insert();
        if($row > 0){
          $resp = $row;  
        }
        echo $resp;
    }
    
    function loadData($param) {
        $db = new Db_Loader();
        $rows = $db->select([" * "], TableName::VIEW_FEES_MADULE)->filter("SCHOOL_ID = ? AND ACTIVE = ?", [Session::getSchoolId(), "Y"])->fetch_all();
        if (count($rows) > 0) {
            $this->load_data('admin/part/feesTable', ["rows" => $rows]);
        }
    }

    function loadClass() {
        if(isset($_POST["type"])){
            $type = $_POST["type"];
            $db = new Db_Loader();
            $rows = $db->select([" * "], TableName::VIEW_FEES_MADULE)->filter("TYPE = ? AND SCHOOL_ID = ?", [$type, Session::getSchoolId()])->fetch_all();
            $html = '<option selected disabled>Select Class</option>';
            if(count($rows)> 0 ){
                foreach ($rows as $row){
                    $arr =["CLASS" => $row["CLASS_ID"], "YEAR" => $row["YEAR_ID"]];
                    $html .='<option value='.json_encode($arr).'>'.$row["START_YEAR"].'-'.$row["END_YEAR"].' '.$row["CLASS_NAME"].' ['.$row["SECTION_NAME"].']'.'</option>';
                }
            }
            echo $html;
        }
        
        if(isset($_POST["class_id"])){
            $data = json_decode($_POST["class_id"], TRUE);
            $db     = new Db_Loader();
            $rows   = $db->select([" * "], TableName::VIEW_STUDENT_STANDARD)
                    ->filter("(SCHOOL_ID = ? AND YEAR_ID = ?) AND (CLASS_ID = ? AND ACTIVE = ?)", [Session::getSchoolId(), $data["YEAR"], $data["CLASS"], "Y"])
                    ->order("ROLL_NO", "ASC")
                    ->fetch_all();
            $html = '<option selected disabled>Select Student</option>';
            if(count($rows)> 0){
                foreach ($rows as $row){
                    $arr = ["STANDARD_ID" => $row["ID"], "STUDENT_ID" => $row["STUDENT_ID"]];
                    $html .= '<option value='.json_encode($arr).'>'.$row["NAME"].' ['.$row["ROLL_NO"].']</option>';
                }
            }
            echo $html;
        }
    }
    
    public function loadFees() {
        $arr = filter_input_array(INPUT_POST);
        $fees_class = json_decode($arr["fees_class"], TRUE);
        
        $db = new Db_Loader();
        $rows = $db->select([" * "], TableName::VIEW_FEES_MADULE)
                ->filter("(YEAR_ID = ? AND SCHOOL_ID = ? ) AND ( CLASS_ID = ? AND TYPE = ? )", [$fees_class["YEAR"], Session::getSchoolId(), $fees_class["CLASS"], $arr["fees_type"]])
                ->fetch_all();
        if(count($rows) > 0){
            $this->load_data("admin/part/feesTableByStudent", ["rows" => $rows]);
        }
    }
    
    public function createFees() {
        $resp = [];
        $resp["SUCCESS"] = 0;
        $arr = filter_input_array(INPUT_POST);
        $student_details = json_decode($arr["fees_student"], TRUE);
        $data = [
            "SCHOOL_ID" => Session::getSchoolId(),
            "STANDARD_ID" => $student_details["STANDARD_ID"],
            "FEES_ID"   => $arr["fees_id"],
            "CREATE_BY" => Session::getUserId(),
            "CREATE_ON" => time()
        ];        
        $db = new Db_Loader();
        $row = $db->select([" * "], TableName::STUDENT_FEES)
                ->filter("(SCHOOL_ID = ? AND STANDARD_ID = ?) AND (FEES_ID = ? AND ACTIVE = ?)", [Session::getSchoolId(), $student_details["STANDARD_ID"], $arr["fees_id"], "Y"])
                ->fetch_row();
        if($row){
            $resp["SUCCESS"] = $row["ID"];
        }else{
          $db1 = new Db_Save();
          $save = $db1->set_table(TableName::STUDENT_FEES)->set_columns($data)->insert();
          if($save > 0){
            $resp["SUCCESS"] = $save;
          }
        }
        echo json_encode($resp);
    }
}
