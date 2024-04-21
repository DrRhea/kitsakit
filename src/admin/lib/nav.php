<?php
    $script_name = $_SERVER['PHP_SELF'];
    $filename = basename($script_name, '.php');
?>

<nav class="fixed top-0 left-[-100%] flex flex-col justify-between h-full px-8 py-8 font-medium duration-300 bg-white border shadow-md md:pl-8 md:pr-16">
    <i class="self-end mb-5 text-2xl cursor-pointer lg:hidden uil uil-times" id="close"></i>
    <h2 class="flex text-4xl font-bold">
      <span class="text-indigo-600">Kit</span>
      <span>Sakit</span>
    </h2>
    <div class="flex-1 mt-8 text-lg">
      <ul class="flex flex-col gap-6">
        <li>
          <a href="./dashboard.php" class="flex gap-2 duration-300 <?= ($filename == 'dashboard') ? 'text-indigo-600 hover:text-indigo-500 font-semibold' : 'hover:text-indigo-600'; ?>"><i class="uil uil-estate"></i></i>Dashboard</a>
        </li>
        <li>
          <a href="./rekamMedis.php?id=0" class="flex gap-2 duration-300 <?= ($filename == 'rekamMedis') ? 'text-indigo-600 hover:text-indigo-500 font-semibold' : 'hover:text-indigo-600'; ?>"><i class="uil uil-file-medical"></i>Rekam Medis</a>
        </li>
        <li>
          <a href="./obat.php" class="flex gap-2 duration-300 <?= ($filename == 'obat') ? 'text-indigo-600 hover:text-indigo-500 font-semibold' : 'hover:text-indigo-600'; ?>"><i class="uil uil-capsule"></i>Obat</a>
        </li>
        <li>
          <a href="./dokter.php" class="flex gap-2 duration-300 <?= ($filename == 'dokter') ? 'text-indigo-600 hover:text-indigo-500 font-semibold' : 'hover:text-indigo-600'; ?>"><i class="uil uil-user-md"></i>Dokter</a>
        </li>
        <li>
          <a class="flex gap-2 text-gray-400 cursor-not-allowed" disabled><i class="uil uil-user"></i>Profile</a>
        </li>
      </ul>
    </div>
    <a href="../index.php" class="flex self-center gap-2 text-lg">Logout<i class="uil uil-sign-out-alt"></i></a>
  </nav>

  <div class="w-[50px] h-[50px] bg-indigo-600 flex text-white fixed duration-300 items-center justify-center text-2xl rounded-r-full top-10 left-0 cursor-pointer lg:hidden" id="open">
    <i class="uil uil-angle-right-b"></i>
  </div>