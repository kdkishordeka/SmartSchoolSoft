<?php
$path = $_SERVER["DOCUMENT_ROOT"];
$link = "https://smartschoolsoft.colloge/";
define("base_path", $path);
define("view_path", $path. "/app/views/");
define("web_path", $link."web/");


//PHP SETING
ini_set("upload_max_filesize ", "250M");
ini_set("post_max_size ", "256M");
ini_set("memory_limit ", "256M");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


//DATABASE
define("DB_NAME", "smartschoolsoft");
define("DB_HOST", "localhost");
define("DB_USER", "smartschoolsoft");
define("DB_PASS", "#Assam2021");
date_default_timezone_set('Asia/Kolkata');
error_reporting(E_ALL);