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
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data berita
$sql = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dinosaurus</title>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Kanit:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="yanginibeneran.css" />
  </head>

  <body>
    <!-- Header -->
    <header>
      <!-- Logo -->
      <a href="#" class="logo">Dinosaurs</a>

      <!-- Icon Bar -->
      <div class="bx bx-menu">
        <a href="#menu" id="menu"><i data-feather="menu"></i></a>
      </div>

      <!-- Navbar -->
      <ul class="navbar">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#species">Species</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="aboutme.html">About Me</a></li>
      </ul>
    </header>

    <!-- Home Section -->
    <section class="home" id="home">
      <div class="home-text">
        <h1>Discover Dinosaurs</h1>
        <h2>
          Explore The <br />
          Giants of The Past
        </h2>
        <a href="#about" class="btn">Explore Dinosaurs</a>
      </div>

      <div class="home-img">
        <img src="112.jpg" />
      </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
      <div class="about-img">
        <img src="21.png" />
      </div>
      <div class="about-text">
        <span>About Dinosaurs</span>
        <h2>
          Unveiling the Secrets <br />
          of the Prehistoric Era
        </h2>
        <p>
          Dinosaurs roamed the Earth millions of years ago, captivating our
          imagination with their diversity, strength, and mysteries. Discover
          their incredible stories, habitats, and extinction in a journey back
          in time.
        </p>
        <a href="#species" class="btn">Learn More</a>
      </div>
    </section>

    <!-- Species Section -->
    <section class="species" id="species">
      <div class="species-title">
        <span>Meet the Dinosaurs</span>
        <h2>Explore Different Dinosaur Species</h2>
        <p>
          Discover the fascinating world of dinosaurs, from the mighty predators
          to gentle giants of the prehistoric era.
        </p>
      </div>

      <div class="species-content">
        <div class="species-item">
          <img src="18.png" />
          <h3>Tyrannosaurus Rex</h3>
          <p>
            Known as the king of the dinosaurs, T-Rex was a powerful predator
            with sharp teeth and a massive build.
          </p>
        </div>

        <div class="species-item">
          <img src="3.png" />
          <h3>Triceratops</h3>
          <p>
            A gentle herbivore with three iconic horns and a frill to protect
            itself from predators.
          </p>
        </div>

        <div class="species-item">
          <img src="6.png" />
          <h3>Velociraptor</h3>
          <p>
            A swift and intelligent predator, known for its speed and
            pack-hunting strategies.
          </p>
        </div>

        <div class="species-item">
          <img src="7.png" />
          <h3>Stegosaurus</h3>
          <p>
            Famous for its spiked tail and unique plates along its back,
            Stegosaurus was a peaceful plant-eater.
          </p>
        </div>

        <div class="species-item">
          <img src="21.png" />
          <h3>Brachiosaurus</h3>
          <p>
            A towering herbivore with a long neck, perfect for reaching the
            tallest trees for food.
          </p>
        </div>

        <div class="species-item">
          <img src="19.png" />
          <h3>Spinosaurus</h3>
          <p>
            A massive carnivore with a sail-like structure on its back,
            Spinosaurus was a fearsome predator.
          </p>
        </div>

        <div class="species-item">
          <img src="17.png" />
          <h3>Allosaurus</h3>
          <p>
            Known for its hunting skills and agility, Allosaurus was one of the
            most fearsome carnivores of its time.
          </p>
        </div>

        <div class="species-item">
          <img src="16.png" />
          <h3>Parasaurolophus</h3>
          <p>
            A unique herbivore with a distinctive crest on its head, believed to
            have been used for communication.
          </p>
        </div>
      </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
      <div class="gallery-title">
        <span>Our Gallery</span>
        <h2>Dinosaur in Pictures</h2>
        <p>Check out some of our dinosaur imagery and illustrations!</p>
      </div>
      <div class="gallery-content">
        <div class="gallery-item">
          <img src="113.jpeg" />
        </div>
        <div class="gallery-item">
          <img src="114.jpg" />
        </div>
        <div class="gallery-item">
          <img src="115.jpeg" />
        </div>
        <div class="gallery-item">
          <img src="116.jpeg" />
        </div>
      </div>
    </section>

    <!-- News Section -->
    <section class="news" id="news">
  <div class="news-title">
    <span>Latest News</span>
    <h2>Stay Updated with Dinosaur Discoveries</h2>
  </div>
  <div class="news-content">
    <?php
    // Memeriksa apakah ada berita
    if ($result->num_rows > 0) {
        // Menampilkan data berita satu per satu
        while($row = $result->fetch_assoc()) {
            echo "<div class='news-item'>";
            echo "<a href='" . $row['url'] . "' target='_blank'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "<p>No news found.</p>";
    }
    ?>
  </div>
</section>


    <!-- Footer -->
    <footer class="footer">
      <div class="footer-bottom">
        <p>&copy; 2024 Dinosaurs Inc. All rights reserved.</p>
      </div>
    </footer>

    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>

    <!-- JS -->
    <script src="yanginibeneran.js"></script>
  </body>
</html>


<?php
$conn->close();
?>