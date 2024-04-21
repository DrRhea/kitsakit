<?php
  include('../../function.php');

  $listDepartmen = readDepartmen();

  if(isset($_GET['id_dokter'])){
    $idDokter = $_GET['id_dokter'];
    $data = readQuery('dokter', 'id_dokter', $idDokter);
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
    $isAddSucceed = updateDokter($_POST, $_FILES);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil diubah');
            location.href = '../dokter.php';
        </script>";
    } else {
        echo "
        <script>
          alert('Tidak ada data yang diperbaharui !');
          location.href = '../dokter.php';
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
  <title>Tambah Data Dokter</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  
</head>
<body class="text-gray-800 font-['Poppins'] relative bg-gray-50 overflow-x-hidden flex flex-col gap-4">

<nav class="fixed left-0 top-10 px-4 py-2 rounded-r-full w-fit font-medium bg-indigo-600 text-white">
  <a href="../dokter.php" class="flex items-center">
    back?
  </a>
</nav>

<header class="flex justify-center mt-8 mb-4">
  <h1 class="text-2xl font-bold text-indigo-600">
    Ubah Data Dokter
  </h1>
</header>

<main class="font-medium flex flex-col md:flex-row gap-4px">
  <img src="../../assets/img/updateData.jpg" alt="" class="object-cover hidden md:block w-1/2 h-full rounded-r-lg">
  <form action="" method="POST" class="flex items-center px-8 w-full flex-col gap-4" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?= $data['id_dokter'] ?>">
    <label for="nama_dokter" class="self-start w-full">Nama</label>
    <input type="text" name="nama_dokter" id="nama_dokter" class="outline-none w-full bg-gray-200 px-4 py-2 rounded-md" placeholder="Masukan nama anda.." value="<?= $data['nama_dokter']?>" required>

    <label for="no_telp_dokter" class="self-start w-full">Nomor Telefon</label>
    <input type="tel" name="no_telp_dokter" id="no_telp_dokter" pattern="08[0-9]{10,11}" class="outline-none w-full bg-gray-200 px-4 py-2 rounded-md" placeholder="Format : 08xxxxxxxx" value="<?= $data['telefon_dokter']?>" required>

    <label for="alamat_dokter" class="self-start w-full">Alamat</label>
    <textarea name="alamat_dokter" id="alamat_dokter" rows=3" class="outline-none w-full bg-gray-200 px-4 py-2 rounded-md" placeholder="Masukan alamat anda.." required><?= $data['alamat_dokter']?></textarea>

    <label for="jenis_kelamin_dokter" class="self-start w-full">Jenis Kelamin</label>
    <select name="jenis_kelamin_dokter" id="jenis_kelamin_dokter" class="outline-none w-full bg-gray-200 px-4 py-2 rounded-md" placeholder="Pilih" required>
      <option value="L" <?= $data['jenis_kelamin_dokter'] == "L" ? "selected" : "" ?> >Laki - Laki</option>
      <option value="P" <?= $data['jenis_kelamin_dokter'] == "P" ? "selected" : "" ?> >Perempuan</option>
    </select>

    <label for="departmen" class="self-start w-full">Departmen</label>
    <select name="departmen" id="departmen" class="outline-none w-full bg-gray-200 px-4 py-2 rounded-md" required>
      <?php foreach($listDepartmen as $departmen): ?>
        <option value="<?= $departmen['id_departmen'] ?>" <?= $data['id_departmen'] == $departmen['id_departmen'] ? "selected" : "" ?> ><?= $departmen['nama_departmen'] ?></option>
      <?php endforeach;?>
    </select>

    <label for="foto_dokter" class="self-start w-full">Foto</label>
    <img src="../../assets/img/doctors/<?=$data['foto'] ?>" alt="" class="w-[200px]">
    <input type="file" name="foto_dokter" id="foto_dokter" class="outline-none w-full bg-gray-200 px-4 py-2 rounded-md" required>

    <div class="flex justify-center gap-8">
      <button type="submit" class="w-fit px-4 py-2 bg-indigo-600 text-white rounded-lg" name="submit">submit</button>
      <button type="reset" class="text-red-600 border-red-600">reset</button>
    </div>
  </form>
</main>

</body>
</html>