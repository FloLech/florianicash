<?

include_once ('db_connect.php');

$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = md5($password);

$userNames = mysql_query("SELECT * FROM users WHERE username LIKE '$username'");
$userNameExists  = mysql_num_rows($userNames);

if ($userNameExists >= 1) {
	header ('Location: ../register.php?fail=username');
} else {

	session_start();

	mysql_query("INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')");
	
	$user_query = mysql_query("SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$hashedPassword' LIMIT 1") or die (mysql_error());

	while ($row = mysql_fetch_assoc($user_query)){
		$user_id = $row['id'];
	}
    $_SESSION['angemeldet'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user_id;
    header('Location: ../index.php');

}

?>
