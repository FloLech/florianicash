<div id="header">
</div>
<div id="overlayChangePassword" class="overlay">
	<div class="container" style="padding-top: 200px;">
		<div class="row">
			<div class="grid-100 tece"><h1>Change Password</h1></div>
		</div>
		<form action="script/changePassword.php" method="POST">
			<input type="text" value="<? echo $user_id; ?>" name="userID" hidden="true" />
			<div class="row">
				<div class="grid-80 marg-10 tece">
					new Password:<br>
					<input type="text" name="newPassword" />
				</div>
			</div>
			<div class="row large-bot">
				<div class="grid-50 marg-25"><input type="submit" value="ändern" /></div>
			</div>
			<div class="row">
				<div class="grid-50 marg-25 tece"><a href="script/logout.php">Log Out</a></div>
			</div>
		</form>
	</div>
</div>
<!-- Overlay Menu -->

<div class="wrapper">
<a id="top"></a> 