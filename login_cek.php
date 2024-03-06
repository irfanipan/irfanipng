<?php
include "koneksi.php";
session_start();

$Username = $_POST["Username"];
$Password = MD5($_POST["Password"]);


$sql=mysqli_query($koneksi, "select * from user where Username= '$Username' and Password= '$Password'");

$cek=mysqli_num_rows($sql);

if($cek==1){
	while($data=mysqli_fetch_array($sql)){
		$_SESSION['UserID']=$data['UserID'];
		$_SESSION['NamaLengkap']=$data['NamaLengkap'];
		$_SESSION['Username']=$data['Username'];
	
}
header("location:beranda.php");
}else{
echo "'<script>alert('Username/Password Salah!.'); document.location='login.php';</script>'";
}
?>