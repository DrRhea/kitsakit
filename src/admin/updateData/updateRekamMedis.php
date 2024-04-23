<?php
  include('../../function.php');

  $listDokter = readDokter();
  $listPasien = readPasien();

  if(isset($_GET['id'])){
    $idRekamMedis = $_GET['id'];
    $data = readQuery('rekam_medis', 'id_rekam_medis', $idRekamMedis);
    if(!count($data)){
      echo "
      <script>
        alert('Data tidak ditemukan pada database');
        window.location='admin.php';
      </script>";
    }
  } else {
    echo "
    <script>
      alert('Masukkan data id.');
      window.location='admin.php';
    </script>";
  } 

  if (isset($_POST['submit'])) {
    // jalankan query edit record baru
    $isAddSucceed = updateRekamMedis($_POST);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil diubah');
            location.href = '../rekamMedis.php';
        </script>";
    } else {
        echo "
        <script>
          alert('Tidak ada data yang diperbaharui !');
          location.href = '../rekamMedis.php';
        </script>
        ";
    }
  }

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Rekam Medis</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  
</head>
<body class="text-gray-800 font-['Poppins'] relative bg-gray-50 overflow-x-hidden flex flex-col gap-4">

<nav class="fixed left-0 px-4 py-2 font-medium text-white bg-indigo-600 rounded-r-full top-10 w-fit">
  <a href="../rekamMedis.php?id=0" class="flex items-center">
    back?
  </a>
</nav>

<header class="flex justify-center mt-8 mb-4">
  <h1 class="text-2xl font-bold text-indigo-600">
    Tambah Data Rekam Medis
  </h1>
</header>

<main class="flex flex-col font-medium md:flex-row gap-4px">
  <img src="../../assets/img/addObat.jpg" alt="" class="hidden object-cover w-1/2 h-full rounded-l-lg md:block">
  <form action="" method="POST" class="flex flex-col items-center w-full gap-4 px-8" enctype="multipart/form-data">

  <input type="hidden" name="id" id="id" value="<?= $data['id_rekam_medis'] ?>">
    
  <label for="id_pasien" class="self-start w-full">Pasien</label>
    <select name="id_pasien" id="id_pasien" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" required>
      <?php foreach($listPasien as $pasien): ?>
        <option value="<?= $pasien['id_pasien'] ?>" <?= ($pasien['id_pasien'] == $data['id_pasien']) ? "selected" : "" ?> ><?= $pasien['nama_pasien']?></option>
      <?php endforeach;?>
    </select>
    
  <label for="id_dokter" class="self-start w-full">Dokter</label>
    <select name="id_dokter" id="id_dokter" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" required>
      <?php foreach($listDokter as $dokter): ?>
        <option value="<?= $dokter['id_dokter'] ?>" <?= ($dokter['id_dokter'] == $data['id_dokter']) ? "selected" : "" ?> ><?= $dokter['nama_dokter'] ?></option>
      <?php endforeach;?>
    </select>
    
    <label for="tanggal" class="self-start w-full">Tanggal</label>
        <input type="datetime-local" name="tanggal" id="tanggal" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" value="<?= $data['tanggal'] ?>" required>

    <label for="diagnosa" class="self-start w-full">Diagnosa</label>
    <input type="text" name="diagnosa" id="diagnosa" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" value="<?= $data['diagnosa'] ?>" placeholder="Tulis diagnosa.." required>

    <label for="catatan" class="self-start w-full">Catatan</label>
    <textarea name="catatan" id="catatan" rows=3" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" placeholder="Tulis catatan.."><?= $data['catatan'] ?></textarea required>


    <div class="flex justify-center gap-8">
      <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-lg w-fit" name="submit">submit</button>
      <button type="reset" class="text-red-600 border-red-600">reset</button>
    </div>
  </form>
</main>

</body>
</html>