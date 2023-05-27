<?php
class Session {
    
    public static function init() {
        if(session_status()==PHP_SESSION_NONE){
           session_start();
        }
    }
    
    public static function setSession($key, $valu) {
            $_SESSION[$key] = $valu;
    }
    
    
    public static function getInt($key) {
         $valu = 0;
         if(isset($_SESSION[$key])){
             $valu = $_SESSION[$key];
         }
         return $valu;
    }
    
    public static function getString($key) {
         $valu = "";
         if(isset($_SESSION[$key])){
             $valu = $_SESSION[$key];
         }
         return $valu;
    }
    
    public static function getUsername() {
         $valu = "";
         if(isset($_SESSION[Session::USER_NAME])){
             $valu = $_SESSION[Session::USER_NAME];
         }
         return $valu;
    }
    
    public static function remove($key) {
        unset($_SESSION[$key]);
    }
    
    public static function partner_access() {
        Session::init();
        $access = Session::getString(Session::USER_ACCESS);
        if(empty($access) || strcmp($access, "PARTNER") != 0){
            return FALSE;
        }
        return TRUE;
    }
    
    public static function admin_access() {
        Session::init();
        $access = Session::getString(Session::USER_ACCESS);
        if(empty($access) || strcmp($access, "ADMIN") != 0){
            return FALSE;
        }
        return TRUE;
    }
        
    public static function user_access() {
        Session::init();
        $access = Session::getString(Session::USER_ACCESS);
        if(empty($access) || strcmp($access, "USER") != 0){
            return FALSE;
        }
        return TRUE;
    }
    
    public static function has_login() {
        Session::init();
        $access = Session::getString(Session::USER_ACCESS);
        if(empty($access)){
            return FALSE;
        }
        return TRUE;
    }
    
    public static function getUserId() {
         $valu = 0;
         if(isset($_SESSION[Session::USER_ID])){
             $valu = $_SESSION[Session::USER_ID];
         }
         return $valu;
    }
    
    public static function getSchoolId() {
         $valu = 0;
         if(isset($_SESSION[Session::SCHOOL_ID])){
             $valu = $_SESSION[Session::SCHOOL_ID];
         }
         return $valu;
    }

    public static function isSupport() {
        Session::init();
        $ok  = FALSE;
        $access = Session::getString(Session::USER_TYPE);
        if($access=="SUPPORT"){$ok = TRUE;}
        return $ok;
    }
    
    public static function isSales() {
        Session::init();
        $ok  = FALSE;
        $access = Session::getString(Session::USER_TYPE);
        if($access=="SALES"){$ok = TRUE;}
        return $ok;
    }
    
    public static function redirect(){
        header("Location: ?url=user/login");
    }

    const USER_ID       = "USER_ID";
    const USER_PARENT   = "USER_PARENT";
    const USER_NAME     = "USER_NAME";
    const USER_TYPE     = "USER_TYPE";
    const USER_EMAIL    = "USER_EMAIL";
    const USER_PHONE    = "USER_PHONE";
    const USER_ACCESS   = "USER_ACCESS";
    
    const SCHOOL_ID     = "SCHOOL_ID";
    const SCHOOL_NAME   = "SCHOOL_NAME";

}
