<div id="header">
</div>
<div id="overlayChangePassword" class="overlay">
	<div class="container" style="padding-top: 60px;">
		<div class="row">
			<div class="grid-100 tece"><h1>Bild ändern</h1></div>
		</div>
		<form action="script/changeUserPic.php" method="POST" enctype="multipart/form-data">
			<input type="text" value="<? echo $user_id; ?>" name="userID" hidden="true" />
			<div class="row">
				<div class="grid-80 marg-10 tece">
					<input type="file" name="userPicture" id="userPicture" hidden="true" />
					<label for="userPicture" class="blue-border-button" style="width: 250px">Bild auswählen</label>
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
				<div class="grid-80 marg-10 tece">
					<input type="text" name="newPassword" placeholder="neues Passwort" />
				</div>
			</div>
			<div class="row large-bot">
				<div class="grid-50 marg-25"><input type="submit" value="Passwort ändern" /></div>
			</div>
		</form>
		<div class="row">
				<div class="grid-50 marg-25 tece"><a class="blue-border-button" href="script/logout.php">Log Out</a></div>
		</div>
	</div>
</div>
<!-- Overlay Menu -->

<div class="wrapper">
<a id="top"></a> 