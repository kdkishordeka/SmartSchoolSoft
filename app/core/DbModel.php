<?php

class DbModel extends Db_Save {

    public function __construct() {
        parent::__construct();
    }
    
    public function set_table($table_name) {
        parent::set_table($table_name);
    }
    
    public function insert() {
        $columns = [];
        $input = filter_input_array(INPUT_POST);
        foreach ($input as $key => $value){
            
        }
        parent::set_columns($columns);
        parent::insert();
    }
    
    
    
}

