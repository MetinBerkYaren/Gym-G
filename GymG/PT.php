<?php
// Veritabanı bağlantı bilgileri
$server = "localhost";
$username = "root";
$password = "";
$database = "gymg";

// Veritabanına bağlan
$conn = new mysqli($server, $username, $password, $database);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı Hatası: " . $conn->connect_error);
}

// Veritabanından verileri çekmek için fonksiyon
function getTrainerData($conn, $id) {
    $sql = "SELECT * FROM pt_tb WHERE PT_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // ID'yi bağla
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Eğitmen verilerini çek
$trainer1 = getTrainerData($conn, 1);
$trainer2 = getTrainerData($conn, 2);
$trainer3 = getTrainerData($conn, 3);

$conn->close(); // Bağlantıyı kapat
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="PT_Css.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gym G</title>
  </head>
<body>
  <div id="container">
    <header id="MenuContainer">
        <div id="LogoContainer">
          <a href="Index.html" id="logoa">GYM G</a>
        </div>
        <nav id="nav">
          <div class="MenuOption">
            <a href="Galeri.html">
              <button type="button" class="MenuButon">Galeri</button>
            </a>
          </div>
          <div class="MenuOption">
            <a href="PT.php">
              <button type="button" id="PT-Button" class="MenuButon">Personal Trainers</button>
            </a>
          </div>
          <div class="MenuOption">
            <a href="Iletisim.html">
              <button type="button" class="MenuButon">İletişim</button>
            </a>
          </div>
          <div class="MenuOption">
            <a href="Hakkimizda.html">
              <button type="button" class="MenuButon">Hakkımızda</button>
            </a>
          </div>
        </nav>
    </header>
        
    <div id="MainContainer">
        <h1 class="section-title">Kişisel Antrenörlerimiz</h1>
        <div class="trainers-section">
            <div class="trainer-cards-container">
                <!-- Eğitmen 1 -->
                <?php if ($trainer1): ?>
                <div class="trainer-card">
                    <img src="<?php echo $trainer1['PT_Photo']; ?>" alt="<?php echo $trainer1['PT_Name']; ?>" class="trainer-photo">
                    <div class="trainer-info">
                        <h2 class="trainer-name"><?php echo $trainer1['PT_Name']; ?></h2>
                        <p class="trainer-specialty"><?php echo $trainer1['PT_Speciality']; ?></p>
                        <p class="trainer-experience"><?php echo $trainer1['PT_Experiance']; ?></p>
                        <p class="trainer-description"><?php echo $trainer1['PT_Description']; ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Eğitmen 2 -->
                <?php if ($trainer2): ?>
                <div class="trainer-card">
                    <img src="<?php echo $trainer2['PT_Photo']; ?>" alt="<?php echo $trainer2['PT_Name']; ?>" class="trainer-photo">
                    <div class="trainer-info">
                        <h2 class="trainer-name"><?php echo $trainer2['PT_Name']; ?></h2>
                        <p class="trainer-specialty"><?php echo $trainer2['PT_Speciality']; ?></p>
                        <p class="trainer-experience"><?php echo $trainer2['PT_Experiance']; ?></p>
                        <p class="trainer-description"><?php echo $trainer2['PT_Description']; ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Eğitmen 3 -->
                <?php if ($trainer3): ?>
                <div class="trainer-card">
                    <img src="<?php echo $trainer3['PT_Photo']; ?>" alt="<?php echo $trainer3['PT_Name']; ?>" class="trainer-photo">
                    <div class="trainer-info">
                        <h2 class="trainer-name"><?php echo $trainer3['PT_Name']; ?></h2>
                        <p class="trainer-specialty"><?php echo $trainer3['PT_Speciality']; ?></p>
                        <p class="trainer-experience"><?php echo $trainer3['PT_Experiance']; ?></p>
                        <p class="trainer-description"><?php echo $trainer3['PT_Description']; ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer id="FooterContainer">
        <div class="footer-container">
          <!-- Logo / Brand -->
          <div class="footer-section">
              <h2>GYM G</h2>
              <p id="FooterP">Dumbell, bar, makineler ve sosyal ortamıyla en sevilen spor merkezi. Daha fazla bilgi için bizi takip edin!</p>
          </div>
          <!-- Quick Links -->
          <div class="footer-section">
              <h3>Linkler</h3>
              <ul>
                  <li><a href="Index.html">Anasayfa</a></li>
                  <li><a href="Hakkimizda.html">Hakkımızda</a></li>
                  <li><a href="Iletisim.html">İletişim</a></li>
              </ul>
          </div>
          <!-- Social Media -->
          <div class="footer-section">
              <h3>Follow Us</h3>
              <div class="social-icons">
                  <a href="https://www.facebook.com/" target="_blank"><img src="IMG/FaceBook_Icon.png" alt="Facebook"></a>
                  <a href="https://x.com/" target="_blank"><img src="IMG/x_PNg.png" alt="X"></a>
                  <a href="https://www.instagram.com/" target="_blank"><img src="IMG/pngegİnsta_Png.png" alt="Instagram"></a>
              </div>
          </div>
      </footer>
    </div>
  </body>
</html>
