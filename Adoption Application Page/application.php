<?php
session_start(); // Start the session to access the session variables application.php file
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Paradise Rescue | Application Form</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
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
            <h1>Finalize Your Decision Now!</h1>
        </div>
    </header>



    <div class="main-site">
        <section class="app-container" id="left">
            <form action="submit_application.php" method="post">

                <!----------------------------  1st Form - Personal Info -------------------------->
                <div class="form" id="personal-info">

                    <div class="app-title">
                        <h1>Contact Information</h1>
                    </div>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" name="FirstName" placeholder="First Name" required>
                        </div>
                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="LastName" placeholder="Last Name" required>
                        </div>
                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="DateOfBirth" placeholder="mm/dd/yyyy" required>
                        </div>
                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="Address" placeholder="Address" required>
                        </div>
                        <div class="input-field">
                            <label>City</label>
                            <input type="text" name="City" placeholder="City" required>
                        </div>
                        <div class="input-field">
                            <label>State</label>
                            <input type="text" name="StateProvince" placeholder="State" required>
                        </div>
                        
                        <div class="input-field">
                            <label>Zip</label>
                            <input type="text" name="PostalCode" placeholder="Zip" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" name="EmailAddress" placeholder="Email" required>
                        </div>

                        <div class="input-field">
                            <label>Phone Number</label>
                            <input type="tel" name="PhoneNumber" placeholder="Phone Number" required>
                        </div>
                        <div class="num-type">
                            <label for="cell">Cell
                                <input type="radio" id="cell" name="PhoneType" value="Cell" checked>
                            </label>
                            <label for="home">Home
                                <input type="radio" id="home" name="PhoneType" value="Home">
                            </label>
                        </div>

                        <div class="required-check">
                            <label for="required">
                                <input type="checkbox" id="required" name="AgreementAcknowledgement" required>
                                <p>
                                    I understand that the pet I am applying for may have been acquired or surrendered
                                    from a
                                    breeder or pet store. This may have been due to age, medical condition, color, or
                                    just
                                    not
                                    the right "look" to them. We do not guarantee age or breed as we do not DNA test.
                                </p>
                            </label>
                        </div>
                    </div>

                    <div class="form-btns">
                        <button class="next-btn" onclick="showSecondPage()">Next <i
                                class='bx bx-right-arrow-alt'></i></button>
                    </div>
                </div>



                <!----------------------------  End 1st Form -------------------------->


                <!------------------------------ 2nd Form - Further Questions Section -------------------->
                
                <div class="form" id="further-question" hidden>
                    <div class="app-title">
                        <h1>Further Questions</h1>
                    </div>
                        
                    <div class="fields">
                        <div class="input-field">
                            <p>Have you applied with any other rescue?</p>
                            <div class="radio-box">
                                <label>Yes
                                    <input type="radio" name="AppliedWithOtherRescue" value="1">
                                </label>
                                <label>No
                                    <input type="radio" name="AppliedWithOtherRescue" value="0" checked>
                                </label>
                            </div>

                        </div>

                        <div class="input-field">
                            <p>Are you twenty-one (21) years of age or older?</p>
                            <div class="radio-box">
                                <label>Yes
                                    <input type="radio" name="AgeConfirmation" value="1">
                                </label>
                                <label>No
                                    <input type="radio" name="AgeConfirmation" value="0" checked>
                                </label>
                            </div>

                        </div>

                        <div class="input-field">
                            <p>Who do you want to adopt this pet for?</p>
                            <select name="IntendedPetOwnershipType" id="who-adopt-for">
                                <option value="" selected disabled hidden>Select an option</option>
                                <option value="Another Pet">Another Pet</option>
                                <option value="Self">Self</option>
                                <option value="Family">Family</option>
                                <option value="Friend">Friend</option>
                                <option value="SO">Significant Other</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <p>Where will the animal be kept when you are home?</p>
                            <textarea name="PetKeptLocation" rows="3"></textarea>
                        </div>

                        <div class="input-field">
                            <p>How much time will the animal spend alone during the day?</p>
                            <textarea name="PetAloneTime" rows="3"></textarea>
                        </div>

                        <div class="input-field">
                            <p>Why did you choose to adopt?</p>
                            <textarea name="AdoptionReason" rows="7"></textarea>
                        </div>

                        <div class="input-field">
                            <p>For what reason would you justify giving up your pet?</p>
                            <textarea name="PetSurrenderJustification" rows="7"></textarea>
                        </div>

                        <div class="input-field">
                            <p>Where will your pet go when you are on vacation?</p>
                            <textarea name="PetVacationPlans" rows="3"></textarea>
                        </div>

                        <div class="input-field">
                            <p>In what type of home do you live in?</p>
                            <select name="HomeType" id="home-type">
                                <option value="" selected disabled hidden>Select an option</option>
                                <option value="single-fam">Single Family</option>
                                <option value="duplex">Duplex</option>
                                <option value="townhouse">Townhouse</option>
                                <option value="apartment">Apartment</option>
                                <option value="condominium">Condominium</option>
                                <option value="mob-home">Mobile Home</option>
                                <option value="mil-house">Military Housing</option>
                            </select>
                        </div>

                        

                        <div class="input-field">
                            <p>Is your yard fenced?</p>
                            <select name="YardFencingStatus" id="yard-fenced">
                                <option value="" selected disabled hidden>Select an option</option>
                                <option value="no-yard">No yard</option>
                                <option value="unfenced">Unfenced</option>
                                <option value="part-fenced">Partially fenced</option>
                                <option value="comp-fenced">Completely fenced</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <p>Do you live with parents or other relatives?</p>
                            <div class="radio-box">
                                <label>Yes
                                    <input type="radio" name="LivingWithRelatives" value="Yes">
                                </label>
                                <label>No
                                    <input type="radio" name="LivingWithRelatives" value="No">
                                </label>
                            </div>

                        </div>

                        <div class="input-field">
                            <p>Where do your current pets spend the majority of their day?</p>
                            <select name="CurrentPetsLocation" id="current-pets-location">
                                <option value="" selected disabled hidden>Select an option</option>
                                <option value="inside-only">Inside Only</option>
                                <option value="outside-only">Outside Only</option>
                                <option value="inside-outside">Inside & Outside</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-btns">
                        <button class="back-btn" onclick="showFirstPage()">Back <i
                                class='bx bx-left-arrow-alt'></i></button>
                        <button class="next-btn" onclick="showThirdPage()">Next <i
                                class='bx bx-right-arrow-alt'></i></button>
                    </div>
                </div>

                <!------------------------------ End 2nd Form  -------------------->



                <!----------------------3rd Form - Terms & Conditions Section ------------------------->
                <div class="form" id="terms-condition" hidden>
                    <div class="app-title">
                        <h1>Terms & Conditions</h1>
                    </div>
                    <div class="fields">
                        <div class="input-field">
                            <p>Paradise Pet Rescue is an independent, non-profit organization. We will in no way be held
                                responsible for any adult, child, and/or their property during the viewing process. In
                                agreeing to this form, you attest that you agree to release Paradise Pet Rescue and its
                                representatives from all liability for any property in your party while in the adoption
                                area.</p>
                            <div class="radio-box">
                                <label>Agree
                                    <input type="radio" name="TermsAgreement" value="Agree" required>
                                </label>
                                <label>Do Not Agree
                                    <input type="radio" name="TermsAgreement" value="Do Not Agree" required>
                                </label>
                            </div>

                        </div>

                        <div class="input-field">
                            <p>I certify that the information entered on this applicant is true. <br>Type your <b>FULL
                                    NAME</b>
                                as a signature:</p>
                            <input type="text" name="Signature" placeholder="Full Name" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-btns">
                        <button class="back-btn" onclick="showSecondPage()">Back <i
                                class='bx bx-left-arrow-alt'></i></button>
                        <button type="submit">Submit <i class='bx bx-check'></i></button>
                    </div>
                </div>

            </form>
        </section>

        <!----------------------End 3rd Form ------------------------->
          <section class="app-container" id="right">
            <div class="have-questions">
                <div class="ad-container">
                    <h4>What is</h4>
                    <span>Paradise Pet Rescue</span>
                    <label for="learn-more">Click here!</label>
                    <a href="../About Us Page/AboutUs.php">Learn more</a>
                </div>
            </div>

            <div class="donate">
                <div class="ad-container">
                    <h4>These animals NEED you!</h4>
                    <a href="../Donate Page/donate.php">Help Them!</a>
                </div>
            </div>
        </section>

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