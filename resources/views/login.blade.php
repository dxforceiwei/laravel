<!DOCTYPE html lang=\"zh-TW\">
<head>
	@php
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
	header("Pragma: no-cache"); //HTTP 1.0
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	//or, if you DO want a file to cache, use:
	header("Cache-Control: max-age=2592000"); 
	@endphp
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="政亮企業-經銷系統">
	<title>政亮企業-經銷系統</title>
	<link rel="stylesheet" type="text/css" href="../resources/CSS/mystyle.css" async>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
	<link rel="stylesheet" href="../resources/assets/css/main.css" async>
	<noscript><link rel="stylesheet" href="../resources/assets/css/noscript.css" /></noscript>
	<link rel="icon" href="../resources/images/logo.png">
	<script src="../resources/Java/jquery.js" async></script>
</head>
<script>
	function getCookie(cname) {
		var name = cname + \"=\";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return \"\";
	}

	function checkCookie() {
		var user=getCookie(\"username\");
		var password=getCookie(\"password\");
		var success=getCookie(\"success\");
		if ((user != \"\") && (password != \"\") && (success ==\"1\")) {
			window.location.href = 'index.php';
		} 
	}
</script>
<body class="is-preload" onLoad="checkCookie()" align="center" valign="center" style="text-transform:none ;">
	<div id="wrapper">
		<section id="main">
			<header>
				<span class="avatar"><img src="../resources/images/logo.png" alt="" /></span>
				<h1>會員登入</h1>
				<p>政亮企業-經銷系統</p>
			</header>
			<footer>
					<form name="form1" method="POST" action={{ action("login@store") }}>
					{{ csrf_field() }}
						<table width="100%" border="0" align="center">
							<tr>
								<th align="right" valign="middle" scope="col">帳號</th>
								<th align="left" valign="middle" scope="col">
									<label for="username"></label>
									<input type="text" name="username" maxlength="20" style="text-transform:none ;">
								</th>
							</tr>
							<tr>
								<th align="right" valign="middle" scope="row">密碼</th>
								<th align="left" valign="middle" scope="col">
									<label for="password"></label>
									<input type="password" name="password" style="text-transform:none ;">
								</th>
							</tr>							
							<tr align="center">
								<th colspan="2" valign="middle" scope="row">
									<br>
									<input type="submit" value="送出" id="btn">
									<input type="reset" value="重設">
								</th>
							</tr>
						</table>
					</form>
			</footer>	
		</section>
		<footer id="footer">
			<ul class="copyright">
				<li>&copy; 政亮企業股份有限公司</li>
			</ul>
		</footer>
	</div>
	<script>
		function setCookie(cname,cvalue,exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays*86400));
			var expires = "expires=" + d.toGMTString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}
		if ('addEventListener' in window) 
		{
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
		}
	</script>
</body>
<script src="../resources/Java/jquery.js"></script>
<script src="../resources/assets_main/js/jquery.min.js"></script>
<script src="../resources/assets_main/js/browser.min.js"></script>
<script src="../resources/assets_main/js/breakpoints.min.js"></script>
<script src="../resources/assets_main/js/util.js"></script>
<script src="../resources/assets_main/js/main.js"></script>
</html>