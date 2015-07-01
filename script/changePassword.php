<?
include_once ('db_connect.php'); 

$newPassword = $_POST['newPassword'];
$userID = $_POST['userID'];

$hashedPassword = md5($newPassword);

mysql_query("UPDATE users SET password = '$hashedPassword' WHERE id LIKE '$userID'");

header ('Location: ../index.php');

?>

</body>