<?php
include("app_config.php");
$t = $_COOKIE['fbsr_'.APPID];

function parse_signed_request($signed_request) {
	list($encoded_sig, $payload) = explode(".", $signed_request, 2);
	
	$sig = base64_url_decode($encoded_sig);
	$data = json_decode( base64_url_decode($payload), true);
	
	return $data;
}

function base64_url_decode($input) {
	return base64_decode(strtr($input, '-_', '+/'));
}

$signed_req_obj = array();
$signed_req_obj = parse_signed_request( $t );

// based on content type return data
//$_SERVER['CONTENT_TYPE']

if (empty($signed_req_obj["user_id"])) {
    $rtn = array();
    $auth_url = "https://www.facebook.com/dialog/oauth?client_id=".APPID."&redirect_uri=".urlencode( BASEURL );
    $auth_url = $auth_url ."&scope=".SCOPE;
    $rtn['ERROR']=true;
    $rtn['m'] = 'Invalid token';
    $rtn['oauth'] = $auth_url;
    die(json_encode($rtn));
}
?>