<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KitSakit</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body class="bg-slate-100 font-['Poppins']">
  <!-- Navbar -->
  <nav class="absolute top-0 z-0 flex justify-between w-full px-8 py-4 duration-300 ">
    <span class="font-bold">KitSakit</span>
    <ul class="hidden gap-4 sm:flex">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#obat">Obat</a></li>
      <li><a href="#admin">Admin</i></a></li>
    </ul>
    <i class="uil uil-bars sm:hidden"></i>
  </nav>

  <!-- Hero Section -->
  <div class="">
    <img src="assets/img/about.jpg" alt="about" class="object-cover w-full">
    <h1 class="text-3xl font-bold text-red-500 underline">
      Hello world
    </h1>
  </div>

  <section class="mt-96">
    <p>.</p>
    <p>.</p>
    <p>.</p>
    <p>.</p>
    <p>.</p>
    <p>.</p>
    <p>.</p>
    <p>.</p>
    <p>.</p>
  </section>
  <script>
  document.addEventListener("scroll", function() {
    var navbar = document.querySelector("nav");
    if(window.scrollY > 160) {
      navbar.style.backgroundColor = "white";
      navbar.style.position = "fixed";
    } else {
      navbar.style.backgroundColor = "transparent";
      navbar.style.position = "absolute";
    }
  });
  </script>
</body>
</html>