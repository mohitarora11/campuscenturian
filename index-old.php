<?php
    include('app_config.php');
    include_once('db_conn.php');
    require('src/facebook.php');
    $facebook = new Facebook(array(
        'appId'  => APPID,
        'secret' => APPSECRET,
    ));
    $signed_request = $facebook->getSignedRequest();
    $user = $facebook->getUser();
    if ($user) {
        try {
            // Proceed knowing you have a logged in user who's authenticated.
            $user_profile = $facebook->api('/me');
        } catch (FacebookApiException $e) {    
            $user = null;
        }
    }
?>
<?php 
    function getcmt(){
        $sql = 'Select * from campus_cmt order by 1 desc limit 10';
        return mysql_query($sql);
    }
	function getcmtforadmin(){
        $adminsql = 'Select * from campus_cmt order by 1 asc where reply = 1';
        return mysql_query($adminsql);
    }
	function getrandomusers(){
		$sql = 'Select uid,name from campus_user ORDER BY RAND() limit 12';
        return mysql_query($sql);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Campus Centurion</title>
    <link href="css/tinyscrollbar.css" rel="stylesheet" type="text/css"/>
    <link href="css/home.css?<?php echo BPC?>" rel="stylesheet" type="text/css"/>
    <?php include_once('sc.html');?>
</head>
<body>
<?php
    if($signed_request['page']['id']){
        if($signed_request['page']['liked']){
            echo '<div id="opaque" class="disable"></div>';
        }else{
            echo '<div style="font:normal 14px arial;color:red">Click on the \'Like\' button to participate</div><div id="opaque"></div><br/>';
        }
    }else{
    }
?>
    <div id="fb-root"></div>
    <div class="topmain">
        <h1>Be the winner and get a chance to land a job* with American Express India. Winners also take home <strong>iPads, Samsung Smartphones and Amazon Kindles.</strong></h1>
    </div>
    <div class="midsection">
        <div class="leftcolumn">
            <div class="comments">
                <h2>Leave your comment(s) here:</h2>
                Have a query or want to cheer your favourite participants? Share your thoughts, and build the excitement.
                <form action="javascript:void(0);" onsubmit="frmonsuibmit(this)">
                    <textarea name="txt_cmt" cols="39" rows="3" id="id_cmt"></textarea>
                    <input type="button" value="Submit and Share" onclick="savacmt();"/>
                    <span style="color: red;display: none;" id="id_error">Comment please.</span>
                    <span style="display: none;" id="id_cmt_process">
                        <img src="img/loader.gif" alt="..." /> sending comment ... 
                    </span>
                </form>
            </div>
			<div id="scrollbar1">
                <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                <div class="viewport">
                    <div class="overview">
                    <div class="viewcom">
                    <ul>
                        <?php 
                            $q=getcmt();
                            while ($r = mysql_fetch_array($q)) {
                                $pieces = explode("_", $r["cmt_id"]);
                                $context = stream_context_create(array(
                                    'http' => array(
                                        'ignore_errors'=>true,
                                        'method'=>'GET'
                                        // for more options check http://www.php.net/manual/en/context.http.php
                                        )
                                ));
                                echo '<li><strong>'.json_decode(file_get_contents('http://graph.facebook.com/'.$pieces[0],false,$context))->name.'</strong>'.$r["cmt"].'</li>';
                            }
                        ?>
                </ul>
            </div>
			</div></div></div>
            <div class="friends" style="margin: 0px;">
				<h2 id="title_friends_with_app">Your Friends Who are Here </h2>
					<div class="fb-facepile" style="padding:10px 0px 5px 15px" data-app-id="695438390481219" data-href="https://www.facebook.com/AmericanExpressIndia/app_695438390481219" data-width="310px" data-max-rows="2" data-colorscheme="light" data-size="large" data-show-count="false"></div>
				<!--<img src="img/friends.jpg" width="341" height="238" alt=""/>-->
				<div style="clear: both;"></div><br/>
			</div>
        </div>
        <div class="rightcolumn">
            <div class="video">
                <iframe src="//player.vimeo.com/video/78732221"  width="308" height="195" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<!--<img src="img/video.jpg" width="308" height="195" alt=""/>-->
            </div>
            <div class="registration" style="margin:3px 0 30px">
                <p>
                    What is Campus Centurion, and where it can take you? Watch this video of the creators and participants of the <em>Campus Centurion 2012</em>
                </p>
                <strong ><a href="http://india.axpcampus.com/" style="color:#fff;text-decoration:none;outline:none" target="_blank">Register Now</a></strong>
            </div>
            <div class="latest">
                <h2>Latest Announcements</h2>
				<div id="scrollbar10">
                        <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                        <div class="viewport">
                            <div class="overview">
                <div class="viewcom">
                    <ul>
                        <li>Stay tuned for the American Express Campus Centurion Challenge 2013.</li>
                        <li>Do you have it in you to be the Campus Centurion? Visit <a href="http://india.axpcampus.com" target="_blank">http://india.axpcampus.com</a>.</li>
                        <li>Calling all daredevil MBA students who think they have it in them to be the next Campus Centurion.</li>
                    </ul>
                    <!--<div class="scrollbar" style="height:200px;">
                        <span></span>
                    </div>-->
                </div>
				</div></div></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="base">
            <em style="color:#ff8a00;font: bold 13px 'Century Gothic';font-style: italic;">Participation open for second year students of 2-year PG Program from IIM Ahmedabad, IIM Bangalore, IIM Calcutta, IIM Indore, IIM Kozhikode, IIM Lucknow, XLRI and MDI Gurgaon only.</em>
            <br/><br/>
            * Get an opportunity of PPI at American Express India
			<br/><br/>
			Disclaimer: Offer for PPI doesn't guarantee a job at American Express
        </div>
		
		<?php if ($user): ?>
			<?php if ($user['id'] == '881355547'): ?>
				<ul>
                <?php 
					$q1=getcmtforadmin();
                    while ($r = mysql_fetch_array($q1)) {
                        echo '<li id="'.$r["cmt_id"].'">'.$r["cmt"].'</li>';
					}
				?>
                </ul>
			<?php endif ?>
		<?php endif ?>
    </div>
    <div class="footer">&copy;  2013 American Express Company. All rights reserved.</div>
	<script>
        window.app_scope = {};
        function debug(t){
            try{console.log(arguments);}catch(e){}
        }
        window.fbAsyncInit = function(){
            FB.init({
              appId      : '<?php echo APPID;?>', // App ID
              channelUrl : '<?php echo BASEURL;?>channel.html', // Channel File
              status     : true, // check login status
              cookie     : true, // enable cookies to allow the server to access the session
              xfbml      : true  // parse XFBML
            });
            
            // run once with current status and whenever the status changes
            FB.getLoginStatus(function(r){
                if(r.status == 'not_authorized'){
                    window.oauth = false;
                }else if(r.status == "connected"){
                    window.oauth = true;
                    fetchFBappUsers(renderFriendsWithApp);
                }
            });
            //FB.Canvas.setAutoGrow();
			FB.Canvas.setSize({ height: 1220 });
			/*FB.Canvas.setDoneLoading( function(response) {
				FB.Canvas.setAutoGrow();
			});*/
        };
        
        // FB all.js
        (function(){
          var e = document.createElement('script'); e.async = true;
          e.src = document.location.protocol 
            + '//connect.facebook.net/en_US/all.js';
          document.getElementById('fb-root').appendChild(e);
        }());
    </script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
	<script type="text/javascript">
        $('#scrollbar1').tinyscrollbar();
		$('#scrollbar10').tinyscrollbar();
	</script>
</body>
</html>