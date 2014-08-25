<?php include('app_config.php');
require('src/facebook.php');

function postonwall(){
	$rtn=array();	
	try{
		$rtn['res']=true;
		$facebook ->api('/'.$_REQUEST["postid"].'/comments',  'post', 
		array(
		  'access_token' => $facebook->getAccessToken(),
		  'message' => $_REQUEST["msg"],
		)
		$sql = "update campus_cmt(reply) VALUES(1) where cmd_id='".$_REQUEST["postid"]."'";
		$r = mysql_query($sql);
	}catch (Exception $e) {	
			$rtn['error']=$e;
			$rtn['res']=false;
	}
	header('Content-Type:application/json');
	echo json_encode($rtn);
);

}
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
postonwall();
}

?>

