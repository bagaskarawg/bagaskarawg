<?php
// konfigurasi database
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "contact_db";
// perintah php untuk akses ke database
$link = mysqli_connect($host, $user, $password, $database);

//jika koneksi gagal, langsung keluar dari PHP
if (!$link) {
    die("Koneksi dengan MySQL gagal");
}
