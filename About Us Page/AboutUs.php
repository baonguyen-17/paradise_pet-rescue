<?php
session_start(); // Start the session to access the session variables
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <title>About Us</title>
</head>

<body>
  <!-- include php script -->
  <?php include '../Login Form/fetchusername.php'; ?>
  <nav>
    <div class="nav-logo">
      <a href="https://paradisepetrescue.in">
        <img src="images/logo.png">
      </a>
      <h4>Paradise Pet <br><span>Rescue</span></h4>
    </div>
    <ul class="nav-links">
      <li class="link"><a href="https://paradisepetrescue.in">Home</a></li>
      <li class="link"><a href="../Adoption Application Page/application.php">Adopt</a></li>
      <li class="link"><a href="../Pet Search Page/getpets.php">Pets</a></li>
      <li class="link"><a href="../About Us Page/AboutUs.php">About Us</a></li>
      <li class="link"><a href="../Donate Page/donate.php">Donate</a></li>

      <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
      <li class="link"><a href="../Admin Page/admin.php">Admin</a></li>

      <?php if (isset($_SESSION['username'])): ?>
      <a href="../Login Form/logout.php">
        <button class="login-btn">Logout</button>
      </a>

      <?php endif; ?>
      <?php else: ?>
      <a href="../Login Form/login.html">
        <button class="login-btn">Login</button>
      </a>

      <?php endif; ?>
      <li><span id="userGreeting">Welcome,<br>
          <span>
            <?php echo htmlspecialchars($username); ?>
          </span>
        </span>
      </li>
    </ul>
  </nav>
  <header class="header-container">
    <img src="images/header-background.jpg">
    <div class="header-title">
      <h1>About Us</h1>
    </div>
  </header>







  <section class="about">
    <h1>About Us</h1>
    <p style="font-weight: bold">
      Paradise Pet Rescue is a new start for all animals </p>
    <div class="about-info">
      <div>
        <p><strong style="font-size: 18pt; text-align: left;">Our Heartfelt Mission</strong></p>
        
        <p>Paradise Pet Rescue is deeply committed to the noble cause of ensuring every dog, cat, puppy, and kitten finds a forever home filled with love and care. As a recognized 501(c)(3) non-profit organization, our soulful journey is dedicated to rescuing these beautiful souls and guiding them toward a new chapter in life with families that will cherish them. Our belief is simple yet profound: every animal deserves to be loved, cared for, and to share in the happiness of a nurturing home.</p>
        
        <p><strong style="font-size: 18pt;">What Distinguishes Us</strong></p>
        
        <p>Operating as a foster-based rescue, Paradise Pet Rescue steps beyond the traditional boundaries of a shelter. In our unique model, every animal basks in the warmth and social dynamics of a home setting, ensuring they are emotionally and socially prepared for adoption. This approach allows us to offer individualized attention and care, paving the way for a seamless transition into their permanent homes.</p>
        
        <p><strong style="font-size: 18pt;">Pre-Adoption Guidance</strong></p>
        <p>To streamline your adoption experience, we recommend familiarizing yourself with our Adoption Contract. This preparation ensures you&#39;re well-informed and ready to welcome your new family member.
        </p>
        
        <p><strong style="font-size: 18pt;">Become Part of Our Mission</strong></p>
        
        <p>Whether your heart is set on adopting, fostering, or you wish to contribute to our cause in other ways, Paradise Pet Rescue opens its doors to you. Join us in this compassionate journey to transform the lives of countless animals. We are grateful for your consideration to adopt a rescue animal and for believing in our mission. Together, we can create endless stories of hope and love.</p>

      </div>
      <div class="about-img">
        <img src="images/dogsplaying.jpg" alt="Dogs playing">
      </div>
    </div>
  </section>

  <div class="container">
      <h2>Contact Us</h2>
      <br><br>
        <form action="send_contact.php" method="post">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name.." required>
      
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
      
            <label for="email">Email Address</label>
            <input type="email" id="email" name="emailaddress" placeholder="Your email address..." required>
      
            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>
      
            <input type="submit" value="Submit">
        </form>
    </div>





  <!------------------------------------- Start footer ------------------------------------------>

  <footer>
    <div class="footer-container">
      <div id="about-us" class="column">
        <div class="title">
          <h5>About Us</h5>
        </div>
        <p>Paradise Pet Rescue is a non-profit animal rescue organization that focuses on the welfare of both
          citizens and animals. We are dedicated in promoting animal happiness and provide services through
          Valencia College</p>
      </div>

      <div id="webpages" class="column">
        <div class="title">
          <h5>All Pages</h5>
        </div>
        <ul class="all-links">
          <li class="link">
            <i class='bx bx-chevron-right'></i>
            <a href="https://paradisepetrescue.in">Home</a>
          </li>
          <li class="link">
            <i class='bx bx-chevron-right'></i>
            <a href="../Pet Search Page/getpets.php">Our Pets</a>
          </li>
          <li class="link">
            <i class='bx bx-chevron-right'></i>
            <a href="../About Us Page/AboutUs.php">About Us</a>
          </li>
          <li class="link">
            <i class='bx bx-chevron-right'></i>
            <a href="../Donate Page/donate.php">Donate</a>
          </li>
        </ul>
      </div>

      <div id="contacts" class="column">
        <div class="title">
          <h5>Contact Us</h5>
        </div>

        <ul class="contact-infos">
          <li class="org-title">
            <p>Paradise Pet Rescue Center</p>
          </li>
          <li>701 N Econlockhatchee Trail, Orlando, FL 32825</li>
          <li>(407) 123-4567</li>
          <li>https://paradisepetrescue.in</li>
          <li class="social-medias">
              <a href="https://facebook.com/people/Paradise-Pet-Rescue/61558739576412/" target="_blank" style="color: #E0E0E0;"><i class='bx bxl-facebook-square'></i></a>
              <a href="https://www.instagram.com/paradisepetrescue01/" target="_blank" style="color: #E0E0E0;"><i class='bx bxl-instagram'></i></a>
              <a href="http://twitter.com/Paradisepet01" target="_blank" style="color: #E0E0E0;"><i class='bx bxl-twitter'></i></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="copyright">
      <p>© 2024 Paradise Pet Rescue</p>
    </div>
  </footer>

  <!------------------------------------- End footer ------------------------------------------>

</body>

</html>