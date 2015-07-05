<?
include_once ('db_connect.php'); 

$creditor = $_GET['creditor'];
$debitor = $_GET['debitor'];

mysql_query("INSERT INTO debitors (creditor, debitor) VALUES ('$creditor', '$debitor')");

header ('Location: ../myDebitors.php');

?>