<? include_once ('comp/head.php'); ?>
<? include_once ('comp/header.php'); ?>
<div class="row">
	<div class="grid-100 tece">
		<h1>Einstellungen</h1>
	</div>
</div>
<form action="script/changeUserPic.php" method="POST" enctype="multipart/form-data">
	<input type="text" value="<? echo $user_id; ?>" name="userID" hidden="true" />
	<div class="row">
		<div class="grid-50 marg-25 tece">
			<input type="file" name="userPicture" id="userPicture" hidden="true" />
			<label for="userPicture" class="blue-border-button" style="width: 100%">Bild auswählen</label>
		</div>
	</div>
	<div class="row large-bot">
		<div class="grid-50 marg-25"><input type="submit" value="Bild ändern" /></div>
	</div>
</form>
<form action="script/changePassword.php" method="POST">
	<input type="text" value="<? echo $user_id; ?>" name="userID" hidden="true" />
	<div class="row">
		<div class="grid-100 tece"><h1>Passwort ändern</h1></div>
	</div>
	<div class="row">
		<div class="grid-50 marg-25 tece">
			<input type="text" name="newPassword" placeholder="neues Passwort" />
		</div>
	</div>
	<div class="row large-bot">
		<div class="grid-50 marg-25"><input type="submit" value="Passwort ändern" /></div>
	</div>
</form>
<div class="row norm-bot">
	<div class="grid-100">&nbsp;</div>
</div>

<? include_once ('comp/footer.php'); ?>