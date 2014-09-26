var frmonsuibmit = function(o){
	return false;
}
var st = setTimeout(changebanner,5500);

var savacmt = function(){
	var o = {};
	o.id_error = document.getElementById("id_error");
	o.v = document.getElementById('id_cmt').value;
	try{o.v = o.v.trim();}catch(e){}
	if(o.v != ''){
		o.id_error.style.display="none";
		if(!window.oauth){
			FB.login(function(r){
				//sendcmt(o.v);
				fetchFBuserInfo(function(){ senduserinfo(); sendcmt(o.v); });
			},{scope: SC.SCOPE});
		}else{
			//sendcmt(o.v);
			fetchFBuserInfo(function(){ senduserinfo(); sendcmt(o.v); });
		}
	}else{
		o.id_error.style.display="block";
	}
}

var senduserinfo = function(){
	$.ajax({
		type: "POST",
		url: "userinfo.php",
		data: window.userInfo
	}).done(function( r ) {
		debug(r, arguments);
	});
}


var reply = function(){
	$.ajax({
		type: "POST",
		url: "reply.php",
		data: {'postid':'','msg':''}
	}).done(function( r ) {
		debug(r, arguments);
	});
}


var sendcmt = function(cmt){
	var msg = [
			   "Click here to participate in the challenge and win cool gadgets and promising career with American Express India."
			   ];
	
	var feedObj = {
		message: 'Campus Centurion Challenge 2014',
		name: "Are you hooked on to the Campus Centurion Challenge 2014 yet?",
		link: SC.CANVASURL,
		picture: 'http:'+SC.BASEURL+'img/rsz_game_300_x_250.jpg',
		caption: "Campus Centurion",
		description: msg[0]
	};
	var id = 0;
	document.getElementById("id_cmt_process").style.display = "block";
	fbFQL({path:'/me/feed',method:'POST',data:feedObj},function(r){
	if (r && !r.error) {		
			id = r.id;		
		}
		$.ajax({
				type: "POST",
				url: "cmt.php",
				data: {i:id,c: decodeURIComponent(cmt)}
			}).done(function( r ) {
				debug(r, arguments);
				$('#ulcomments').prepend('<li>'+cmt+'<strong><a target="_blank" href="https://www.facebook.com/'+window.userInfo.uid+'">'+window.userInfo.name+'</a></strong></li>');
				try{$('#scrollbar1').tinyscrollbar_update()}catch(e){};
				document.getElementById("id_cmt_process").style.display = "none";
				document.getElementById('id_cmt').value='';
			});
		
		});
}

var renderFriendsWithApp = function(){
	/*var t='';
	if(window.appUsers.length > 0){
		var appu = window.appUsers.slice(0,11);
		appu.forEach(function(item){
			t+='<li><img src="https://graph.facebook.com/'+item.uid+'/picture" /><div>'+item.name.split(" ")[0]+'</div></li>';
		});
		$('#title_friends_with_app').empty().append("Your Friends Who are Here");
		$('#id_friends_with_app').empty().append(t);
		
	}*/
}

//fetch appusers
function fetchFBappUsers(cb){
    cb = cb || function(){};
	var o = {}; 
	
	if(window.appUsers == void 0){
		o.fql = {
            method: "get",
            path: "/fql/",
            data: {
				q: "SELECT uid,name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me() ) AND is_app_user = 1"
			}
        };
		
		fbFQL(o.fql,function(r){
	        window.appUsers = r.data;
	        cb(r);
		});
	}else{
		cb(window.appUsers);
	}
}

//userinfo
function fetchFBuserInfo(cb){
    cb = cb || function(){};
	var o = {}; 
	
	if(window.userInfo == void 0){
		/* Name,gender,location,email*/
		o.fql = {
            method: "get",
            path: "/fql/",
            data: {
				q: 'select uid, name, email from user where uid = me()'
			}
        };
		
		fbFQL(o.fql,function(r){
			o.o = r.data[0];
			o.o.name = o.o.name || '';
			o.o.email = o.o.email || '';
	        window.userInfo = r.data[0];
	        cb(r);
		});
	}else{
		cb(window.userInfo);
	}
}


// fbFQL({path:'graph api',method:'GET',data:{limit:3}},function(r){})
function fbFQL(o,cb){
	o = o || {};
	o.method = o.method || 'GET';
	o.data = o.data || {}; //{limit:3};
	cb = cb || function(){};
	if (o.path) {
		try{
			FB.api(o.path, o.method,o.data, function(r){
				debug(o.path,r);
				if (!r || r.error) {
					debug('Error:',r.error);
					cb(r);
				}else{
					cb(r);
				}
			});
		}catch(e){cb(e);}
	}else{
		cb('not specify graph api path');
	}
}

$('.cls_tab').on('click',function(){
	var k = $(this);
	$('.cls_banner').css('display','block');
	$('.cls_quiz').css('display','none');
	/*$('.cls_banner').removeClass(k.data('removebanner')).addClass(k.data('banner'));*/
	$('.cls_tab').removeClass('selected');
	k.addClass('selected');
	$('.cls_schedule').hide();
	$('.'+k.data('schedule')).show();
	$('.cls_comment').hide();
	$('.'+k.data('comment')).show();
	$('.cls_tbbg').removeClass(k.data('removetab')).addClass(k.data('tab'));
	clearTimeout(st);
	st=setTimeout(changebanner,5500);
});

function changebanner(){
/*
if($('.cls_tab.selected.hackrace').length > 0){
	if($('.cls_quiz').css('display') == 'block'){
		$('.cls_banner').css('display','block');
		$('.cls_quiz').css('display','none');
	}else{
		$('.cls_banner').css('display','none');
		$('.cls_quiz').css('display','block');

	}
}
st=setTimeout(changebanner,5500);*/
}