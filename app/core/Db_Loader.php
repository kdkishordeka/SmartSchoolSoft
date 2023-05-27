<?php

class Db_Loader extends PDO{

    function __construct() {
        parent::__construct("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS, []);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    
    
    
    private $table          = "";
    private $where_column   = array();
    private $where_values   = array();
    private $query          = "";

    
    public function select($column, $table) {
        $this->table = $table;
        $this->query = "SELECT " . implode(", ", $column) . " FROM " .$table ." ";
        return $this;
    }
    
    
    public function count($column, $table){
        $total = 0;
        $this->table = $table;
        $this->query = "SELECT COUNT( ". $column ." ) AS TOTAL FROM " .$table ." ";
        return $this;
    }
    
    
    public function sum($column, $table){
        $total = 0;
        $this->table = $table;
        $this->query = "SELECT SUM( ". $column ." ) AS TOTAL FROM " .$table ." ";
        return $this;
    }
    
    
    public function where($w) {
        if(count($w)> 0 ){
              foreach($w as $key => $val){
                  array_push($this->where_column, $key);
                  array_push($this->where_values, $val);
        }
         $this->query = $this->query . " WHERE ". implode("= ? AND ", $this->where_column) . "= ? ";
        }
        return $this;
    }
    
   
    public function filter($query_part, $values) {
        if(count($values)> 0 ){
              foreach($values as $val){
                  array_push($this->where_values, $val);
              }
         $this->query = $this->query . " WHERE ". $query_part;
        }
        return $this;
    }
   
    
    public function limit($limit) {
         $this->query = $this->query . " LIMIT ". $limit ." ";
         return $this;
    }
    
    public function offset($offset) {
         $this->query = $this->query . " OFFSET ". $offset ." ";
         return $this;
    }
        
    public function order($column, $order_type) {
         $this->query = $this->query . " ORDER BY ". $column ." " . $order_type;
         return $this;
    }
    
    public function group_by($columns) {
         $this->query = $this->query . " GROUP BY ". $columns;
         return $this;
    }
    
    
    public function inner_join($table_1, $column_1, $column_2 ) {
         $this->query = $this->query . " INNER JOIN ". $table_1 ." ON " . $column_1 . " = " . $column_2;
         return $this;
    }
    
    
    public function fetch_row_by_id($table, $id) {
        return $this->select([" * "], $table)->where(["ID" => $id])->fetch_row();
    }
    
    public function fetch_row_by_param($table, $param) {
        return $this->select([" * "], $table)->where($param)->fetch_row();
    }
    
    public function fetch_all_by_param($table, $param) {
        return $this->select([" * "], $table)->where($param)->fetch_all();
    }
    
    public function fetch_all() {
       // echo $this->query;
        $row = null;
            try{
                $stmt = $this->prepare($this->query);
                
                if(count($this->where_values)>0){
                    $stmt->execute($this->where_values);
                }
                else{
                    $stmt->execute();
                }
                
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $ex){echo $ex->getMessage();}
        return $row;
    }
        
    public function fetch_row() {
        // echo $this->query;
        $row = null;
            try{
                $stmt = $this->prepare($this->query);
                if(count($this->where_values)>0){
                    $stmt->execute($this->where_values);
                }
                else{
                    $stmt->execute();
                }
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            catch(PDOException $ex){echo $ex->getMessage();}
        return $row;
    }
        
    public function fetch_model($model_name) {
        $row = null;
            try{
                $stmt = $this->prepare($this->query);
                if(count($this->where_values)>0){
                    $stmt->execute($this->where_values);
                }
                else{
                    $stmt->execute();
                }
                $stmt->setFetchMode(PDO::FETCH_CLASS, $model_name);
                $row = $stmt->fetch();
            }
            catch(PDOException $ex){echo $ex->getMessage();}
        return $row;
    }
    

    
    public function setQuery($query){
        $this->query = $query;
        return $this;
    }
    
    

}