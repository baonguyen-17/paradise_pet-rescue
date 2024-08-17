<?php
session_start(); // Start the session to access the session variables
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="pop-up-style.css">
    <link rel="stylesheet" href="style.css">
    <title>Animal in Shelter | Paradise Pet Rescue</title>
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
            <h1>Search Adoptable Pets Now!</h1>
        </div>
    </header>




    <main class="main-container">
        <div class="search-box">
            <h2>Paradise Pet Rescue is here to assist</h2>
            <h3>Use the search bar or select filters below</h3>
            <p>Click on a pet's photo to learn more about it</p>

            <div class="search-container">
                <i class='bx bx-search-alt'></i>
                <input type="text" id="petID" placeholder="Pet ID (Ex: A123456)...">
                <button class="btn" onclick="searchPetID()">Search Pet ID</button>
            </div>
        </div>


        <div class="content">
            <div class="search-result-container">
                <div id="pets" class="petlist-grid">

                    <!-- The pets will be populated here, including images, ID and names! -->


                </div>
                <div class="number-bar-container">
                    <ul id="pagination" class="page-numbers">
                        <!-- Pagination links will be populated here by script.js -->
                        <li id="prevPage" class="number"><a href="#prev-page"><i class='bx bx-chevron-left'></i></a></li>
                        <!-- Page numbers will be dynamically inserted here -->
                        <li id="nextPage" class="number"><a href="#next-page"><i class='bx bx-chevron-right'></i></a></li>
                    </ul>
                </div>

            </div>






            
        </div>

    </main>


    <div id="popup" class="popup">

        <!------------------------------------ Pet pop up goes here ------------------------------------->

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


    <script src="script.js"></script>
</body>

</html>