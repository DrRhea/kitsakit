<?php
  include('./config.php');

  function readObat() {
    global $conn;

    $query = "SELECT * FROM obat";
    $result = mysqli_query($conn, $query);

    return $result;
  }

  function readRekamMedis() {
    global $conn;

    $query = "SELECT rekam_medis.*, pasien.nama_pasien, dokter.nama_dokter 
    FROM rekam_medis
    INNER JOIN pasien
    ON rekam_medis.id_pasien = pasien.id_pasien
    INNER JOIN dokter
    ON rekam_medis.id_dokter = dokter.id_dokter";

    $result = mysqli_query($conn, $query);

    return $result;
  }

  function readResepObat() {
    global $conn;

    $query = "SELECT resep_obat.*, obat.harga, obat.nama_obat
              FROM resep_obat
              INNER JOIN obat
              ON resep_obat.id_obat = obat.id_obat";

    $result = mysqli_query($conn, $query);

    return $result;
  }

  function readDokter() {
    global $conn;

    $query = "SELECT dokter.*, departmen.spesialisasi 
              FROM dokter
              INNER JOIN departmen
              ON dokter.id_departmen = departmen.id_departmen";

    $result = mysqli_query($conn, $query);

    return $result;
  }

  function addUser($data) {
    global $conn;

    $username = $data['username'];
    $password = $data['password'];
    $tanggal = $data['tanggal'];
    $tanggalConverted = date("Y-m-d H:i:s",strtotime($tanggal));

    $query = "INSERT INTO user VALUES('', '$username', '$password', '$tanggalConverted')";

    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
  }

?>