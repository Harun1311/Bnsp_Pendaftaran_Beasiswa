<?php

// define hostname, username, password, dbname
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_ujian';

// koneksi ke database dengan define name
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// pengecekan koneksi  ke database
if(!$conn) {
    echo "koneksi gagal" + mysqli_connect_error();
}
?>