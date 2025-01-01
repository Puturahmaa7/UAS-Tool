// Fungsi untuk membuka form edit dengan mengisi data yang sudah ada
function openEditForm(id, title, description, url) {
  document.getElementById("editForm").style.display = "block"; // Tampilkan form edit
  document.getElementById("editId").value = id;
  document.getElementById("editTitle").value = title;
  document.getElementById("editDescription").value = description;
  document.getElementById("editUrl").value = url;
}

// Fungsi untuk menutup form edit
function closeEditForm() {
  document.getElementById("editForm").style.display = "none"; // Sembunyikan form edit
}

// Fungsi untuk memuat data berita saat halaman dimuat
window.onload = loadNews;
