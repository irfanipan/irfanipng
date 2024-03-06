<?php
include "koneksi.php";
session_start();

$Judul_Foto = $_POST['Judul_Foto'];
$Deskripsi_Foto = $_SESSION['Deskripsi_Foto'];
$Tanggal_Unggah = $_POST['Tanggal_Unggah'];
$TanggalKomentar = date('Y-m-d');

$sql = mysqli_query($koneksi, "insert into Judul_Foto values ('','$Judul_Foto','$Deskripsi_Foto', '$Tanggal_Unggah '$TanggalKomentar')");


?>