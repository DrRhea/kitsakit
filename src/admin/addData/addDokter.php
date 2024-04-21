<?php
  include('../../function.php');

  $listDepartmen = readDepartmen();

  if (isset($_POST['submit'])) {
    // jalankan query tambah record baru
    $isAddSucceed = addDokter($_POST, $_FILES);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            
        </script>";
    } else {
        echo "
        <script>
            alert('Gagal menambahkan Data !');
            
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
<body class="text-gray-800 font-['Poppins'] flex relative bg-gray-50 overflow-x-hidden px-4 flex flex-col gap-4">

<nav class="fixed left-0 top-10 py-2 px-4 rounded-r-full w-fit font-medium bg-indigo-600 text-white">
  <a href="../dokter.php" class="flex items-center">
    back?
  </a>
</nav>

<header class="flex justify-center mt-8 mb-4">
  <h1 class="text-2xl font-bold text-indigo-600">
    Tambah Data Dokter
  </h1>
</header>

<main class="mt-4 font-medium">
  <form action="" method="POST" class="flex flex-col gap-4" enctype="multipart/form-data">
    <label for="nama_dokter">Nama</label>
    <input type="text" name="nama_dokter" id="nama_dokter" class="outline-none bg-gray-200 px-4 py-2 rounded-md" placeholder="Masukan nama anda..">

    <label for="no_telp_dokter">Nomor Telefon</label>
    <input type="tel" name="no_telp_dokter" id="no_telp_dokter" pattern="08[0-9]{10,11}" class="outline-none bg-gray-200 px-4 py-2 rounded-md" placeholder="Format : 08xxxxxxxx">

    <label for="alamat_dokter">Alamat</label>
    <textarea name="alamat_dokter" id="alamat_dokter" rows=3" class="outline-none bg-gray-200 px-4 py-2 rounded-md" placeholder="Masukan alamat anda.."></textarea>

    <label for="jenis_kelamin_dokter">Jenis Kelamin</label>
    <select name="jenis_kelamin_dokter" id="jenis_kelamin_dokter" class="outline-none bg-gray-200 px-4 py-2 rounded-md" placeholder="Pilih">
      <option selected hidden>Pilih</option>
      <option value="L">Laki - Laki</option>
      <option value="P">Perempuan</option>
    </select>

    <label for="departmen">Departmen</label>
    <select name="departmen" id="departmen" class="outline-none bg-gray-200 px-4 py-2 rounded-md">
      <option selected hidden>Pilih</option>
      <?php foreach($listDepartmen as $departmen): ?>
        <option value="<?= $departmen['id_departmen'] ?>" ><?= $departmen['nama_departmen'] ?></option>
      <?php endforeach;?>
    </select>

    <label for="foto_dokter">Foto</label>
    <input type="file" name="foto_dokter" id="foto_dokter" class="outline-none bg-gray-200 px-4 py-2 rounded-md">

    <div class="flex justify-center gap-4">
      <button type="submit w-fit px-4 py-2 bg-indigo-600" name="submit">submit</button>
      <button type="reset">reset</button>
    </div>
  </form>
</main>

</body>
</html>