<? include_once ('comp/head.php'); ?>
<? include_once ('comp/header.php'); ?>

<div class="row">
	<div class="grid-100 tece">
		<h1>Meine Debitoren</h1>
	</div>
</div>
<?
	$user_query = mysql_query("SELECT users.username, users.id, users.pic FROM users JOIN debitors ON users.id = debitors.debitor WHERE debitors.creditor LIKE '$user_id' ORDER BY users.username") or die (mysql_error());

	while($row = mysql_fetch_assoc($user_query)){

	echo '
	<div class="row">
			<div class="grid-80"><div id="user-pic" class="grid-15 no-pad"><div class="quart user-pic" style="background-image: url('.$row['pic'].');"></div></div><div class="grid-80 marg-5 center-vert" data-center-to="user-pic"><h1>'.$row['username'].'</h1></div></div>
	</div>';

	}
?>

<div class="row">
	<div class="grid-100 tece">
		<h1>Debitor hinzufügen</h1>
	</div>
</div>

<?

	$user_query = mysql_query("SELECT users.id, users.username, users.pic FROM users WHERE users.id NOT LIKE '$user_id' AND users.id NOT IN (SELECT debitor FROM debitors WHERE creditor LIKE '$user_id') ORDER BY users.username") or die (mysql_error());

	while($row = mysql_fetch_assoc($user_query)){
		echo '
		<a href="script/add_debitor.php?creditor='.$user_id.'&debitor='.$row['id'].'">
			<div class="row norm-bot">
				<div class="grid-80"><div id="user-pic" class="grid-15 no-pad"><div class="quart user-pic" style="background-image: url('.$row['pic'].');"></div></div><div class="grid-80 marg-5 center-vert" data-center-to="user-pic"><h1>'.$row['username'].'</h1></div></div>
			</div>
		</a>';
	};

?>

<div class="row norm-bot">
	<div class="grid-100">&nbsp;</div>
</div>

<? include_once ('comp/footer.php'); ?>