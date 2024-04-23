<?php
  include('config.php');

  function readObat() {
    global $conn;

    $query = "SELECT * FROM obat";
    $result = mysqli_query($conn, $query);

    return $result;
  }

  function addObat($data, $file) {
    global $conn;


    $namaFoto = $file['foto_obat']['name'];
    $tempNamaFoto = $file['foto_obat']['tmp_name'];
    $direktori = '../../assets/img/obat/'.$namaFoto;
    $isMoved = move_uploaded_file($tempNamaFoto, $direktori);
    if(!$isMoved){
        $namaFoto = 'default.jpg';
    }

    $namaObat = $data['nama_obat'];
    $deskripsi = $data['deskripsi'];
    $harga = $data['harga'];
    $stok = $data['stok'];

    $query = "INSERT INTO obat VALUES('', '$namaObat', '$deskripsi', '$harga', '$stok', '$namaFoto')";
    $result = mysqli_query($conn, $query);
  
    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
  }

  function updateObat($data, $file){
    global $conn;


    $id = $data['id'];
    $namaObat = $data['nama_obat'];
    $deskripsi = $data['deskripsi'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $namaFoto = $file['foto_obat']['name'];


    if($namaFoto != ""){
        $tempNamaFoto = $file['foto_obat']['tmp_name'];
        $direktori = '../../assets/img/obat/'.$namaFoto;
        move_uploaded_file($tempNamaFoto, $direktori);

        $query = "UPDATE obat SET nama_obat = '$namaObat', deskripsi = '$deskripsi', harga = '$harga', stok = '$stok', foto='$namaFoto' WHERE id_obat = '$id'";
        $result = mysqli_query($conn, $query);
    } else{
        $query = "UPDATE obat SET nama_obat = '$namaObat', deskripsi = '$deskripsi', harga = '$harga', stok = '$stok' WHERE id_obat = '$id'";
        $result = mysqli_query($conn, $query);
    }

    $isSucceed = mysqli_affected_rows($conn);
    return $isSucceed;
  }


  function deleteObat($id) {
    global $conn;

    $query = "DELETE FROM obat WHERE id_obat=$id";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
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

  function addRekamMedis($data){
    global $conn;

    // Mendapatkan data lain dari $data
    $idPasien = $data['id_pasien'];
    $idDokter = $data['id_dokter'];
    $diagnosa = $data['diagnosa'];
    $tanggal = $data['tanggal'];
    $catatan = $data['catatan'];

    // Query untuk menambah data rekamMedis ke database
    $query = "INSERT INTO rekam_medis VALUES('', '$tanggal', '$diagnosa', '$catatan', '$idDokter', '$idPasien')";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
  }

  function updateRekamMedis($data){
    global $conn;

    $id = $data['id'];
    $idPasien = $data['id_pasien'];
    $idDokter = $data['id_dokter'];
    $diagnosa = $data['diagnosa'];
    $tanggal = $data['tanggal'];
    $catatan = $data['catatan'];

    $query = "UPDATE rekam_medis SET 
              tanggal = '$tanggal',
              diagnosa = '$diagnosa',
              catatan = '$catatan',
              id_dokter = '$idDokter',
              id_pasien = '$idPasien' 
              WHERE id_rekam_medis = '$id'";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
  }

  function deleteRekamMedis($id) {
    global $conn;

    $query = "DELETE FROM rekam_medis WHERE id_rekam_medis=$id";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
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

  function addResepObat($data, $idRekamMedis) {
    global $conn;

    $idObat = $data['id_obat'];
    $jumlah = $data['jumlah'];
    $instruksi = $data['instruksi'];

    $query = "INSERT INTO resep_obat VALUES('', '$jumlah', '$instruksi', '$idRekamMedis', '$idObat')";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
  }

  function updateResepObat($data) {
    global $conn;

    $id = $data['id'];
    $idObat = $data['id_obat'];
    $jumlah = $data['jumlah'];
    $instruksi = $data['instruksi'];

    $query = "UPDATE resep_obat SET 
              jumlah = '$jumlah',
              instruksi = '$instruksi',
              id_obat = '$idObat'
              WHERE id_resep_obat = '$id'";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
  }

  function deleteResepObat($id) {
    global $conn;

    $query = "DELETE FROM resep_obat WHERE id_resep_obat=$id";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
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