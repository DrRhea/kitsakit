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