<? include_once ('comp/head.php'); ?>
<? include_once ('comp/header.php'); ?>

<?

	$asset_query_saldo = mysql_query("SELECT SUM(amount) FROM debts WHERE creditor LIKE '$user_id'") or die (mysql_error());
	$debt_query_saldo = mysql_query("SELECT SUM(amount) FROM debts WHERE debitor LIKE '$user_id'") or die (mysql_error());

	while ($row = mysql_fetch_assoc($asset_query_saldo)){
		$asset_saldo = $row['SUM(amount)'];
	};

	while ($row = mysql_fetch_assoc($debt_query_saldo)){
		$debt_saldo = $row['SUM(amount)'];
	};

	$difference_saldo = round($asset_saldo - $debt_saldo, 2);


?>

<div class="row">
	<div class="grid-80 center-vert headline" data-center-to="saldo">Aktueller Saldo</div><div id="saldo" class="grid-20 no-pad quart <? if ($difference_saldo >= 0) { echo 'green';} else {echo 'red';} ?>"><div class="grid-100 center-vert tece" data-center-to="saldo">€<br><? echo abs($difference_saldo); ?></div></div>
</div>

<?

$user_query = mysql_query("SELECT users.username, users.id, users.pic FROM users JOIN debitors ON users.id = debitors.debitor WHERE debitors.creditor LIKE '$user_id' ORDER BY users.username") or die (mysql_error());

while ($row = mysql_fetch_assoc($user_query)){
	$debitor = $row['id'];
	$asset_query = mysql_query("SELECT SUM(amount) FROM debts WHERE creditor LIKE '$user_id' AND debitor LIKE '$debitor'") or die (mysql_error());
	$debt_query = mysql_query("SELECT SUM(amount) FROM debts WHERE creditor LIKE '$debitor' AND debitor LIKE '$user_id'") or die (mysql_error());

	while ($row_a = mysql_fetch_assoc($asset_query)){
		$asset = $row_a['SUM(amount)'];
	};

	while ($row_d = mysql_fetch_assoc($debt_query)){
		$debt = $row_d['SUM(amount)'];
	};

	$difference = round($asset - $debt, 2);

	echo '
	
	<div class="row">
		<a href="debts_overview.php?debitor='.$debitor.'">
			<div class="grid-80"><div class="grid-15 no-pad center-vert" data-center-to="individual_saldo"><div class="quart user-pic" style="background-image: url('.$row['pic'].');"></div></div><div class="grid-85 center-vert" data-center-to="individual_saldo"><h1>'.$row['username'].'</h1></div></div>
			<div class="grid-20">
				<div id="individual_saldo" class="grid-90 marg-5 no-pad quart '; if ($difference >= 0) {echo 'green';} else {echo 'red';} echo'">
					<div class="center-vert tece" data-center-to="individual_saldo">€<br>'.abs($difference).'</div>
				</div>
			</div>
		</a>
	</div>';
	
}

?>

<?

if (!empty($_GET['debitor'])) {
	$debitor = $_GET['debitor'];
	echo '
				<script type="text/javascript">
					$(document).ready(function() {
						alert("Neu Schuld von ';
	$i = 0;
	$j = count($debitor);
	foreach($debitor as $key => $n ) {
		$i++;
		$debitorQuery = mysql_query("SELECT * FROM users WHERE id LIKE '$n'");
		while ($row = mysql_fetch_assoc($debitorQuery)) {
			echo ucfirst($row['username']).' ';
			if ($i < $j) { echo 'und ';}
		}
	}
	echo 'erfasst.");
					});
				</script>
			';
	
	}
?>

<? include_once ('comp/footer.php'); ?>