<?

session_start();

include_once ('db_connect.php');

$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = md5($password);


$user_query = mysql_query("SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$hashedPassword' LIMIT 1") or die (mysql_error());

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body>
<?



if (mysql_num_rows($user_query) == 1) {

	while ($row = mysql_fetch_assoc($user_query)){
		$user_id = $row['id'];
	}
    $_SESSION['angemeldet'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user_id;
    header('Location: ../index.php');
    exit();
} else {
	header('Location: ../login.php?login=incorrect');
}

?>

</body>