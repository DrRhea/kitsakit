<?php
  include('./lib/header.php');
  include('./lib/nav.php');
  include('../function.php');

  $listDokter = readDokter();

?>

<main class="flex flex-col w-full gap-8 my-8 ml-4 mr-4 lg:ml-72">
<div class="flex flex-col gap-2 xl:flex-row" id="dokter">
  <div class="flex flex-row items-center justify-between min-[1281px]:justify-start min-[1281px]:flex-col gap-4 px-8 mt-4" id="header"> 
      <h1 class="text-2xl font-bold text-center">
        <span class="text-indigo-600">Dokter</span>
      </h1>
      <a href="./addData/addDokter.php" class="flex self-center gap-2 px-4 py-2 text-white duration-300 bg-indigo-600 rounded-full hover:bg-indigo-500 w-fit">Tambah<i class="uil uil-plus"></i></a>
  </div>
  <div class="flex w-full overflow-x-auto">
  <table class="w-full text-center table-auto">
    <thead>
      <tr>
        <th class="px-4 py-2">No.</th>
        <th class="px-4 py-2">Foto</th>
        <th class="px-4 py-2">Nama Dokter</th>
        <th class="px-4 py-2">Spesialisasi</th>
        <th class="px-4 py-2">Edit</th>
        <th class="px-4 py-2">Delete</th>
      </tr>
    </thead>
    <tbody class="font-medium">
      <?php $counter = 1; ?>
      <?php foreach($listDokter as $dokter): ?>
        <tr>
          <td class="px-4 py-2 border"><?= $counter ?></td>
          <td class="px-4 py-2 border"><img src="../assets/img/doctors/<?= $dokter['foto'] ?>" alt="" class="mx-auto h-[50px] object-cover bg-indigo-600 w-[50px] rounded-full"></td>
          <td class="px-4 py-2 border"><?= $dokter['nama_dokter'] ?></td>
          <td class="px-4 py-2 border"><?= $dokter['spesialisasi'] ?></td>
          <td class="px-4 py-2 border"><i class="uil uil-edit-alt"></i></td>
          <td class="px-4 py-2 border"><a href="deleteData/delete.php?id=<?=$dokter['id_dokter']?>"><i class="uil uil-trash"></a></i></td>
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