<?php
    $hostname = 'localhost'; // variabel 1 untuk memanggil server
    $username = 'root'; //variabel 2 untuk memanggil nama user
    $password = ''; //variabel 3 password dan dikosongkan karena tidak mengatur php my admin
    $dbname   = 'db_bukawaroeng'; //variabel 4 untuk nama database yang sudah di export

    $conn = mysqli_connect($hostname,$username, $password, $dbname) or die ('gagal terhubung ke database');
?>