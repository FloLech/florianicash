<? include_once ('comp/head.php'); ?>
<? include_once ('comp/header.php'); ?>

<?

$id = $_GET['id'];
$debitor = $_GET['debitor'];

$debt = mysql_query("SELECT * FROM debts WHERE id LIKE '$id'") or die (mysql_error());

while ($row = mysql_fetch_assoc($debt)){

$dateNoFormat = strtotime($row['timestamp']);

$dateFormated =	date('d. m. Y - H:i', $dateNoFormat);


    echo '
    <div class="row">
	<div class="grid-80 center-vert headline" data-center-to="saldo">'.$dateFormated.'</div><div id="saldo" class="grid-20 no-pad quart '; if ($debitor == $row['debitor']) { echo 'green';} else {echo 'red';} echo '"><div class="grid-100 center-vert tece" data-center-to="saldo">€<br>'.round($row['amount'], 2).'</div></div>
</div>
<div class="container">
	<div class="row">
		<div class="grid-100">'.$row['text'].'</div>
	</div>
</div>
';
}

?>



<script type="text/javascript">

$(document).ready(function(){
	$('#footer-change').html('<a href="debts_overview.php?debitor=<? echo $debitor; ?>"><div id="add-debt-button" class="tece"><div class="center-vert" data-center-to="menu-trigger"><img src="img/zuruck.svg" style="width: 17px;" /> zurück</div></div></a>');
});

</script>

  <? include_once ('comp/footer.php'); ?>