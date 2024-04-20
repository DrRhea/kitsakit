<?php
  include('./lib/header.php');
  include('../function.php');

  $listRekamMedis = readRekamMedis();
  $listDokter = readDokter();
  $listPasien = readPasien();
  $listObat = readObat();
?>
  <nav class="fixed top-0 left-0 flex flex-col justify-between h-full px-8 py-8 font-medium duration-300 bg-white border shadow-md md:pl-8 md:pr-16">
    <i class="self-end mb-5 text-2xl cursor-pointer lg:hidden uil uil-times" id="close"></i>
    <h1 class="flex text-4xl font-bold">
      <span class="text-indigo-600">Kit</span>
      <span>Sakit</span>
    </h1>
    <div class="flex-1 mt-8 text-lg">
      <ul class="flex flex-col gap-6">
        <li>
          <a href="" class="flex gap-2 text-indigo-600"><i class="uil uil-estate"></i></i>Dashboard</a>
        </li>
        <li>
          <a href="" class="flex gap-2 duration-500 hover:decoration-2 hover:underline hover:decoration-indigo-600 hover:text-indigo-600"><i class="uil uil-file-medical"></i>Rekam Medis</a>
        </li>
        <li>
          <a href="" class="flex gap-2 duration-500 hover:decoration-2 hover:underline hover:decoration-indigo-600 hover:text-indigo-600"><i class="uil uil-capsule"></i>Obat</a>
        </li>
        <li>
          <a href="" class="flex gap-2 duration-500 hover:decoration-2 hover:underline hover:decoration-indigo-600 hover:text-indigo-600"><i class="uil uil-user-md"></i>Dokter</a>
        </li>
        <li>
          <a href="" class="flex gap-2 duration-500 hover:decoration-2 hover:underline hover:decoration-indigo-600 hover:text-indigo-600"><i class="uil uil-user"></i>Profile</a>
        </li>
      </ul>
    </div>
    <a href="../index.php" class="flex self-center gap-2 text-lg">Logout<i class="uil uil-sign-out-alt"></i></a>
  </nav>

  <div class="w-[50px] h-[50px] bg-indigo-600 flex text-white fixed duration-300 items-center justify-center text-2xl rounded-r-full top-10 l-[-100%] cursor-pointer" id="open">
    <i class="uil uil-angle-right-b"></i>
  </div>
  
  <main class="flex flex-col w-full gap-8 my-8 mr-12 ml-72">
    <div class="flex items-center justify-between px-8" id="header">
      <h2 class="text-2xl font-bold">
        <span class="text-gray-700">Welcome, </span>
        <span class="text-indigo-600">Dr. You</span>
      </h2>
      <div class="flex gap-4 p-2 rounded-full shadow-sm">
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
        <img src="../assets/img/doctors/doctors-1.png" alt="" class="rounded-full w-[40px] h-[40px] object-cover bg-indigo-600">
      </div>
    </div>
    <div class="flex gap-8">
      <div class="flex gap-4 px-8 py-4 rounded-lg shadow-md">
        <i class="self-center text-3xl text-indigo-600 uil uil-user-check"></i>
        <div class="flex flex-col">
          <span class="text-2xl font-bold">3000</span>
          <span class="font-medium">Patients Treated</span>
        </div>
      </div>
      <div class="flex gap-4 px-8 py-4 rounded-lg shadow-md">
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

    <div class="flex flex-wrap w-full gap-8">

    <!-- Rekam Medis -->
    <div class="flex flex-col p-8 rounded-lg shadow-md bg-gray-50 grow" id="rekam_medis">
        <h3 class="mb-4 text-2xl font-bold text-indigo-600">Rekam Medis</h3>
          <table class="font-medium">
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
          <a href="" class="flex items-end self-end h-full mt-4 font-medium text-gray-500 duration-300 hover:text-gray-400 w-fit">See More</a>
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

  <script>
    let closeBtn = document.querySelector('#close')
    let openBtn = document.querySelector('#open')
    
    closeBtn.addEventListener('click', () => {
      let navbar = document.querySelector('nav')
      let main = document.querySelector('main')
      
      navbar.classList.remove('left-0');
      navbar.classList.add('left-[-100%]');

      main.classList.remove('ml-72')
      main.classList.add('ml-12')

      openBtn.classList.remove('l-[-100%]');
      openBtn.classList.add('l-[100%]');
    })
    
    openBtn.addEventListener('click', () => {
      let navbar = document.querySelector('nav')
      let main = document.querySelector('main')
      
      navbar.classList.add('left-0');
      navbar.classList.remove('left-[-100%]');

      main.classList.remove('ml-12')
      main.classList.add('ml-72')

      openBtn.classList.remove('l-[100%]');
      openBtn.classList.add('l-[-100%]');

      console.log('hehe')
    })


  </script>
</body>
</html>