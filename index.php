<?php
session_start(); // Start the session to access the session variables
?>
<!DOCTYPE html>
<html>

<head>
    <title>Paradise Pet Rescue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Index/style.css">
</head>

<body>

    <!-- include php script -->
    <?php include 'Login Form/fetchusername.php'; ?>
    <nav>
        <div class="nav-logo">
            <a href="https://paradisepetrescue.in">
                <img src="../Index/images/logo.png">
            </a>
            <h4>Paradise Pet <br><span>Rescue</span></h4>
        </div>

        <ul class="nav-links" id="nav-links">
            <li class="link"><a href="https://paradisepetrescue.in">Home</a></li>
            <li class="link"><a href="../Adoption Application Page/application.php">Adopt</a></li>
            <li class="link"><a href="../Pet Search Page/getpets.php">Pets</a></li>
            <li class="link"><a href="../About Us Page/AboutUs.php">About Us</a></li>
            <li class="link"><a href="../Donate Page/donate.php">Donate</a></li>

            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
            <li class="link"><a href="../Admin Page/admin.php">Admin</a></li>

            <?php if (isset($_SESSION['username'])): ?>
            <a href="../LoginForm/logout.php">
                <button class="login-btn">Logout</button>
            </a>

            <?php endif; ?>
            <?php else: ?>
            <a href="../LoginForm/login.html">
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

    <div class="navbar-burger" id="navbar-burger">
        <input type="checkbox" id="burger-menu" onclick="showVerticalNav()">
        <label for="burger-menu" class="burger-symbol">
            <i class='bx bx-menu'></i>
        </label>
    </div>

    <header class="header-container">

        <!------------------ Carousel slider for header banner ------------------------------------>
        <div class="carousel-container">
            <div class="image-slider">
                <img src="../Index/images/header-background-1.jpg">
            </div>
            <div class="image-slider">
                <img src="../Index/images/header-background-2.jpg">
            </div>
            <div class="image-slider">
                <img src="../Index/images/header-background-3.jpg">
            </div>
        </div>

        <!------------------ Carousel slider for header banner ------------------------------------>

        <div class="header-title">
            <h1>Welcome to <br> <span>Paradise Pet Rescue</span></h1>
            <p>
                <a href="../About Us Page/AboutUs.php"><button class="btn" id="learn-more">Learn More</button></a>
                or
                <a href="../Adoption Application Page/application.php"><button class="btn" id="adopt-now">Adopt
                        Now</button></a>
            </p>

        </div>
    </header>





    <main class="main-container">
        <section class="about-us">
            <div class="section-title">
                <h4>
                    Who We Are?
                </h4>
                <h1>
                    About Paradise Pet Rescue
                </h1>
            </div>

            <div class="section-content" id="about-us">
                <p>We are a <span>non-profit, all volunteer animal rescue shelter</span> dedicated to the protection and
                    welfare of
                    the lives of abused, abandoned and neglected animals and landing them in loving, permanent homes.
                    <br>
                    <span>Our shelter features:</span>
                </p>

                <div class="animal-cards">
                    <div class="card" id="dog">
                        <img src="../Index/images/dog-card.jpg">
                        <h3>Dogs</h3>
                    </div>
                    <div class="card" id="cat">
                        <img src="../Index/images/cat-card.jpg">
                        <h3>Cats</h3>
                    </div>
                    <div class="card" id="bird">
                        <img src="../Index/images/bird-card.jpg">
                        <h3>Birds</h3>
                    </div>
                    <div class="card" id="other">
                        <img src="../Index/images/other-card.jpg">
                        <h3>Others</h3>
                    </div>
                </div>
            </div>


            <div class="learn-more-btn">
                <a href="../About Us Page/AboutUs.php"><button class="btn learn-more">Learn more</button></a>
            </div>

        </section>

        <section class="housing-capacity">
            <div class="stat-container">
                <h3>Pet Housing</h3>
                <div class="stat">
                    <h4>
                        <i class='bx bxs-dog'></i>
                        1,000 spacious rooms
                    </h4>
                </div>
            </div>
            <div class="stat-container">
                <h3>Adoptions</h3>
                <div class="stat">
                    <h4>
                        <i class='bx bxs-calendar-alt'></i>
                        Over 130,000 Applications
                    </h4>
                </div>
            </div>
        </section>

        <section class="donate-now">
            <div class="left-img">
                <img src="../Index/images/dog-close-up.jpg">
            </div>
            <div class="donate-container">
                <div class="section-title">
                    <h4>Donate</h4>
                </div>
                <p>Paradise Pet Rescue is <b>100% volunteer operated</b>, so you know your funds go the right place -
                    Towards
                    the mission of helping vulnerable animals find a loving home</p>
                <div class="donate">
                    <a href="../Donate Page/donate.php"><button class="btn donate-btn">Donate Now</button></a>
                    <div class="accepted-cards">
                        <i class='bx bxl-visa'></i>
                        <i class='bx bxl-mastercard'></i>
                        <i class='bx bxl-paypal'></i>
                    </div>
                </div>
            </div>
            <div class="right-img">
                <img src="../Index/images/cat-close-up.jpg">
            </div>
        </section>



        <section class="contact-us">
            <div class="section-title">
                <h4>
                    Contacts
                </h4>
                <h1>
                    Let's Keep In Touch
                </h1>
            </div>

            <div class="info-container">
                <form action="About Us Page/send_contact.php" method="post">
                    <div class="input-fields">
                        <div class="field">
                            <input type="text" id="fname" name="firstname" placeholder="Your first name here">
                        </div>
                        <div class="field">
                            <input type="text" id="lname" name="lastname" placeholder="Your last name here">
                        </div>
                        <div class="field">
                            <input type="email" id="email" name="emailaddress" placeholder="Your email here">
                        </div>
                        <div class="field">
                            <textarea id="subject" name="subject" rows="4" placeholder="Your message here"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn submit-btn" value="Submit">Send</button>
                </form>


                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.609543391176!2d-81.4674104238385!3d28.521392989117835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e7791863297bd1%3A0x5d8ba26cf6aa23ab!2sValencia%20College%20West%20Campus!5e0!3m2!1sen!2sus!4v1713902996274!5m2!1sen!2sus"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


        </section>



    </main>





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

    <script src="../Index/script.js"></script>

</body>

</html>