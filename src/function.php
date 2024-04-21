<?php
  include('config.php');

  function readObat() {
    global $conn;

    $query = "SELECT * FROM obat";
    $result = mysqli_query($conn, $query);

    return $result;
  }

  function addObat() {
    
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

  function readQuery($table, $id, $find){
    global $conn;
    $query = "SELECT * FROM ".$table." WHERE ".$id."=".$find;
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);

    return $result;
  };

  function updateDokter($data, $file){
    global $conn;

    $id = $data['id'];
    $namaDokter = $data['nama_dokter'];
    $jenisKelamin = $data['jenis_kelamin_dokter'];
    $alamat = $data['alamat_dokter'];
    $noTelp = $data['no_telp_dokter'];
    $idDepartmen = $data['departmen'];
    $namaFoto = $file['foto_dokter']['name'];


    if($namaFoto != ""){
        $namaFoto = removeBG($file);

        $query = "UPDATE dokter SET nama_dokter = '$namaDokter', jenis_kelamin_dokter = '$jenisKelamin', alamat_dokter = '$alamat', telefon_dokter = '$noTelp', id_departmen = '$idDepartmen', foto='$namaFoto' WHERE id_dokter = '$id'";
        $result = mysqli_query($conn, $query);
    } else{
        $query = "UPDATE dokter SET nama_dokter = '$namaDokter', jenis_kelamin_dokter = '$jenisKelamin', alamat_dokter = '$alamat', telefon_dokter = '$noTelp', id_departmen = '$idDepartmen' WHERE id_dokter = '$id'";
        $result = mysqli_query($conn, $query);
    }

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
  }


  function deleteDokter($id){
    global $conn;


    $query = "DELETE FROM dokter WHERE id_dokter=$id";
    $result = mysqli_query($conn, $query);


    $isSucceed = mysqli_affected_rows($conn);


    return $isSucceed;
  }

  // asdkjajldkasjldkajsdlaks - pencapaian terbesar tahun ini bisa bikin app pake api keren
  function removeBG($file) {
    // API endpoint
    $url = 'https://api.remove.bg/v1.0/removebg';
  
    // API key
    $api_key = 'foZctDa66oqMorhqr95FSKVn'; // bang jangan boros boros pakenya ya bang, cuma dijatah 50x apus bekgron sebulan:((
      // klo mau bikin akun sendiri deh trus ganti api key nya
  
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
  
?>