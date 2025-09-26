<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}

include 'data.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $name; ?> - Resume</title>
  <link rel="stylesheet" href="resume.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <!-- 🔹 Logout button -->
    <div style="text-align: right; padding: 10px;">
    <a href="logout.php" class="logout-btn">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>
    </div>


  <div class="container">

    <!-- About Section -->
    <section class="about">
      <div class="about-text">
        <h2>About me</h2>
        <p><?php echo $summary; ?></p>
        <div class="contact">
          <p><i class="fa-solid fa-envelope"></i> <?php echo $email; ?></p>
          <p><i class="fa-solid fa-phone"></i> <?php echo $phone; ?></p>
          <p><i class="fa-brands fa-facebook"></i> <?php echo $fb; ?></p>
          <p><i class="fa-brands fa-instagram"></i> <?php echo $ig; ?></p>
          <p><i class="fa-brands fa-github"></i> <?php echo $github; ?></p>
        </div>
      </div>
      <div class="about-img">
        <img src="<?php echo $profile_pic; ?>" alt="Profile Picture">
      </div>
    </section>

    <!-- Details Section -->
    <section class="details">
      <div class="left">

        <div class="block">
          <h3>Education</h3>
          <?php foreach ($education as $edu): ?>
            <p><strong><?php echo $edu["degree"]; ?></strong><br>
               <?php echo $edu["school"]; ?> | <?php echo $edu["years"]; ?></p>
          <?php endforeach; ?>
        </div>

        <div class="block">
          <h3>Technical skill</h3>
          <div class="tech-icons">
            <img src="icons/figma.png" alt="Figma">
            <img src="icons/photoshop.jpg" alt="Photoshop">
            <img src="icons/java.jpg" alt="Java">
            <img src="icons/python.jpg" alt="Python">
            <img src="icons/flutter.jpg" alt="Flutter">
          </div>
        </div>

        <div class="block">
          <h3>Interest</h3>
          <p><?php echo implode(" | ", $interests); ?></p>
        </div>

      </div>

      <div class="right">

        <div class="block">
          <h3>Soft skill</h3>
          <p><?php echo implode(" | ", $soft_skills); ?></p>
        </div>

        <div class="block">
          <h3>Skill set</h3>
          <p><?php echo implode(" | ", $skill_set); ?></p>
        </div>

        <div class="block">
          <h3>Language</h3>
          <p><?php echo implode(" | ", $languages); ?></p>
        </div>

        <div class="block">
          <h3>Skills</h3>
          <?php foreach ($skills as $skill => $percent): ?>
            <div class="skill">
              <span><?php echo $skill; ?> (<?php echo $percent; ?>%)</span>
              <div class="bar">
                <div class="bar-fill" style="width: <?php echo $percent; ?>%"></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

  </div>
</body>
</html>