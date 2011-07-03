<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login</title>
 <?php echo link_tag('/assets/css/login.css') . "\n"; ?>


</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">
       
	<!-- start logo -->
	<div id="logo-login">
		<a href="index.html"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
        
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
            <form action="login/entrar" method="post">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Login</th>
			<td><input type="text"  name="login" class="login-inp" /></td>
		</tr>
		<tr>
			<th>Senha</th>
			<td><input type="password" name="senha"  class="login-inp" /></td>
		</tr>
		<?php /* <tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr> */ ?>
		<tr>
			<th></th>
			<td><input type="submit" value="Entrar" class="submit-login"  /></td>
		</tr>
		</table>
                </form>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<!-- <a href="" class="forgot-pwd">Forgot Password?</a> -->
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>