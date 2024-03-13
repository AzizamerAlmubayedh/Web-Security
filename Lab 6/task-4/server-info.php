<?php

$server = array();

$server["Host server name"] = $_SERVER['SERVER_NAME'];
$server["Server Protocol"] = $_SERVER['SERVER_PROTOCOL'];
$server["Host header"] = $_SERVER['HTTP_HOST'].":". $_SERVER['SERVER_PORT'];
$server["Server Software "] = $_SERVER['SERVER_SOFTWARE'];
$server["Document Root "] = $_SERVER['DOCUMENT_ROOT'];
$server["Current page"] = $_SERVER['PHP_SELF'];
$server["Absolute Path"] = $_SERVER['SCRIPT_FILENAME'];
$server["Script Name"] = $_SERVER['SCRIPT_NAME'];

$client = array();

$client["Client IP"] = $_SERVER['REMOTE_ADDR'];
$client["Client port"] = $_SERVER['REMOTE_PORT'];
$client["Client Sys info"] = $_SERVER['HTTP_USER_AGENT'];
$client["Connection"] = $_SERVER['HTTP_CONNECTION'];
$client["Encoding"] = $_SERVER['HTTP_ACCEPT_ENCODING'];
$client["HOST"] = $_SERVER['HTTP_HOST'];




?>