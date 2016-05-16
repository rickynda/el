<?php
 error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include 'koneksi.php';
$user = addslashes($_POST['username']);
$pass = addslashes($_POST['password']);

$query = mysql_query("SELECT * FROM `user` WHERE `username` = '$user' AND `password` = md5('$pass')");
$hasil = mysql_num_rows($query);
$data = mysql_fetch_array($query);

if ( $hasil == 1){
	$_SESSION['username'] = $data['username'];
	$_SESSION['level'] = $data['level'];
		if($data['level'] == "Pengajar"){header("Location: index.php");}

		elseif($data['level'] == "Murid"){header("Location: index.php");}

} else {

	echo' <div class="alert alert-danger">
  <strong>Gagal Login</strong> Cek Username & Password 
</div>';
	
}



?>