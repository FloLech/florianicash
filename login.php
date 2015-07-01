<? include_once ('comp/head_no_auth.php'); ?>
<? include_once ('comp/header.php'); ?>
  <div class="container" style="padding-top: 60px;">
	<div class="row large-bot">
		<div class="grid-100 tece"><object data="img/title.svg" style="max-width: 220px;"></object></div>
	</div>
 <?
if(!empty($_GET['login'])){
	echo '
	<div class="row">
		<div class="grid-100 tece">Login fehlgeschlagen!</div>
	</div>';
}
?>
   <form method="post" action="script/login.php">
		<div class="row">
			<div class="grid-100">
				<input name="username" placeholder="Name"/>
			</div>
		</div>
		<div class="row">
			<div class="grid-100">
				<input name="password" type="password" placeholder="Passwort" />
			</div>
		</div>
		<div class="row norm-bot">
			<div class="grid-100 tece">
				<button id="login-button" type="submit" class="blue-border-button" value="login"><img class="center-vert" data-center-to="login-button" src="img/weiter_blue.svg" style="max-width: 25px;" /></button>
			</div>
		</div>
	</form>
		<div class="row no-bot">
			<div class="grid-100 tece byhuangart">
				by Huangart
			</div>
		</div>

  </div>
</div>

<!-- Javascript -->
<script type="text/javascript" src="js/outdatedbrowser/outdatedbrowser.min.js"></script> 
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script> 
<script type="text/javascript" src="js/ladastock.js"></script> 
<script type="text/javascript" src="js/florianicash.js"></script> 
<div id="outdated"></div>
</body>
</html>