const registerBtn = document.getElementById("registerBtn"); // Mengambil elemen tombol registrasi
const loginBtn = document.getElementById("loginBtn"); // Mengambil elemen tombol login
const container = document.getElementById("container"); // Mengambil elemen container yang menampung form

// Menampilkan form registrasi ketika tombol registrasi diklik
registerBtn.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

// Menampilkan form login ketika tombol login diklik
loginBtn.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});
