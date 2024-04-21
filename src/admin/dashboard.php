<?php
  include('./lib/header.php');
  include('./lib/nav.php');
  include('../function.php');

  $listRekamMedis = readRekamMedis();
  $listDokter = readDokter();
  $listPasien = readPasien();
  $listObat = readObat();
?>
  
  <main class="flex flex-col w-full gap-8 my-8 ml-4 mr-4 lg:ml-72">
    <div class="flex flex-col items-center self-center justify-center gap-4 px-8 lg:flex-row lg:justify-between w-fit lg:w-full" id="header"> 
      <h1 class="text-2xl font-bold">
        <span class="text-gray-700">Welcome, </span>
        <span class="text-indigo-600">Dr. You</span>
      </h1>
      <div class="flex flex-col-reverse items-center gap-4 p-2 rounded-full shadow-sm lg:flex-row">
        <form action="" class="flex items-center gap-2 px-4 font-medium bg-gray-200 rounded-full">
          <button>
            <i class="text-lg text-indigo-600 uil uil-search"></i>
          </button>
          <input type="text" class="bg-gray-200 outline-none" placeholder="Search...">
        </form>
        <div class="flex self-center gap-2 text-2xl text-indigo-600">
          <i class="cursor-pointer uil uil-bell"></i>
          <i class="cursor-pointer uil uil-moon"></i>
          <i class="cursor-pointer uil uil-info-circle"></i>
        </div>
        <img src="../assets/img/doctors/doctors-1.png" alt="" class="rounded-full lg:w-[40px] lg:h-[40px] w-[100px] h-[100px] object-cover bg-indigo-600 ">
      </div>
    </div>
    <div class="flex flex-wrap self-center justify-center w-full gap-4 lg:justify-start lg:self-start">
      <div class="flex w-full gap-4 px-8 py-4 rounded-lg shadow-md lg:w-fit">
        <i class="self-center text-3xl text-indigo-600 uil uil-user-check"></i>
        <div class="flex flex-col">
          <span class="text-2xl font-bold">3000</span>
          <span class="font-medium">Patients Treated</span>
        </div>
      </div>
      <div class="flex w-full gap-4 px-8 py-4 rounded-lg shadow-md lg:w-fit">
        <i class="self-center text-3xl text-indigo-600 uil uil-award"></i>
        <div class="flex flex-col">
          <span class="text-2xl font-bold">Ratings</span>
          <span class="font-medium">
          <i class='text-indigo-600 bx bxs-star'></i>
          <i class='text-indigo-600 bx bxs-star'></i>
          <i class='text-indigo-600 bx bxs-star'></i>
          <i class='text-indigo-600 bx bxs-star'></i>
          <i class='text-indigo-600 bx bxs-star-half' ></i>
            (102)
          </span>
        </div>
      </div>
    </div>

    <div class="flex flex-wrap justify-center gap-8 mt-4 font-medium text-indigo-600 lg:hidden">
      <a href="rekamMedis.php?id=0" class="grow">
        <div class="flex flex-col items-center gap-4 p-16 duration-500 rounded-lg shadow-lg hover:text-white hover:bg-indigo-600">
          <i class="text-4xl uil uil-file-medical"></i>
          <p class="">Rekam Medis</p>
        </div>
      </a>
      <a href="obat.php" class="grow">
        <div class="flex flex-col items-center gap-4 p-16 duration-500 rounded-lg shadow-lg hover:text-white hover:bg-indigo-600">
          <i class="text-4xl uil uil-tablets"></i>
          <p class="">Obat</p>
        </div>
      </a>
      <a href="dokter.php" class="grow">
        <div class="flex flex-col items-center gap-4 p-16 duration-500 rounded-lg shadow-lg hover:text-white hover:bg-indigo-600">
          <i class="text-4xl uil uil-user-md"></i>
          <p class="">Dokter</p>
        </div>
      </a>
    </div>

    <div class="flex-wrap hidden w-full gap-8 lg:flex">

    <!-- Rekam Medis -->
    <div class="flex flex-col p-8 rounded-lg shadow-md bg-gray-50 grow" id="rekam_medis">
        <h3 class="mb-4 text-2xl font-bold text-indigo-600">Rekam Medis</h3>
          <table class="font-medium table-auto">
            <tr class="text-center text-gray-500">
              <th class="px-4 py-2 font-medium">Nama Pasien</th>
              <th class="px-4 py-2 font-medium">Nama Dokter</th>
              <th class="px-4 py-2 font-medium">Tanggal</th>
              <th class="px-4 py-2 font-medium">Diagnosa</th>
            </tr>
            <?php $counter = 1; foreach ($listRekamMedis as $rekamMedis): ?>
              <?php if ($counter > 3) break; ?>
              <tr class="text-center rounded-full shadow-sm">
                <td class="px-4 py-2 truncate"><?= $rekamMedis['nama_pasien'] ?></td>
                <td class="px-4 py-2 truncate"><?= $rekamMedis['nama_dokter'] ?></td>
                <td class="px-4 py-2 truncate"><?= date('m/j', strtotime($rekamMedis['tanggal'])) ?></td>
                <td class="px-4 py-2 truncate"><?= $rekamMedis['diagnosa'] ?></td>
              </tr>
              <?php $counter++; ?>
            <?php endforeach; ?>
          </table>
          <a href="rekamMedis.php?id=0" class="flex items-end self-end h-full mt-4 font-medium text-gray-500 duration-300 hover:text-gray-400 w-fit">See More</a>
      </div>

      <!-- Dokter -->
      <div class="flex flex-col p-8 rounded-lg shadow-md grow" id="dokter">
        <h3 class="mb-4 text-2xl font-bold text-indigo-600 bg-gray-50">Dokter</h3>
          <table class="font-medium ">
            <tr class="text-center text-gray-500">
              <th class="px-4 py-2 font-medium"></th>
              <th class="px-4 py-2 font-medium">Nama Dokter</th>
              <th class="px-4 py-2 font-medium">Tanggal</th>
              <th class="px-4 py-2 font-medium">Kontak</th>
            </tr>
            <?php $counter = 1; foreach ($listDokter as $dokter): ?>
              <?php if ($counter > 3) break; ?>
              <tr class="text-center rounded-full shadow-sm">
                <td class="flex justify-center px-4 py-2"><img src="../assets/img/doctors/<?= $dokter['foto'] ?>" alt="" class="rounded-full w-[40px] h-[40px] object-cover bg-indigo-600"></td>
                <td class="px-4 py-2 truncate"><?= $dokter['nama_dokter'] ?></td>
                <td class="px-4 py-2 truncate"><?= $dokter['spesialisasi'] ?></td>
                <td class="px-4 py-2 truncate"><?= $dokter['telefon_dokter'] ?></td>
              </tr>
              <?php $counter++; ?>
            <?php endforeach; ?>
          </table>
          <a href="" class="flex items-end self-end h-full mt-4 font-medium text-gray-500 duration-300 hover:text-gray-400 w-fit">See More</a>
      </div>

      <!-- Pasien -->
      <div class="flex flex-col p-8 rounded-lg shadow-md grow" id="pasien">
        <h3 class="mb-4 text-2xl font-bold text-indigo-600">Pasien</h3>
          <table class="font-medium">
            <tr class="text-center text-gray-500">
              <th class="px-4 py-2 font-medium">Nama Pasien</th>
              <th class="px-4 py-2 font-medium">Tanggal Lahir</th>
              <th class="px-4 py-2 font-medium">Alamat</th>
              <th class="px-4 py-2 font-medium">Kontak</th>
            </tr>
            <?php $counter = 1; foreach ($listPasien as $pasien): ?>
              <?php if ($counter > 3) break; ?>
              <tr class="text-center rounded-full shadow-sm">
                <td class="px-4 py-2 truncate"><?= $pasien['nama_pasien'] ?></td>
                <td class="px-4 py-2 truncate"><?= date('j/m/y', strtotime($pasien['tanggal_lahir_pasien'])) ?></td>
                <td class="px-4 py-2 truncate"><?= $pasien['alamat_pasien'] ?></td>
                <td class="px-4 py-2 truncate"><?= $pasien['kontak_pasien'] ?></td>
              </tr>
              <?php $counter++; ?>
            <?php endforeach; ?>
          </table>
          <a href="" class="flex items-end self-end h-full mt-4 font-medium text-gray-500 duration-300 hover:text-gray-400 w-fit">See More</a>
      </div>
      
      <!-- Obat -->
      <div class="flex flex-col p-8 rounded-lg shadow-md grow" id="obat">
        <h3 class="mb-4 text-2xl font-bold text-indigo-600">Obat</h3>
          <table class="font-medium">
            <tr class="text-center text-gray-500">
              <th class="px-4 py-2 font-medium"></th>
              <th class="px-4 py-2 font-medium">Nama Obat</th>
              <th class="px-4 py-2 font-medium">Harga</th>
              <th class="px-4 py-2 font-medium">Stok</th>
            </tr>
            <?php $counter = 1; foreach ($listObat as $obat): ?>
              <?php if ($counter > 3) break; ?>
              <tr class="text-center rounded-full shadow-sm">
                <td class="flex justify-center px-4 py-2"><img src="../assets/img/obat/<?= $obat['foto_obat'] ?>" alt="" class="rounded-full w-[40px] h-[40px] object-cover border-indigo-600 border-2"></td>
                <td class="px-4 py-2 truncate"><?= $obat['nama_obat'] ?></td>
                <td class="px-4 py-2 truncate"><?= $obat['harga'] ?></td>
                <td class="px-4 py-2 truncate"><?= $obat['stok'] ?></td>
              </tr>
              <?php $counter++; ?>
            <?php endforeach; ?>
          </table>
          <a href="" class="flex items-end self-end h-full mt-4 font-medium text-gray-500 duration-300 hover:text-gray-400 w-fit">See More</a>
      </div>
    </div>
  </main>

  <?php
    include('lib/footer.php')
  ?>