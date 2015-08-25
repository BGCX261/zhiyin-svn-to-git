<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>智印</title>
<LINK REL="SHORTCUT ICON" HREF="<?php echo IMAGE_ROOT; ?>/favicon.ico">
<link rel="stylesheet" href="/css/common/global.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ngbtns.css" type="text/css" />
<link rel="stylesheet" href="/css/member/login.css" type="text/css" />
<script src="/js/lib/jquery/jquery-1.8.3.min.js"></script>
<style>
#page {
	width: 950px;
	margin-left: auto;
	margin-right: auto;
}

#header {
	padding-top: 0;
}

#logo {
	padding: 20px 0 0 52px;
}

.login-box {
	width: 310px;
	min-height: 260px;
	background-color: #FFF;
	border: 1px solid #ccc;
	margin: 0 auto;
}

.login-box .bd {
	position: relative;
	z-index: 2;
	margin: 0 30px;
	zoom: 1;
}

.login-box .msg {
	overflow: hidden;
	margin-bottom: 5px;
}

.login-box .field {
	padding-bottom: 12px;
	zoom: 1;
	position: relative;
	z-index: 1;
}

.login-box .field label {
	display: block;
	font-weight: bold;
	padding-bottom: 5px;
}

.ph-label {
	position: absolute;
	padding: 0 0 0 6px;
	line-height: 26px;
	height: 26px;
	color: #404040;
	opacity: 1;
	transition: all .2s ease-out;
	-webkit-transition: all .2s ease-in;
	-moz-transition: all .2s ease-out;
}

.login-box .login-text {
	width: 242px;
	height: 18px;
	line-height: 18px;
	padding: 3px;
	border: solid 1px #CCC;
	vertical-align: middle;
}

.login-box .forget-pw,.login-box .dynamic-link {
	position: absolute;
	right: 0;
	top: 0;
}

#J_StandardPwd {
	display: inline-block;
	height: 28px;
	vertical-align: middle;
}

.login-box .submit {
	overflow: hidden;
	clear: both;
	zoom: 1;
	padding-top: 5px;
}

.login-box .submit button {
	width: 250px;
	height: 33px;
	border: 0;
	display: inline-block;
	overflow: hidden;
	vertical-align: middle;
	line-height: 31px;
	font-size: 14px;
	font-weight: bold;
	color: #FFF;
	background: url(/images/tps/i1/c.png) no-repeat 0 0;
	cursor: pointer;
	zoom: 1;
}

.login-box .msg p {
	border: 1px solid #ccc;
	float: none;
	white-space: normal;
	word-wrap: break-word;
}


.login-box .msg p.error {
	background: url(/images/kf/stuff.png) no-repeat -319px -449px #fff2f2;
	border-color: #ff8080;
	line-height: 18px;
	padding: 2px 10px 2px 23px;
}

.login-box .highlight {
	border: solid 1px #f63;
}
</style>
</head>
<body>

	<div id="page">
		<div id="header" class="clearfix" style="display:none">
			<h1 id="logo">
				<a href="http://www.97ng.com/" target="_top"> 
					<img src="http://kf.97ng.com/images/kf/logo.gif" alt="开服表">
				</a> 
			</h1>
		</div>
		<div class="blank_d" style="height:100px;"></div>

		<div id="J_loginbox" class="login-box">
			<div class="hd" style="height:30px;line-height:30px;border-bottom:2px solid darkorange;margin-bottom:20px;padding-left:3px;">
			<h3>登录</h3>
			</div>
			<div class="bd">
				<div id="J_Message" style="display: none;" class="login-msg msg">
					<p class="error" id="error_box">ddd</p>
				</div>
				<div class="fields">
					<!--  <form id="J_StaticForm" action="http://kf.97ng.com/member/login/dologin" method="post">-->
						<div class="field username-field">
							<label for="TPL_username_1">登录名：</label> 
							<!--  <span class="ph-label">会员名/邮箱</span> -->
							<input type="text" name="TPL_username" id="TPL_username_1" class="login-text" value="" maxlength="32" tabindex="1" placeholder="会员名/邮箱">
						</div>
						<div class="field pwd-field">
							<label id="password-label" for="TPL_password_1">登录密码：</label> 
							<!--  <a href="http://www.97ng.com/account/activate" target="_blank" id="forget-pw-safe" class="forget-pw">忘记登录密码?</a> -->
							<span id="J_StandardPwd"> 
								<input type="password" name="TPL_password" id="TPL_password_1" class="login-text" maxlength="20" tabindex="2">
							</span>
						</div>
						<div class="submit">
							<button  class="J_Submit" tabindex="3" id="J_SubmitStatic">登 录</button>
						</div>
					<!--  </form>-->

				</div>
			</div>
			<div class="ft"></div>
		</div>
	</div>

	<script type="text/javascript">
            $(document).ready(function(){
                $("#J_SubmitStatic").on("click",function(){
                    var account;
                    var password;
                    account=$.trim($("#TPL_username_1").val());
                    password=$.trim($('#TPL_password_1').val());
                    if(account=='' && password==''){
                        $("#error_box").html('请输入会员名和密码');
                        $("#J_Message").show();
                        return false;
                    }
                    if(account=='')
                    {
                        $("#error_box").html('请输入会员名');
                        $("#J_Message").show();
                        return false;
                    }
                    if(password=='')
                    {
                        $("#error_box").html('请输入密码');
                        $("#J_Message").show();
                        return false;
                    }
                    $("#J_SubmitStatic").html("登录中...");
    
                    $.ajax({
                        type: "POST",
                        url: "/account/login",
                        dataType: 'json',
                        data : {account:account,password:password},
                        success: function(redata){  
                                                      
                            if(redata.state){
								document.location=redata.data.url;
                            }else{
		                        $("#error_box").html(redata.message);
		                        $("#J_Message").show();	
		                        $("#J_SubmitStatic").html("登录");							
                            }
                        }
                    })
                    
                });

                //回车登录
                $(document).keyup(function(event){
                	  if(event.keyCode ==13){
                	    $("#J_SubmitStatic").trigger("click");
                	  }
                	});                  
                
            });

         
        </script>