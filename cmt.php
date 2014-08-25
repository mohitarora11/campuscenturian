<?php
	//include_once('app_config.php');
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  //require_once('src/facebook.php');

  /*$config = array(
    'appId' => 'APPID',
    'secret' => '395ef7c8f960fc14f5708bcbbc90acd9',
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
*/
include_once('db_connection.php');
function putdb(){
    //include_once("middleware.php");
	global $conn;
    $rtn = array();
    $rtn['STATUS'] = false;
    $rtn['debug'] = array();
    
    $sql = "INSERT INTO campus_cmt(cmt_id,cmt)VALUES('".$_POST['i']."','".$_POST['c']."')";
    //$rtn['debug'][]= $sql;
    //$r = mysql_query($sql);
	$res = $conn->prepare($sql);
	$res->execute();
    if($res){
        $rtn['STATUS'] = true;
    }
    
    return json_encode($rtn);
}
echo putdb();
?>