<?php
include_once('db_connection.php');
function putUSERdb(){
	global $conn;
    //include_once("middleware.php");
    $rtn = array();
    $rtn['STATUS'] = false;
    $rtn['debug'] = array();
    
    $sql = "SELECT uid FROM campus_user WHERE uid LIKE '".$_SESSION["userid"]."'";
	//$sql = "SELECT uid FROM campus_user WHERE uid LIKE '".$_POST['uid']."'";
    //$rtn['debug'][]= $sql;
    
	$res = $conn->prepare($sql);
	$res->execute();
	$count = $res->rowCount();
	//$res = mysql_query($sql);
    if($count < 1){
        $sql = "INSERT INTO campus_user(uid,email,name,iwhen,dt) VALUES ('".$_SESSION["userid"]."', '".$_SESSION["useremail"]."','".$_SESSION["username"]."', UNIX_TIMESTAMP(), current_timestamp() );";
        //$sql = "INSERT INTO campus_user(uid,email,name,iwhen) VALUES ('".$_POST['uid']."', '".$_POST['email']."','".$_POST['name']."', UNIX_TIMESTAMP() );";
		//$rtn['debug'][] = $sql;
        $r = $conn->prepare($sql);
		$r->execute();
		//$r = mysql_query($sql);
        if($r){
            $rtn['STATUS'] = true;
            $rtn['MSG'] = "User created";
        }
    }else{
        $rtn['STATUS'] = true;
        $rtn['MSG'] = "User already exist";
    }
    //$rtn['debug'][]= $_REQUEST;
    //return json_encode($rtn);
}
echo putUSERdb();
?>