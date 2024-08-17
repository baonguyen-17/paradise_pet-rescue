<?php
session_start(); // Start the session to access the session variables
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style.css">
    <title>Paradise Pet Rescue</title>
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

        <ul class="nav-links" id="nav-links">
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

    <div class="navbar-burger" id="navbar-burger">
        <input type="checkbox" id="burger-menu" onclick="showVerticalNav()">
        <label for="burger-menu" class="burger-symbol">
            <i class='bx bx-menu'></i>
        </label>
    </div>

    <header class="header-container">
        <img src="images/header-background.jpg">
        <div class="header-title">
            <h1>Please Donate!</h1>
        </div>
    </header>

    <!----------------------------------- Main body -------------------------------------------------------------------->
    <main>

        <section class="section-container" id="donation-section">
            <div class="donation-container">
                <form id="donationForm" onsubmit="return submitDonation()">
                    <h3 class="donation-title">Help us land these souls a forever home!</h3>
                    <p>Paradise Pet Rescue relies entirely on the generosity of the public to continue our mission. All
                        donations contribute directly to the welfare of the animals. <br>
                        No paid staff, just <span>BIG HEARTS!</span>
                    </p>

                    <div class="donation-box">
                            <div class="donator">
                                <input type="text" id="firstName" placeholder="First Name" required>
                                <input type="text" id="lastName" placeholder="Last Name" required>
                                <input type="email" id="email" placeholder="Email" required> <!-- Updated type for email validation -->
                                <textarea name="comments" id="comments" rows="7" placeholder="Comments"></textarea>
                        
                                <!-- Credit Card Information -->
                                <div class="credit-card-info">
                                    <input type="text" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="Credit Card Number" required>
                                    <input type="text" inputmode="numeric" pattern="[0-9]{3}" autocomplete="cc-csc" maxlength="3" placeholder="CVV" required>
                                    <input type="text" pattern="\d{2}/\d{2}" placeholder="Expiration (MM/YY)" required>
                                </div>
                            </div>
                            <div class="donate-input">
                                <button type="button" id="10" class="donate-btn" onclick="selectAmount(10)">$10.00</button>
                                <button type="button" id="20" class="donate-btn" onclick="selectAmount(20)">$20.00</button>
                                <button type="button" id="50" class="donate-btn" onclick="selectAmount(50)">$50.00</button>
                            </div>
                        </div>


                    <div class="custom-donate">
                        <label for="custom-donate">$</label>
                        <input type="number" id="custom-donate" placeholder="$100.00">

                    </div>

                    <div class="submit-donation">
                        <button type="submit" class="submit-btn">CONTINUE</button>
                        <ul class="accepted-cards">
                            <li><i class='bx bxl-visa'></i></li>
                            <li><i class='bx bxl-mastercard'></i></li>
                            <li><i class='bx bxl-paypal'></i></li>
                        </ul>
                        <div class="terms-condition">
                            <input type="checkbox" id="terms">
                            <label for="terms">By providing your name and email address, you verify to us that you are
                                not a BOT!</label>
                        </div>
                    </div>
                </form>
            </div>

            <div class="donate-paragraph">
                <div class="paragraph-header">
                    <div class="paragraph-title">
                        <h3>Every penny COUNTS!</h3>
                    </div>
                </div>

                <p>Donate to <b>Paradise Pet Rescue</b>, a non-profit animal rescue organization. Your contribution
                    goes straight to the work & costs of maintenance of the shelters we provide for these animals,
                    headquartered in <b>Orlando, Florida.</b></p>
                <p>We will ensure that your help makes them <b>BETTER!</b></p>
                <div class="wishlist">
                    <h3 class="donation-title">Wishlist (donate supplies)</h3>
                    <ul class="wishlist-content">
                        <li><i class='bx bxs-check-square'></i>Dry Animal Food</li>
                        <li><i class='bx bxs-check-square'></i>Dry Adult Food</li>
                        <li><i class='bx bxs-check-square'></i>Canned Animal Food</li>
                        <li><i class='bx bxs-check-square'></i>Litter Boxes & Pee Pads</li>
                        <li><i class='bx bxs-check-square'></i>Pet Store Gift Cards</li>
                        <li><i class='bx bxs-check-square'></i>Toys, Scratches, Cat trees</li>
                        <li><i class='bx bxs-check-square'></i>Beddings</li>
                    </ul>
                </div>
            </div>

        </section>

        <section class="section-container">
            <div class="section-banner">
                <img src="images/section-2.jpg" alt="">
            </div>

            <div class="big-thanks">

            </div>

        </section>
    </main>

    <!----------------------------------- Main body -------------------------------------------------------------------->





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