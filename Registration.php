<?PHP
	$mysql_hostname = "127.0.0.1";
	$mysql_username = "root";
	$mysql_database = "neighbourhoodapplication";
	
	$db= mysql_connect($mysql_hostname, "$mysql_username", "") or die("Cannot connect!" . mysql_error());
		
	mysql_select_db($mysql_database, $db) or die("could not load the database" . mysql_error());

	$username = $_POST['username'];
	$u_name = $_POST['u_name'];
	$u_password = $_POST['u_password'];

	$check = mysql_query("SELECT * FROM user WHERE `user`='".$username."'");
	$numrows = mysql_num_rows($check);
	if($numrows == 0)
	{
		$u_password = md5($u_password);
		$ins = mysql_query("insert into `User` values('".$username."', '".$u_name."', '".$u_password."')");
		if($ins)
		{
			die("Successfully Created User!");
		}
		else
		{
			die("Error: " . mysql_error());
		}
	}
	else
	{
		die("User already exists!");
	}

?>