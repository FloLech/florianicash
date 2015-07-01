<? include_once ('comp/head.php'); ?>
<? include_once ('comp/header.php'); ?>

 <?
	$debitor = $_GET['debitor'];

	$asset_query_saldo = mysql_query("SELECT SUM(amount) FROM debts WHERE creditor LIKE '$user_id' AND debitor LIKE '$debitor'") or die (mysql_error());
	$debt_query_saldo = mysql_query("SELECT SUM(amount) FROM debts WHERE creditor LIKE '$debitor' AND debitor LIKE '$user_id'") or die (mysql_error());

	while ($row = mysql_fetch_assoc($asset_query_saldo)){
		$asset_saldo = $row['SUM(amount)'];
	};

	while ($row = mysql_fetch_assoc($debt_query_saldo)){
		$debt_saldo = $row['SUM(amount)'];
	};

	$difference_saldo = round($asset_saldo - $debt_saldo, 2);

	$debitorQuery = mysql_query("SELECT * FROM users WHERE id LIKE '$debitor'") or die (mysql_error());
	while ($row = mysql_fetch_assoc($debitorQuery)){
		$debitorName = $row['username'];
	}


?>

<div class="row">
	<div class="grid-80 center-vert headline" data-center-to="saldo">Aktueller Saldo gegenüber <? echo $debitorName; ?></div><div id="saldo" class="grid-20 no-pad quart <? if ($difference_saldo >= 0) { echo 'green';} else {echo 'red';} ?>"><div class="grid-100 center-vert tece" data-center-to="saldo">€<br><? echo abs($difference_saldo); ?></div></div>
</div>

<?

$asset_query = mysql_query("SELECT * FROM debts WHERE creditor LIKE '$user_id' AND debitor LIKE '$debitor'") or die (mysql_error());
$debt_query = mysql_query("SELECT * FROM debts WHERE creditor LIKE '$debitor' AND debitor LIKE '$user_id'") or die (mysql_error());
	
$cashflows = array();

while($line = mysql_fetch_assoc($asset_query)){
    $cashflows[] = $line;
}

while($line = mysql_fetch_assoc($debt_query)){
    $cashflows[] = $line;
}

function do_compare($item1, $item2) {
    $ts1 = strtotime($item1['timestamp']);
    $ts2 = strtotime($item2['timestamp']);
    return $ts2 - $ts1;
}


usort($cashflows, 'do_compare');

foreach ($cashflows as $key => $value) {

$dateNoFormat = strtotime($value['timestamp']);

$dateFormated =	date('d. m. Y', $dateNoFormat);

$debitorCompare = $value['debitor'];

echo '
	
	<div class="row">
		<a href="debt_detail.php?id='.$value['id'].'&debitor='.$debitor.'">
			<div class="grid-80 center-vert" data-center-to="individual_saldo"><h1>'.$dateFormated.'</h1></div>
			<div class="grid-20">
				<div id="individual_saldo" class="grid-90 marg-5 no-pad quart '; if ($debitor == $debitorCompare) { echo 'green';} else {echo 'red';} echo '">
					<div class="center-vert tece" data-center-to="individual_saldo">€<br>'.round($value['amount'], 2).'</div>
				</div>
			</div>
		</a>
	</div>';


}

?>

<script type="text/javascript">
	
$(document).ready(function(){
	$('#footer-change').html('<a href="index.php"><div id="add-debt-button" class="tece"><div class="center-vert" data-center-to="menu-trigger"><img src="img/zuruck.svg" style="width: 17px;" /> zurück</div></div></a>');
});

</script>

  <? include_once ('comp/footer.php'); ?>