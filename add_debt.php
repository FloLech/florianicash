<? include_once ('comp/head.php'); ?>
<? include_once ('comp/header.php'); ?>
<form action="script/add_debt.php" method="post">
	<input class="form-helper" name="creditor" value="<? echo $user_id; ?>">
	<div class="row">
		<div class="grid-70 center-vert headline" data-center-to="amount">Eintrag hinzufügen</div><div id="amount" class="grid-30 no-pad quart"><div class="grid-100 center-vert tece" data-center-to="amount"><input class="tece" name="amount" type="tel" placeholder="Amount" /></div></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="grid-100 tece">Ich zahle mit<br><input class="checkbox" type="checkbox" name="selfDebitor"  value="1" style="width: 30px; height: 30px;" /></div>
		</div>
		<span id="first-debitor"><div class="row norm-bot">
			<div class="grid-100"><span class="custom-dropdown">
				<select name="debitor[]">
					<?
					$user_query = mysql_query("SELECT users.username, users.id FROM users JOIN debitors ON users.id = debitors.debitor WHERE debitors.creditor LIKE '$user_id' ORDER BY users.username") or die (mysql_error());

					while($row = mysql_fetch_assoc($user_query)){
						echo '<option class="custom-option" value="'.$row['id'].'">'.$row['username'].'</option>';
					}
					?>
				</select></span>
			</div>
		</div></span>
	    <a id="insertPoint"></a>
	    <div class="row">
			<div class="grid-100 tece">
	        <div id="add-debitor" class="green-fill-button"></div>
	        </div>
	    </div>
		<div class="row">
			<div class="grid-100"><textarea name="text" placeholder="Anmerkung..." ></textarea></div>
		</div>
		<div class="row">
			<div class="grid-100 tece"><button id="add-dept" class="green-fill-button" type="submit" value="submit"></button></div>
		</div>
	</div>
</form>

<script type="text/javascript">

var debitorCount = 1;

$('#add-debitor').click(function () {
	debitorCount ++;
	var selectField = $('#first-debitor').html();
	$('#insertPoint').before(selectField);
})


$(document).ready(function(){
	$('#footer-change').html('<a href="index.php"><div id="add-debt-button" class="tece"><div class="center-vert" data-center-to="menu-trigger"><img src="img/zuruck.svg" style="width: 17px;" /> zurück</div></div></a>');
})

</script>

<? include_once ('comp/footer.php'); ?>