<?php
include_once('app_config.php');
    include_once('db_connection.php');
  
    function getcmt(){
		global $conn;
        $sql = 'Select * from campus_cmt order by 1 desc limit 10';
		$res = $conn->prepare($sql);
		$res->execute();
		return $res;
        //return mysql_query($sql);
    }
	function getcmtforadmin(){
		global $conn;
        $adminsql = 'Select * from campus_cmt order by 1 asc where reply = 1';
		$res = $conn->prepare($adminsql);
		$res->execute();
		return $res;
        //return mysql_query($adminsql);
    }
	function getrandomusers(){
		global $conn;
		$sql = 'Select uid,name from campus_user ORDER BY RAND()';
        $res = $conn->prepare($sql);
		 $res->execute();
		return $res;
		//return mysql_query($sql);
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Are you hooked on to the Campus Centurion Challenge 2014 yet?</title>
	<meta name="description" content="Participate in American Express Campus Centurion challenge and get a chance to win exciting prizes!" />
	<meta name="title" content="Are you hooked on to the Campus Centurion Challenge 2014 yet?" />
<link href="css/tinyscrollbar.css?<?php echo BPC?>" rel="stylesheet" type="text/css"/>
<link href="css/campus.css?<?php echo BPC?>" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
<meta property="og:title" content="Are you hooked on to the Campus Centurion Challenge 2014 yet?"/>
<meta property="og:url" content="https://apps.facebook.com/campuscenturion/"/>
<meta property="og:description" content="Participate in American Express Campus Centurion challenge and get a chance to win exciting prizes!" />
<meta property="og:image" content="https://www.digiqom.com/aexp/campuscenturion/img/icon.png"/>
<meta property="fb:app_id" content="695438390481219"/>
<?php include_once('sc.html');?>
</head>

<body>
<div id="fb-root"></div>
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
			FB.Canvas.setSize({ height: 1455 });
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
<br/>
<!--<div class="rightband">
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
   
	<td colspan="3" align="center"><em>ONLINE CONTEST TO<br>
      CHALLENGE YOUR PROGRAMMING SKILLS</em><br/>
	  <strong>PRIZES TO BE WON</strong> 
	  </td>
    </tr>
  <tr>
    <td width="52%" align="center"><img src="img/ipad.png" width="95" height="112" alt=""><br>
iPAD</td>
   
    <td width="37%" align="center"><img src="img/nexus.png" width="66" height="93" alt=""><br>
      NEXUS 7</td>
  </tr>
  <tr>
    <td colspan="3"  align="center">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="img/add.gif" width="12" height="18" alt="">
	<br/>
	<em>&nbsp;&nbsp;&nbsp;EARLY BIRD PRIZES FOR REGISTRATION</em>
	
	</td>
    
	</tr>
  <tr >
    <td colspan="3" align="center"><a style="display:none" href="http://goo.gl/mUUU8J" target="_blank">
	
		<img style="margin-top:5px" src="img/register.png" width="134" height="37" alt=""/>
	</a>
	</td>
    </tr>
</table>

</div>-->



    
<div class="topband">
<img src="img/top_band.png" width="800" height="95" alt="">
</div>
<span class="cls_hackrace cls_schedule" ><a href="http://goo.gl/JcX1L0" target="_blank"><span class="midbanner cls_banner" style="display:block"></span></a></span>
<!--<a class="cls_analyze cls_schedule" href="http://www.axpindiacampus.com/AnalyzeThis/" target="_blank"></a>-->
<span class="midbanner1  cls_analyze cls_schedule" style="display:none"></span>
<div class="cls_quiz" style="display:none">
<a href="http://goo.gl/JcX1L0" target="_blank">
<div class="midbanner2" style="border:none"></div></a>
</div>

<div class="bluebase tab1 cls_tbbg">


<div class="analze cls_tab tab2 " data-tab="tab2" data-removetab="tab1" data-schedule="cls_analyze" 
data-comment="cls_analyze_comment" data-removebanner="midbanner" data-banner="midbanner1">
<div class="bluearrow"><img src="img/bluearrow1.png" width="60" height="20" alt=""></div>
<img src="img/logo.gif" width="325" height="85" alt=""><strong>Analyze This</strong>16th August 2014 to 24th August 2014
</div>
<div class="hackrace cls_tab tab1 selected" data-tab="tab1" data-removetab="tab2" data-comment="cls_hack_comment" data-schedule="cls_hackrace" data-banner="midbanner" data-removebanner="midbanner1">
<div class="bluearrow"><img src="img/bluearrow.png" width="60" height="20" alt=""></div>
<img src="img/Challenge.jpg" style="margin-left:0px" height="84" alt=""><strong>Challenge 2014</strong> 
17th September to 27th September 2014</div>

<div style="clear:both"></div>

<div class="event cls_hackrace cls_schedule" ><strong>Launch Video</strong>
<div class="video">

<!--<iframe width="211" height="175" src="//www.youtube.com/embed/dFIHn87afSs?rel=0" frameborder="0" allowfullscreen></iframe>-->
<!--<iframe src="//player.vimeo.com/video/101492892" width="211" height="175" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
<iframe src="//player.vimeo.com/video/105302032"  width="211" height="175" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

</div>


</div>

<div class="event cls_analyze cls_schedule" style="display:none"><strong>LAUNCH VIDEO</strong>
<div class="video">

<!--<iframe width="211" height="175" src="//www.youtube.com/embed/dFIHn87afSs?rel=0" frameborder="0" allowfullscreen></iframe>-->
<!--<iframe src="//player.vimeo.com/video/101492892" width="211" height="175" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
<iframe src="//player.vimeo.com/video/102298780"  width="211" height="175" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

</div>


</div>


<div class="event border"><strong>Event Schedule</strong>
<ul class="calender cls_hackrace cls_schedule" >


<li><span><em>sep</em> <strong>17 </strong>Wed</span>
 Qualifier 1
</li>
<li><span><em>sep</em> <strong>18 </strong>Wed</span>
 Qualifier 2
</li>
<li><span><em>sep</em> <strong>20 </strong>Wed</span>
 Qualifier 3
</li>

</ul>
<ul class="calender cls_analyze cls_schedule" style="display:none">
<li><span><em>aug</em> <strong>6 </strong>Mon</span>Registrations begin
</li>
<li><span><em>aug</em> <strong>10 </strong>Mon</span>
Quiz of the day
</li>
<li><span><em>aug</em> <strong>16</strong>Sat</span>
Analyze This begins
</li>

</ul>


</div><div class="event"><strong>Latest Announcements</strong>
<ul class="calender cls_hackrace cls_schedule" >
<li>Congratulations to Overall Winners of Daily Quiz – Team Blitzkrieg – Pratyasha Burman Ray, Amit Singha, Ved Prakash, from IIM Kozhikode! Each member of the winning team for the quizzes receives exciting prizes.</li>
<li>Congratulations to Winners of Quiz 5 – Team Horn Ok Please – Sujay Deo, Arjit Sharma, Himanshu Singh, from IIM Calcutta! Each member of the winning team for the quizzes receives American Express Gift Cards.</li>




</ul>
<ul class="calender cls_analyze cls_schedule" style="display:none">
<li>Congratulations to all the winners!<br/>
<b>Overall Winners</b><br/>
Position 1: Team OathKeeper (IIT Kanpur)<br/>
Position 2: Team ChemIITM (IIT Madras)<br/>
Position 3: Team DeepViolet (IIT Delhi)<br/>
<b>Campus Winners</b><br/>
Team OathKeeper (IIT Kanpur)<br/>
Team ChemIITM (IIT Madras)<br/>
Team DeepViolet (IIT Delhi)<br/>
Team Dreamers (IIT Kharagpur)<br/>
Team Armada (IIT Guwahati)<br/>
Team Chronicles (IIT Roorkee)</li>
<!--<li>Many Congratulations to Team AnalystINC (IIT Guwahati) and Team Bumble (IIT Kanpur) for winning Quiz2!</li>-->

</ul>

</div>

<div class="clear"></div>
<div class="friends" style="min-height:270px">
<!--<div class="fb-facepile" style="padding:0px;" data-app-id="695438390481219" data-href="https://www.facebook.com/AmericanExpressIndia/app_695438390481219" data-width="249px" data-max-rows="4" data-colorscheme="light" data-size="large" data-show-count="false"></div>-->

<?php if ($session){ ?>
<strong>
PEOPLE WHO ARE HERE</strong><br>
<div id="scrollbar10">
                <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                <div class="viewport">
                    <div class="overview">
                    <div class="viewcom">  
<ul id="appuser">
<?php 
							
		$q=getrandomusers();
		while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
?>
	<li><img src="https://graph.facebook.com/<?php echo $r['uid']?>/picture" width="50" height="50" title="<?php echo $r['name']?>" alt="<?php echo $r['name']?>" /></li>
<?php } ?>
</div></div></div></div>
<br/><br/>
	<div class="fb-like" data-href="https://apps.facebook.com/campuscenturion/" data-layout="standard" data-width="240px" data-action="like" data-show-faces="false" data-share="true" data-show-count="false"></div>   
  
  
<?php } else { ?>
<img src="img/silhouette.png" alt="" style="margin-left:27px" />
<br/>
<a class="btn" target="_top" style="margin-left:27px" href="<?php echo $LOGINURL;?>">Click to see people who are here</a>
<br/>
<!--<strong style="margin-left:27px;">Click to see who are here</strong>-->
  

<?php }  ?>



</div>
<div class="comments"><strong>LEAVE YOUR COMMENTS HERE</strong>

<div id="fb-comments" class="cls_hack_comment cls_comment" >
<div class="fb-comments" data-href="https://apps.facebook.com/campuscenturion/#beat" data-width="478" data-numposts="5" data-colorscheme="light"></div>
</div>

<div id="fb-comments" class="cls_analyze_comment cls_comment" style="display:none">
<div class="fb-comments" data-href="https://apps.facebook.com/campuscenturion/#analyze" data-width="478" data-numposts="5" data-colorscheme="light"></div>
</div>


			<div style="clear:both"></div>
<em>  Have a query or want to cheer your favourite participants?<br/> 
Share your thoughts, and build the excitement.
</em></div>
</div>

<div class="foot">

<em class="cls_schedule cls_hackrace" >
Open to 2nd year students of the flagship post-graduate program at<br/>IIM Ahmedabad, IIM Calcutta, IIM Lucknow, IIM Indore, IIM Kozhikode, MDI, XLRI, <br/>IIM Shillong and IIM Kashipur <br/>

</em>


<em class="cls_schedule cls_analyze" style="display:none"> Students from following courses are eligible to participate: -<br/>
1) B.Tech students (All Streams) - 4th Year <br/>
2) Dual/Integrated course Students (All Streams) - 5th year<br/>
3) This contest is not open to M.Tech students.<br/>
</em>
<a href="http://goo.gl/mUUU8J" target="_blank" style="display:none">
	<img width="239" height="93" style="float:right; margin-top:-30px;" alt="" src="img/reg.png">
</a>
<a href="http://www.axpindiacampus.com/AnalyzeThis/" target="_blank" class="cls_schedule cls_analyze" style="display:none">
	<img width="239" height="93" style="float:right; margin-top:-30px;" alt="" src="img/reg.png">
</a>
<br/>
<div style="width:100%;text-align:center;margin-top:5px;float:left">
<a target="_blank" style="color:#fff;" href="terms.html">Terms & Conditions</a>
</div>

<br/>
</div>
<div style="position:absolute;top:3px;left:0px">
	<div class="fb-like" data-href="https://apps.facebook.com/campuscenturion/" data-layout="standard" data-action="like" data-show-faces="false" data-share="true" data-show-count="false"></div> 
</div>
<br/>


	
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/main.js?<?php echo BPC?>"></script>
	<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
	<script type="text/javascript" >
	$('#scrollbar10').tinyscrollbar();
	</script>
	
	
</body>
</html>
