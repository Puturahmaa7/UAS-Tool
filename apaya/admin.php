<?php
// Koneksi ke Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_dinosaur";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Create
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $url = $_POST['url'];

    $sql = "INSERT INTO news (title, description, url) VALUES ('$title', '$description', '$url')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('News added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $url = $_POST['url'];

    $sql = "UPDATE news SET title='$title', description='$description', url='$url' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('News updated successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM news WHERE id=$id";
    if ($conn->query($sql) === TRUE) {

        echo "<script>alert('News successfully deleted');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Mengambil data berita untuk ditampilkan
$sql = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css?v=1.0">
    <title>CRUD News</title>
</head>
<body>

<h1>CRUD News</h1>

<!-- Form untuk Menambah Berita -->
<form method="post">
<h2>Add News</h2>
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="text" name="url" placeholder="URL" required>
    <button type="submit" name="create">Add News</button>
</form>

<!-- Tabel untuk Menampilkan Berita -->
<div class="news-list">
<h2>News List</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='news-item'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<a href='" . $row['url'] . "' target='_blank'>" . $row['url'] . "</a>";
            echo "<div class='actions'>
                    <a href='?delete=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a>
                    <button class='edit-btn' onclick=\"openEditForm(" . $row['id'] . ", '" . htmlspecialchars($row['title']) . "', '" . htmlspecialchars($row['description']) . "', '" . htmlspecialchars($row['url']) . "')\">Edit</button>
                  </div>";
            echo "</div>";
        }
    } else {
        echo "<p>Tidak ada berita ditemukan.</p>";
    }
    ?>
</div>

<!-- Form untuk Mengedit Berita -->
<div id="editForm">
<h2>Edit News</h2>
    <form method="post">
        <input type="hidden" name="id" id="editId">
        <input type="text" name="title" id="editTitle" required>
        <textarea name="description" id="editDescription" required></textarea>
        <input type="text" name="url" id="editUrl" required>
        <button type="submit" name="update">Update</button>
        <button type="button" onclick="closeEditForm()">Cancel</button>
    </form>
</div>

<script src="admin.js"></script>

</body>
</html>

<?php
$conn->close();
?>
