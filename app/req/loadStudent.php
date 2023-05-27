<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loadStudent
 *
 * @author Administrator
 */
class loadStudent extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {}
    
    public function loadData($type) {
        $db = new Db_Loader();
        if($type=="all"){
            $rows = $db->select([" * "], TableName::STUDENT)->where(["SCHOOL_ID"=> Session::getSchoolId()])->fetch_all();
            if(count($rows) > 0){
                $this->load_data('admin/part/studentTable', ["rows"=>$rows]);
            }else{
                echo '<tr><th colspan="7" class="text-center">No Data Found</th></tr>';
            }
        }
    }

}
