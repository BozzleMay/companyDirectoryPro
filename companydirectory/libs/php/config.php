 <?php 

	$cd_host = "127.0.0.1";
	$cd_port = 3306;
	$cd_socket = "";
	$cd_user = "root"; // user name
	$cd_password = '';	// "sElling@348"; // password
	$cd_dbname = "companydirectory"; // database name

	$link = mysqli_connect($cd_host, $cd_user, $cd_password, $cd_dbname)
 or die('Error connecting to MySQL server.');

?> 
