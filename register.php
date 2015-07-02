<? include_once ('comp/head_no_auth.php'); ?>
<? include_once ('comp/header.php'); ?>
<? 
if(!empty($_GET['fail'])) {
	echo '
	<script type="text/javascript">
		$(document).ready(function() {
			alert("Username bereits vergeben!");
		});
	</script>';
}
?>


  <div class="container" style="padding-top: 60px;">
	<div class="row large-bot">
		<div class="grid-100 tece"><object data="img/title.svg" style="max-width: 220px;"></object></div>
	</div>
	<div class="row larg-bot">
		<div class="grid-100 tece">
			<h1>Neuer User</h1>
		</div>
	</div>
   <form method="post" action="script/register.php" enctype="multipart/form-data">
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
		<div class="row large-bot">
			<div class="grid-100 tece">
				<input type="file" name="userPicture" id="userPicture" hidden="true" />
				<label for="userPicture" class="blue-border-button" style="width: 250px">Upload Picture</label>
			</div>
		</div>
		<div class="row norm-bot">
			<div class="grid-100 tece">
				<button id="login-button" type="submit" class="blue-border-button" value="registrieren"><img class="center-vert" data-center-to="login-button" src="img/weiter_blue.svg" style="max-width: 25px;" /></button>
			</div>
		</div>
	</form>

</div>

<!-- Javascript -->
<script type="text/javascript" src="js/outdatedbrowser/outdatedbrowser.min.js"></script> 
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script> 
<script type="text/javascript" src="js/ladastock.js"></script> 
<script type="text/javascript" src="js/florianicash.js"></script> 
<div id="outdated"></div>
</body>
</html>