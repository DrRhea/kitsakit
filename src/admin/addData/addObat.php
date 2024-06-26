<?php
  include('../../function.php');

  if (isset($_POST['submit'])) {
    // jalankan query tambah record baru
    $isAddSucceed = addObat($_POST, $_FILES);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            location.href = '../obat.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Gagal menambahkan Data !');
            location.href = '../obat.php';
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

<nav class="fixed left-0 px-4 py-2 font-medium text-white bg-indigo-600 rounded-r-full top-10 w-fit">
  <a href="../obat.php" class="flex items-center">
    back?
  </a>
</nav>

<header class="flex justify-center mt-8 mb-4">
  <h1 class="text-2xl font-bold text-indigo-600">
    Tambah Data Obat
  </h1>
</header>

<main class="flex flex-col font-medium md:flex-row-reverse gap-4px">
  <img src="../../assets/img/addObat.jpg" alt="" class="hidden object-cover w-1/2 h-full rounded-l-lg md:block">
  <form action="" method="POST" class="flex flex-col items-center w-full gap-4 px-8" enctype="multipart/form-data">

    <label for="nama_obat" class="self-start w-full">Nama</label>
    <input type="text" name="nama_obat" id="nama_obat" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" placeholder="Masukan nama obat.." required>

    <label for="deskripsi" class="self-start w-full">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" rows=3" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" placeholder="Tulis Deskripsi.."></textarea required>

    <label for="harga" class="self-start w-full">Harga</label>
    <input type="text" name="harga" id="harga" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" placeholder="Masukkan harga dalam Rupiah.." pattern="[0-9]+" title="Harga harus berupa angka" required>

    <label for="stok" class="self-start w-full">Stok</label>
    <input type="number" name="stok" id="stok" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" placeholder="Masukkan jumlah stok.." required>

    <label for="foto_obat" class="self-start w-full">Foto</label>
    <input type="file" name="foto_obat" id="foto_obat" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" required>

    <div class="flex justify-center gap-8">
      <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-lg w-fit" name="submit">submit</button>
      <button type="reset" class="text-red-600 border-red-600">reset</button>
    </div>
  </form>
</main>

</body>
</html>