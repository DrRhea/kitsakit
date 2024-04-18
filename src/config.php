<?php
  $conn = mysqli_connect("localhost", "root", "", "db_kitsakit");

  if(!$conn)
    die ("Koneksi dengan database gagal: ".mysqli_connect_error());

?>