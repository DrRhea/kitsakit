<?php
  include('config.php');
  use GuzzleHttp\Client;

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

  function readPasien() {
    global $conn;

    $query = "SELECT * FROM pasien";

    $result = mysqli_query($conn, $query);

    return $result;
  }

  function readResepObat($id) {
    global $conn;

    $query = "SELECT resep_obat.*, obat.harga, obat.nama_obat
              FROM resep_obat
              INNER JOIN obat
              ON resep_obat.id_obat = obat.id_obat
              WHERE resep_obat.id_rekam_medis = $id";

    $result = mysqli_query($conn, $query);

    return $result;
  }

  function readDepartmen() {
    global $conn;

    $query = "SELECT * FROM departmen";

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

  // function addDokter($data, $file) {
  //   global $conn;

  //   // Atur API Key untuk remove.bg
  //   $apiKey = 'SRgF1sg5nyWfYJX7XZupthNb';

  //   // Konfigurasi CURL untuk menghapus latar belakang gambar
  //   $ch = curl_init();
  //   curl_setopt($ch, CURLOPT_URL, 'https://api.remove.bg/v1.0/removebg');
  //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  //   curl_setopt($ch, CURLOPT_HTTPHEADER, [
  //       'X-API-Key: ' . $apiKey,
  //   ]);
  //   curl_setopt($ch, CURLOPT_POSTFIELDS, [
  //       'image_file' => new CURLFile($file['foto_dokter']['tmp_name']),
  //       'size' => 'auto',
  //   ]);

  //   // Check for errors during the request
  //   if (curl_errno($ch)) {
  //       echo 'Error: ' . curl_error($ch);
  //       curl_close($ch);
  //       return false;
  //   }

  //   $response = curl_exec($ch);
  //   curl_close($ch);

  //   // Check if the response is an error
  //   $responseData = json_decode($response, true);
  //   if (isset($responseData['error'])) {
  //       echo 'Error: ' . $responseData['error']['message'];
  //       return false;
  //   }

  //   // Pindahkan file dengan latar belakang yang dihapus ke direktori yang diinginkan
  //   $namaFoto = $file['foto_dokter']['name'];
  //   $tempNamaFoto = $file['foto_dokter']['tmp_name'];
  //   $direktori = '../../assets/img/doctors/'.$namaFoto;
  //   $isMoved = move_uploaded_file($tempNamaFoto, $direktori);
  //   if (!$isMoved) {
  //       $namaFoto = 'default.jpg';
  //   }

  //   // Ambil data dari form
  //   $namaDokter = $data['nama_dokter'];
  //   $jenisKelamin = $data['jenis_kelamin_dokter'];
  //   $alamat = $data['alamat_dokter'];
  //   $noTelp = $data['no_telp_dokter'];
  //   $idDepartmen = $data['departmen'];

  //   // Tambahkan data dokter ke database
  //   $query = "INSERT INTO dokter VALUES('', '$namaDokter', '$jenisKelamin', '$alamat', '$noTelp', '$namaFoto', '$idDepartmen')";
  //   $result = mysqli_query($conn, $query);

  //   // Cek apakah penambahan berhasil
  //   $isSucceed = mysqli_affected_rows($conn);

  //   return $isSucceed;
  // }

  function addDokter($data, $file){
    global $conn;

    $namaFoto = removeBG($file); // Nama file setelah latar belakang dihapus

    // Mendapatkan data lain dari $data
    $namaDokter = $data['nama_dokter'];
    $jenisKelamin = $data['jenis_kelamin_dokter'];
    $alamat = $data['alamat_dokter'];
    $noTelp = $data['no_telp_dokter'];
    $idDepartmen = $data['departmen'];

    // Query untuk menambah data dokter ke database
    $query = "INSERT INTO dokter VALUES('', '$namaDokter', '$jenisKelamin', '$alamat', '$noTelp', '$namaFoto', '$idDepartmen')";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
}

  function removeBG($file) {
    // API endpoint
    $url = 'https://api.remove.bg/v1.0/removebg';

    // API key
    $api_key = 'foZctDa66oqMorhqr95FSKVn';

    // Path to the image file
    $image_file_path = $file['foto_dokter']['tmp_name']; // Path to uploaded image file

    $unique_filename = uniqid('doctors-') . '.png';

    // Request headers
    $headers = array(
        'X-API-Key: ' . $api_key
    );

    // Request body
    $fields = array(
        'image_file' => new CURLFile($image_file_path),
        'size' => 'auto'
    );

    // Initialize curl session
    $ch = curl_init();

    // Set curl options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute curl session
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        // Handle error
        echo 'Curl error: ' . curl_error($ch);
    } else {
        // Save the response as a file
        $direktori = '../../assets/img/doctors/';
        file_put_contents($direktori . $unique_filename, $response);
    }

    // Close curl session
    curl_close($ch);

    // Return the unique filename
    return $unique_filename;
  }



  function deleteDokter($id){
    global $conn;


    $query = "DELETE FROM dokter WHERE id_dokter=$id";
    $result = mysqli_query($conn, $query);


    $isSucceed = mysqli_affected_rows($conn);


    return $isSucceed;
  }



?>