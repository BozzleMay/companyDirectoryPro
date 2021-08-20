 <?php /*

	$cd_host = "127.0.0.1";
	$cd_port = 3306;
	$cd_socket = "";
	$cd_user = "root"; // user name
	$cd_password = '';	// "sElling@348"; // password
	$cd_dbname = "companydirectory"; // database name

	$link = mysqli_connect($cd_host, $cd_user, $cd_password, $cd_dbname)
 or die('Error connecting to MySQL server.');

?> 
<?php /*
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

*/
//Get Heroku ClearDB connection information

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB



$link = mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>


