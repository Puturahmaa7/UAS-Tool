// Menampilkan atau menyembunyikan navbar ketika menu diklik
const navbar = document.querySelector(".navbar");
const menu = document.querySelector("#menu");

// Ketika menu diklik, toggle navbar
menu.addEventListener("click", () => {
  navbar.classList.toggle("active");
});

// Menutup navbar ketika klik di luar menu atau navbar
document.addEventListener("click", function (e) {
  if (!menu.contains(e.target) && !navbar.contains(e.target)) {
    navbar.classList.remove("active");
  }
});

// Mencegah navbar tertutup ketika ada klik di dalam navbar
navbar.addEventListener("click", function (e) {
  e.stopPropagation();
});

// Menangani klik pada area kosong
document.querySelector(".navbar .empty-area").addEventListener("click", () => {
  alert("Area kosong diklik!");
});
