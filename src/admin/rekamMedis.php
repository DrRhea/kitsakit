<?php
  include('./lib/header.php');
  include('./lib/nav.php');
  include('../function.php');

  $listRekamMedis = readRekamMedis();
  $listResepObat = readResepObat($_GET['id']);
?>

<main class="flex flex-col w-full gap-8 my-8 ml-4 mr-4 lg:ml-72">
  <div class="flex flex-col gap-2 xl:flex-row" id="rekamMedis">
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
        <th class="px-4 py-2">Nama Pasien</th>
        <th class="px-4 py-2">Nama Dokter</th>
        <th class="px-4 py-2">Tanggal</th>
        <th class="px-4 py-2">Diagnosa</th>
        <th class="px-4 py-2">Catatan</th>
        <th class="px-4 py-2">Resep Obat</th>
        <th class="px-4 py-2">Edit</th>
        <th class="px-4 py-2">Delete</th>
      </tr>
    </thead>
    <tbody class="font-medium">
      <?php $counter = 1; ?>
      <?php foreach($listRekamMedis as $rekamMedis): ?>
        <tr class="<?= ($_GET['id'] == $rekamMedis['id_rekam_medis']) ? 'bg-indigo-600 text-white' : ''; ?>">
          <td class="px-4 py-2 border"><?= $counter ?></td>
          <td class="px-4 py-2 border"><?= $rekamMedis['nama_pasien'] ?></td>
          <td class="px-4 py-2 border"><?= $rekamMedis['nama_dokter'] ?></td>
          <td class="px-4 py-2 border"><?= $tanggalConverted = date("Y-m-d H:i:s",strtotime($rekamMedis['tanggal'])); ?></td>
          <td class="px-4 py-2 border"><?= $rekamMedis['diagnosa'] ?></td>
          <td class="px-4 py-2 border"><?= $rekamMedis['catatan'] ?></td>
          <td class="px-4 py-2 border"><a href="?id=<?= $rekamMedis['id_rekam_medis']?>#resepObat"><i class="uil uil-prescription-bottle"></i></a></td>
          <td class="px-4 py-2 border"><i class="uil uil-edit-alt"></i></td>
          <td class="px-4 py-2 border"><i class="uil uil-trash"></i></td>
        </tr>
      <?php $counter++; ?>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
</div>

<hr> 

  <div class="flex flex-col gap-2 xl:flex-row" id="resepObat">
  <div class="flex flex-row items-center justify-between min-[1281px]:justify-start min-[1281px]:flex-col gap-4 px-8 mt-4" id="header"> 
        <h1 class="text-2xl font-bold text-center">
          <span class="text-gray-700">Resep</span>
          <span class="text-indigo-600">Obat</span>
        </h1>
        <a href="" class="flex self-center gap-2 px-4 py-2 text-white duration-300 bg-indigo-600 rounded-full hover:bg-indigo-500 w-fit">Tambah<i class="uil uil-plus"></i></a>
    </div>
  <?php if($_GET['id'] != 0): ?>
  <div class="w-full overflow-x-auto">
  <table class="w-full text-center table-auto">
    <thead>
      <tr>
        <th class="px-4 py-2">No.</th>
        <th class="px-4 py-2">Nama Obat</th>
        <th class="px-4 py-2">Instruksi</th>
        <th class="px-4 py-2">Jumlah</th>
        <th class="px-4 py-2">Harga Satuan</th>
        <th class="px-4 py-2">Harga Total</th>
        <th class="px-4 py-2">Back</th>
        <th class="px-4 py-2">Edit</th>
        <th class="px-4 py-2">Delete</th>
      </tr>
    </thead>
    <tbody class="font-medium">
      <?php $counter = 1; $totalHarga = 0;?>
      <?php foreach($listResepObat as $resepObat): ?>
        <tr class="">
          <td class="px-4 py-2 border"><?= $counter ?></td>
          <td class="px-4 py-2 border"><?= $resepObat['nama_obat'] ?></td>
          <td class="px-4 py-2 border"><?= $resepObat['instruksi'] ?></td>
          <td class="px-4 py-2 border"><?= $resepObat['jumlah'] ?></td>
          <td class="px-4 py-2 border">Rp<?=number_format($resepObat['harga'],0,"",".")?></td>
          <td class="px-4 py-2 border">Rp<?=number_format($resepObat['harga'] * $resepObat['jumlah'],0,"",".")?></td>
          <td class="px-4 py-2 border"><a href="?id=0#rekamMedis"><i class="uil uil-step-backward-alt"></i></a></td>
          <td class="px-4 py-2 border"><i class="uil uil-edit-alt"></i></td>
          <td class="px-4 py-2 border"><i class="uil uil-trash"></i></td>
        </tr>
      <?php $counter++; $totalHarga += $resepObat['harga'] * $resepObat['jumlah'];?>
      <?php endforeach;?>
        <tr class="text-white">
          <td colspan="4"></td>
          <td class="bg-gray-600 border">
            Total
          </td>
            <td class='py-2 bg-gray-600 border'>
              Rp<?=number_format($totalHarga,0,"",".")?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php endif; ?>
</div>
</main>

<?php
    include('lib/footer.php')
?>