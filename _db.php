<?php
	$host	 = "localhost";
	$user	 = "root";
	$pass	 = "";
	$dabname = "erp-vienwi";
	
	$foldername="ERP-VIENWI";
	$conn = mysql_connect( $host, $user, $pass) or die('Could not connect to mysql server.' );
	mysql_select_db($dabname, $conn) or die('Could not select database.');
	$baseurl="http://localhost/".$foldername."/";
	
	$nama_usaha="ERP";
	$nama_aplikasi="ERP-VIENWI";
	$path_web=$_SERVER['DOCUMENT_ROOT']."/".$foldername."/";
	$label_footer="Copyright &copy;  ".date("Y");
	$logo="img/logo_t.png";
	
	$dbconnect = new mysqli($host, $user, $pass, $dabname);
/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($dbconnect->connect_error) {
    die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}

?>