<?
include_once ('db_connect.php'); 

$amount = str_replace(',', '.', $_POST['amount']);
$text = $_POST['text'];
$creditor = $_POST['creditor'];


if(!empty($_POST['debitor'])){
	$debitor = $_POST['debitor'];
};

$debitors = '';

if (!empty($_POST['selfDebitor'])) {
$debitorsCount = 1;
} else {
$debitorsCount = 0;
}

if(!empty($_POST['debitor'])){
	foreach( $debitor as $key => $n ) {
	   $debitorsCount ++;
	}
	
	$amountPerDebitor = $amount / $debitorsCount;

	$relatedDebitors = NULL;
	
	foreach( $debitor as $key => $n ) {
		mysql_query("INSERT INTO debts (amount, text, creditor, debitor) VALUES ('$amountPerDebitor', '$text', '$creditor', '$n')") or die (mysql_error());
		$relatedDebitors .= 'debitor[]='.$n.'&';
	}
}

header ('Location: ../index.php?'.$relatedDebitors)

?>