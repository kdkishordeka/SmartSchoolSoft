<?php
class admission extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {}
    
    public function saveData() {
        $resp = [];
        $resp["SUCCESS"] = 0;
        $resp["DATA"] = [];
        
        $arr = filter_input_array(INPUT_POST);
        $db = new Db_Loader();
        $section = $db->select(["SECTION_ID"], TableName::CLASS_DETAILS)->where(["ID"=>$arr["class_id"]])->fetch_row();
        $arr["section_id"] = $section["SECTION_ID"];
        $arr["create_on"] = time()*1000;
        $arr["create_by"] = Session::getUserId();
        $arr["school_id"] = Session::getSchoolId();
        
        $db1 = new Db_Loader();
        $record = $db1->select([" * "], TableName::STUDENT_STANDARD)
                ->filter("SCHOOL_ID = ? AND YEAR_ID = ? AND CLASS_ID = ? AND STUDENT_ID = ? AND ACTIVE = ?", [Session::getSchoolId(), $arr["year_id"], $arr["class_id"], $arr["student_id"], "Y"])
                ->fetch_row();
        if($record){
           $resp["SUCCESS"] = -1;
           $resp["DATA"] = $record;
        }  else {
            $save = new Db_Save();
            $row = $save->set_table(TableName::STUDENT_STANDARD)->set_columns($arr)->insert();
            if($row > 0){
               $resp["SUCCESS"] = $row; 
            }
        }
        
        echo json_encode($resp);
    }
    
    public function feesLoader($standard_id) {
      $db = new Db_Loader();
      $standard = $db->select([" * "], TableName::VIEW_STUDENT_STANDARD)->where(["ID"=>$standard_id])->fetch_row();
      $db1 = new Db_Loader();
      $fees = $db1->select([" * "], TableName::VIEW_FEES_MADULE)
              ->filter("SCHOOL_ID = ? AND ( YEAR_ID = ? AND CLASS_ID = ? ) AND ( ACTIVE = ? AND TYPE = ? )", [Session::getSchoolId(), $standard["YEAR_ID"], $standard["CLASS_ID"], "Y", "admission"])
              ->fetch_row();
      if($fees){
          $this->load_data("admin/part/admissionFeesCard", ["standard"=>$standard, "fees"=>$fees]);
      }else{
          echo 0;
      }      
    }
    
    public function fetchStudentStandard($peram) {
        $db = new Db_Loader();
        $rows = $db->select([" * "], TableName::VIEW_STUDENT_STANDARD)->where(["SCHOOL_ID" => Session::getSchoolId()])->fetch_all();
        if(count($rows) > 0){
            $this->load_data("admin/part/studentStandardTable", ["rows" => $rows]);
        }
    }
}
