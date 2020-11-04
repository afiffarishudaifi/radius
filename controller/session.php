<?php
error_reporting(0);
include('/koneksi.php');
session_start(); // Memulai Session
// Menyimpan Session
$check_username = $_SESSION['username'];

// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$sql = "SELECT * from operators where USERNAME='$check_username'";
$ses_sql = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$session_id = $row['id'];
$session_username = $row['username'];