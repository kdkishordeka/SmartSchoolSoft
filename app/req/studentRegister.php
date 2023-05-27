<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of studentRegister
 *
 * @author Administrator
 */
class studentRegister extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {}
    
    public function saveStudent() {
        $resp = [];
        $resp["SUCCESS"] = 0;
        $resp["MSG"]     = "";   
        
        $arr = filter_input_array(INPUT_POST);
        $arr["school_id"]   = Session::getSchoolId();
        $arr["create_on"]   = time()*1000;
        $arr["create_by"]   = Session::getUserId();
       
        if (!empty($_FILES['photo']['name'])) {
            $image_name = $_FILES['photo']['name'];
            $image_type = $_FILES['photo']['type'];
            $temporary_name = $_FILES['photo']['tmp_name'];
            $image_size = $_FILES['photo']['size'];
            $image_explode = explode(".", $image_name);
            $image_extension = strtolower(end($image_explode));
            $extensions = array("jpeg", "png", "jpg");

            if (in_array($image_extension, $extensions)) {
                if ($image_size <= 2000000) {
                    $new_image_name = time() . '-' . rand() . '.' . $image_extension;
                    move_uploaded_file($temporary_name, "web/images/studentimages/" . $new_image_name);
                    $arr['photo'] = $new_image_name;
                } else {
                    $resp["SUCCESS"] = -1;
                    $resp["MSG"]    = "Student photo size exceeds 2MB";
                }
            } else {
                    $resp["SUCCESS"] = -1;
                    $resp["MSG"]    = "Invalid Student photo File";
            }
        }

        if (!empty($_FILES['sing']['name'])) {
            $image_name = $_FILES['sing']['name'];
            $image_type = $_FILES['sing']['type'];
            $temporary_name = $_FILES['sing']['tmp_name'];
            $image_size = $_FILES['sing']['size'];
            $image_explode = explode(".", $image_name);
            $image_extension = strtolower(end($image_explode));
            $extensions = array("jpeg", "png", "jpg");

            if (in_array($image_extension, $extensions)) {
                if ($image_size <= 2000000) {
                    $new_image_name = time() . '-' . rand() . '.' . $image_extension;
                    move_uploaded_file($temporary_name, "web/images/studentsignature/" . $new_image_name);
                    $arr['sing'] = $new_image_name;
                } else {
                    $resp["SUCCESS"] = -1;
                    $resp["MSG"]    = "Student singature size exceeds 2MB";
                }
            } else {
                $resp["SUCCESS"] = -1;
                $resp["MSG"]    = "Invalid Student singature File";
            }
        }
        
        if ($resp["SUCCESS"] === 0) {
            $db = new Db_Save();
            $row = $db->set_table(TableName::STUDENT)->set_columns($arr)->insert();
            if ($row > 0) {
                $resp["SUCCESS"] = $row;
            }
        }

        echo json_encode($resp);
    }
}
