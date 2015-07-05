<? include_once ('comp/head.php'); ?>
<? include_once ('comp/header.php'); ?>

<div class="row">
	<div class="grid-100">
		<h1>Meine Debitoren</h1>
	</div>
</div>
<?
					$user_query = mysql_query("SELECT users.username, users.id FROM users JOIN debitors ON users.id = debitors.debitor WHERE debitors.creditor LIKE '$user_id' ORDER BY users.username") or die (mysql_error());

					while($row = mysql_fetch_assoc($user_query)){
						echo '<option class="custom-option" value="'.$row['id'].'">'.$row['username'].'</option>';
					}
					?>

<div class="row">
	<div class="grid-100">
		<h1>Debitor hinzufügen</h1>
	</div>
</div>

<?

	$user_query = mysql_query("SELECT users.id, users.username FROM users WHERE users.id NOT LIKE '$user_id' AND users.id NOT IN (SELECT debitor FROM debitors WHERE creditor LIKE '$user_id') ORDER BY users.username") or die (mysql_error());

	while($row = mysql_fetch_assoc($user_query)){
		echo '<a href="script/add_debitor.php?creditor='.$user_id.'&debitor='.$row['id'].'"><div class="custom-option">'.$row['username'].'</div></a>';
	};


?>



<? include_once ('comp/footer.php'); ?>