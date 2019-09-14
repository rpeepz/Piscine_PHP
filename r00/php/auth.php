<?PHP
function auth($login, $passwd)
{
	$path = '../htdocs/private';
	$file = $path."/passwd";
	$unserialized = unserialize(file_get_contents($file));
	$iparmentier = hash("sha256", $passwd);
	foreach ($unserialized as $key=>$elem) {
		if ($elem['login'] == $login) {
			if ($elem['passwd'] == $iparmentier) {
				$_SESSION['logged_user'] = $login;
				return (TRUE);
			}
			else {
				return (FALSE);
			}
		}
	}
	return (FALSE);
}
?>