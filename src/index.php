<?php
  include('./function.php');

  $listDokter = readDokter();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KitSakit</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body class="flex flex-col gap-16 font-['Poppins'] text-gray-800 overflow-x-hidden">
  <!-- Navbar -->
  <nav class="absolute top-0 z-40 flex items-center justify-between w-full px-16 py-4 duration-300 ">
    <div class="flex">
      <span class="text-3xl font-bold text-indigo-600">Kit</span>
      <span class="text-3xl font-bold">Sakit</span>
    </div>
    <ul class="hidden gap-6 font-medium md:flex">
      <li><a href="#home" class="flex flex-col-reverse items-center text-indigo-700 underline">Home</a></li>
      <li><a href="#about" class="flex flex-col-reverse items-center">About</a></li>
      <li><a href="#medicine" class="flex flex-col-reverse items-center">Medicine</a></li>
      <li><a href="#doctors" class="flex flex-col-reverse items-center">Doctors</a></li>
    </ul>
    <ul class="hidden gap-4 font-medium md:flex">
        <a href="" class="px-6 py-2 text-white bg-indigo-600 rounded-lg shadow-sm shadow-indigo-600">Login</a>
        <a href="" class="px-6 py-2 text-indigo-600 rounded-lg ring-2 ring-indigo-600 ring-inset">Admin</a>
    </ul>
    <i class="text-4xl cursor-pointer uil uil-bars md:hidden"></i>
  </nav>

    <ul class="fixed top-0 z-50 right-[-100%] flex flex-col items-center w-1/3 h-full gap-10 px-10 py-10 text-lg font-medium duration-300 bg-white shadow-md md:hidden" id="navlist">
      <li><i class="absolute text-3xl cursor-pointer right-10 top-5 uil uil-times"></i></li>

      <li><a href="#home" class="flex flex-col-reverse items-center text-indigo-700 underline">Home<i class="uil uil-estate"></i></a></li>
      <li><a href="#about" class="flex flex-col-reverse items-center">About<i class="uil uil-hospital"></i></a></li>
      <li><a href="#medicine" class="flex flex-col-reverse items-center">Medicine<i class="uil uil-capsule"></i></a></li>
      <li><a href="#doctors" class="flex flex-col-reverse items-center">Doctors<i class="uil uil-user-md"></i></a></li>

      <li><a href="login.php" class="block w-full px-6 py-2 text-white duration-300 bg-indigo-600 rounded-lg shadow-sm shadow-indigo-600 hover:bg-indigo-500">Login</a></li>
      <li><a href="admin.php" class="block w-full px-6 py-2 text-indigo-600 duration-300 rounded-lg shadow-md hover:ring-indigo-500 hover:text-indigo-500 ring-2 ring-indigo-600 ring-inset">Admin</a></li>
    </ul>

  <main class="flex flex-col items-center justify-around px-16 mt-24 sm:flex-row" id="home">
    <div class="flex flex-col gap-1">
        <h1 class="flex flex-col">
          <span class="text-5xl font-semibold text-indigo-600">We care</span>
          <span class="text-5xl font-semibold">about your health</span>
        </h1>
        <p class="mt-4 font-medium text-gray-400 sm:w-3/4">Good health is the state of mental, physical and social well being and it does not just mean absence of diseases.</p>
        <a href="" class="px-6 py-4 mt-8 mb-2 text-white duration-300 bg-indigo-600 rounded-lg shadow-sm w-fit shadow-indigo-600 hover:bg-indigo-500">Book an appointment
          <i class="uil uil-arrow-right"></i>
        </a>
        <p class="mt-4 text-sm font-medium sm:gap-3 sm:w-3/4">Become member of our hospital community? <a href="" class="text-indigo-600 text-md">Sign Up</a></p>
    </div>
    <div class="">
      <img src="assets/img/hero-img.png" alt="" class="hidden md:block rounded-full border-[16px] border-indigo-600">
    </div>
  </main>

  <section class="flex items-center justify-around px-16 ">
    <div class="w-auto p-6 rounded-[24px] shadow-md shadow-gray-300 flex">
      <span class="">Find a doctor</span>
      <form class="flex flex-col items-center gap-4">
        <input class="w-full px-10 py-4 text-center duration-300 bg-gray-200 rounded-md hover:bg-gray-100 outline-indigo-700" type="text" name="" id="" placeholder="Name of Doctor">
        <input class="w-full px-10 py-4 text-center duration-300 bg-gray-200 rounded-md hover:bg-gray-100 outline-indigo-700" type="text" name="" id="" placeholder="Speciality">
        <button type="submit" class="w-full">
          <a href="" class="flex justify-center w-full gap-3 px-6 py-4 text-white duration-300 bg-indigo-600 rounded-lg shadow-sm shadow-indigo-600 hover:bg-indigo-500">Search
            <i class="uil uil-search"></i>
          </a>
        </button>
      </form>
    </div>
  </section>

  <section id="about" class="flex flex-col items-center justify-around w-full px-16">
    <h3 class="text-3xl font-semibold">Our Medical Services</h3>
    <p class="font-medium text-center text-gray-400">We are dedicated to serve you best medical services</p>
    <div class="flex flex-wrap justify-center gap-8 mt-4 font-medium text-indigo-600 ">
      <div class="flex flex-col items-center gap-4 p-16 duration-500 rounded-lg shadow-lg hover:text-white hover:bg-indigo-600">
        <i class="text-4xl uil uil-microscope"></i>
        <p class="text-center">State-of-the-art Laboratory</p>
      </div>
      <div class="flex flex-col items-center gap-4 p-16 duration-500 rounded-lg shadow-lg hover:text-white hover:bg-indigo-600">
        <i class="text-4xl uil uil-ambulance"></i>
        <p class="text-center">Emergency Ambulance Services</p>
      </div>
      <div class="flex flex-col items-center gap-4 p-16 duration-500 rounded-lg shadow-lg hover:text-white hover:bg-indigo-600">
        <i class="text-4xl uil uil-schedule"></i>
        <p class="text-center">Online Appointment Scheduling</p>
      </div>
      <div class="flex flex-col items-center gap-4 p-16 duration-500 rounded-lg shadow-lg hover:text-white hover:bg-indigo-600">
        <i class="text-4xl uil uil-headphones"></i>
        <p class="text-center">Customer Service Call Center</p>
      </div>
    </div>
  </section>

  <section class="flex flex-col items-center justify-around w-full gap-2 px-16" id="doctors" >
    <h3 class="text-3xl font-semibold">Meet our Doctors</h3>
    <p class="font-medium text-center text-gray-400">Well  qualified doctors are ready to serve you</p>
    <div class="flex flex-row flex-wrap justify-around w-full">
      <?php foreach($listDokter as $dokter): ?>
      <div class="p-6 rounded-lg shadow-lg">
        <div class="relative flex justify-center">
          <div class="absolute bottom-0 left-0 w-full bg-indigo-600 rounded-md h-2/3"></div>
          <img src="assets/img/doctors/<?= $dokter['foto'] ?>" alt="" class="relative h-[200px] w-[200px] object-cover">
        </div>
        <div class="flex flex-col items-center gap-1 mt-4 font-medium">
          <span class="text-xl">Dr. <?= $dokter['nama_dokter'] ?></span>
          <span class="text-gray-400 text-md"><?= $dokter['spesialisasi'] ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <footer class="mt-[100rem]">

  </footer>
  <script>
  document.addEventListener("scroll", function() {
    let navbar = document.querySelector("nav");
    if(window.scrollY > 80) {
      navbar.style.backgroundColor = "white";
      navbar.style.boxShadow = "rgba(149, 157, 165, 0.2) 0px 8px 24px";
      navbar.style.position = "fixed";
    } else {
      navbar.style.backgroundColor = "transparent";
      navbar.style.boxShadow = "none";
      navbar.style.position = "";
    }
  });

  let bar = document.querySelector(".uil-bars");
  let close = document.querySelector(".uil-times");
  
  bar.addEventListener("click", () => {
    navlist = document.querySelector("#navlist");
    navlist.style.right = "0";

    let navbar = document.querySelector("nav");
      if(window.scrollY > 80) {
        navbar.style.backgroundColor = "white";
      } else {
        navbar.style.backgroundColor = "transparent";
        navbar.style.boxShadow = "none";
        navbar.style.position = "";
      }
  })
  
  close.addEventListener("click", () => {
    navlist = document.querySelector("#navlist");
    navlist.style.right = "-100%";
    navlist.style.trasition = ".3s";
  })
  
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute('href'));

        window.scrollTo({
            top: target.offsetTop - 100, // Sesuaikan angka -100 sesuai dengan kebutuhan Anda
            behavior: 'smooth'
        });
    });
  });


  </script>
</body>
</html>