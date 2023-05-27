<?php

class Dates {

    
    public static function get_today_duration() {
        $first      = strtotime(date('Y-M-d 00:00:01'));
        $last       = strtotime(date('Y-M-d 23:59:59')); 
        return array($first, $last) ;
    }
    
    public static function get_yesterday_duration() {
        $today_first= strtotime(date('Y-M-d 00:00:01'));
        $first     = $today_first - 86400;
        $last      = $today_first -2;
        
        return array($first, $last) ;
    }
    
    public static function get_last_7day_duration() {
        $today_first= strtotime(date('Y-M-d 00:00:01'));
        $first     = time() - ( 86400 * 7 );
        $last      = time();
        
        return array($first, $last) ;
    }
    
    public static function get_this_month_duration() {
        $curMonth = date('F');
        $curYear  = date('Y');
        $timestamp  = strtotime($curMonth.' '.$curYear);
        $first      = strtotime(date('Y-m-01 00:00:00', $timestamp));
        $last       = strtotime(date('Y-m-t 23:59:59', $timestamp));
        return array($first, $last) ;
    }
    
    public static function get_last_month_duration() {
        $curMonth   = date('F');
        $curYear    = date('Y');
        $timestamp  = strtotime($curMonth.' '.$curYear);
        $this_month = strtotime(date('Y-m-01 00:00:01', $timestamp));
        $last       = $this_month - 2;
        
        return array(0, $last) ;
    }
    
    public static function get_first_millis($str_date){
        $fdate      = $str_date . " 00:00:01";
        $start      = strtotime(date($fdate)) * 1000;
        return $start;
    }
    
    public static function get_last_millis($str_date){
        $tdate       = $str_date . " 23:59:59";
        $end        = strtotime(date($tdate)) * 1000;
        return $end;
    }
    
    
    
    public static $one_hr_millis = 3600000;
    public static $one_min_millis = 60000;
    public static $one_day_millis = 86400000;
    public static $seven_day_millis = 604800000;
    public static $thirty_day_millis = 2592000000;

    private static $this_month = [];

}

