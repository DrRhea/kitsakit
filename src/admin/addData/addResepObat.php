<?php
  include('../../function.php');

  $listObat = readObat();
  
  if (isset($_POST['submit'])) {
    // jalankan query tambah record baru
    $isAddSucceed = addResepObat($_POST, $_GET['id']);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        $id = $_GET['id'];
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            location.href = '../rekamMedis.php?id=$id';
        </script>";
    } else {
        echo "
        <script>
            alert('Gagal menambahkan Data !');
            location.href = '../rekamMedis.php?id=$id';
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
    Tambah Data Resep Obat
  </h1>
</header>

<main class="flex flex-col font-medium md:flex-row-reverse gap-4px">
  <img src="../../assets/img/addObat.jpg" alt="" class="hidden object-cover w-1/2 h-full rounded-l-lg md:block">
  <form action="" method="POST" class="flex flex-col items-center w-full gap-4 px-8" enctype="multipart/form-data">
    
    <label for="id_obat" class="self-start w-full">Obat</label>
    <select name="id_obat" id="id_obat" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" required>
      <option selected hidden>Pilih</option>
      <?php foreach($listObat as $obat): ?>
        <option value="<?= $obat['id_obat'] ?>" ><?= $obat['nama_obat'] ?></option>
      <?php endforeach;?>
    </select>

    <label for="jumlah" class="self-start w-full">Jumlah</label>
    <input type="number" name="jumlah" id="jumlah" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" placeholder="Cantumkan jumlah.." min="0" required>

    <label for="instruksi" class="self-start w-full">instruksi</label>
    <textarea name="instruksi" id="instruksi" rows=3" class="w-full px-4 py-2 bg-gray-200 rounded-md outline-none" placeholder="Tulis instruksi.."></textarea required>


    <div class="flex justify-center gap-8">
      <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-lg w-fit" name="submit">submit</button>
      <button type="reset" class="text-red-600 border-red-600">reset</button>
    </div>
  </form>
</main>

</body>
</html>