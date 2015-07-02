<?

include_once ('db_connect.php'); 

$userID = $_POST['userID'];

$tmp_name = $_FILES["userPicture"]["tmp_name"];
$temp = explode(".",$_FILES["userPicture"]["name"]);
$newfilename = $userID . '.' .end($temp);
move_uploaded_file($tmp_name, "../user-pics/$newfilename");
$imageLocation = 'user-pics/'.$newfilename;

mysql_query("UPDATE users SET pic = '$imageLocation' WHERE id LIKE '$userID'");

header ('Location: ../index.php');
?>