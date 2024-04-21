<?php
  include('./lib/header.php');
  include('./lib/nav.php');
  include('../function.php');

  $listObat = readObat();

?>

<main class="flex flex-col w-full gap-8 my-8 ml-4 mr-4 lg:ml-72">
<div class="flex flex-col gap-2 xl:flex-row" id="obat">
  <div class="flex flex-row items-center justify-between min-[1281px]:justify-start min-[1281px]:flex-col gap-4 px-8 mt-4" id="header"> 
      <h1 class="text-2xl font-bold text-center">
        <span class="text-gray-700">Rekam</span>
        <span class="text-indigo-600">Medis</span>
      </h1>
      <a href="" class="flex self-center gap-2 px-4 py-2 text-white duration-300 bg-indigo-600 rounded-full hover:bg-indigo-500 w-fit">Tambah<i class="uil uil-plus"></i></a>
  </div>
  <div class="w-full overflow-x-auto">
  <table class="w-full text-center table-auto">
    <thead>
      <tr>
        <th class="px-4 py-2">No.</th>
        <th class="px-4 py-2">Foto</th>
        <th class="px-4 py-2">Nama Obat</th>
        <th class="px-4 py-2">Deskripsi</th>
        <th class="px-4 py-2">Harga</th>
        <th class="px-4 py-2">Stok</th>
        <th class="px-4 py-2">Edit</th>
        <th class="px-4 py-2">Delete</th>
      </tr>
    </thead>
    <tbody class="font-medium">
      <?php $counter = 1; ?>
      <?php foreach($listObat as $obat): ?>
        <tr>
          <td class="px-4 py-2 border"><?= $counter ?></td>
          <td class="px-4 py-2 border">
            <img src="../assets/img/obat/<?= $obat['foto_obat'] ?>" alt="" class="h-[40px] object-cover w-full">
          </td>
          <td class="px-4 py-2 border"><?= $obat['nama_obat'] ?></td>
          <td class="px-4 py-2 border"><?= $obat['deskripsi'] ?></td>
          <td class="px-4 py-2 border">Rp<?= number_format($obat['harga'],0,"",".") ?></td>
          <td class="px-4 py-2 border"><?= $obat['stok'] ?></td>
          <td class="px-4 py-2 border"><i class="uil uil-edit-alt"></i></td>
          <td class="px-4 py-2 border"><i class="uil uil-trash"></i></td>
        </tr>
      <?php $counter++; ?>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
</div>

</main>

<?php
    include('lib/footer.php')
?>