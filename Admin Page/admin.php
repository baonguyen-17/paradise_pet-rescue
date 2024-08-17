<?php
session_start(); // Start the session to access the session variables
if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header('Location: ../Login Form/login.html'); // Redirect non-admins
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradise Pet Rescue | Admin Dashboard</title>
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="pop-up-style.css">
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
            <h1>Admin Dashboard</h1>
        </div>
    </header>

    <!--  End Navigation bar + header -->



    <!-- Main body -->

    <main class="main-container">

        <div class="section">
            <h1 class="section-title">Analytics</h1>
            <div id="statistics" class="statistics">
                <div class="stat-container">
                    <h3 class="stat-title">Sign Ups</h3>
                    <div class="stat-content">
                        <div class="stat-symbol">
                            <i class='bx bxs-user'></i>
                        </div>
                        <div class="stat-num">
                            <h4>24</h4>
                            <p><span>+15%</span> from last month</p>
                        </div>


                    </div>
                </div>

                <div class="stat-container">
                    <h3 class="stat-title">Donation</h3>

                    <div class="stat-content">
                        <div class="stat-symbol">
                            <i class='bx bxs-donate-heart'></i>
                        </div>
                        <div class="stat-num">
                            <h4>$5,000</h4>
                            <p><span>+25%</span> from last month</p>
                        </div>
                    </div>
                </div>

                <div class="stat-container">
                    <h3 class="stat-title">Adoptions</h3>

                    <div class="stat-content">
                        <div class="stat-symbol">
                            <i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="stat-num">
                            <h4>65</h4>
                            <p><span>+25%</span> from last month</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- End Analytics section -->


        <!----------------------- Update section ------------------------------------>

        <div class="section">
            <h1 class="section-title">Updates</h1>
            <div class="tables-container">

                <div class="table" id="new-logins">
                    <h3 class="table-title"><i class='bx bxs-key'></i>New Logins</h3>
                    <div class="table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Login Date</th>
                                    <th>Login Time (UTC)</th>
                                    <th>IP Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Logins will be loaded here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>




                <div class="table" id="new-applications">
                    <h3 class="table-title"><i class='bx bxs-file-plus'></i>New Applications</h3>
                    <div class="table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Application ID</th>
                                    <th>Name</th>
                                    <th>Application Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <!-------------------------- End Updates section ---------------------------->

        <!-- Edit Database Section -->
        <div class="section">
            <h1 class="section-title">Edit Database</h1>
            <div class="data-container">
                <div class="data-edits">
                    <div class="edit-symbol" onclick="showAddPet()">
                        <i class='bx bxs-plus-circle'></i>
                    </div>
                    <h4>Add A Pet</h4>
                </div>
                <div class="search-box">
                    <h4 class="search-title">Search for Pet Entry (by PetID)</h4>
                    <div class="search-container">
                        <i class='bx bx-search-alt'></i>
                        <input type="text" id="searchKeyword" placeholder="Enter PetID to begin search">
                        <button id="search-keyword" class="btn" onclick="searchPet()">Search</button>
                    </div>
                </div>
                <div id="search-result" class="search-result result-container">

                    


                    <!-- Pet Search Results will be populated here -->
                </div>
            </div>
        </div>
        <!-- End Edit Database Section -->





        <!--------------------------------------------- Pop up section ----------------------------------------------->


        <!---------------------------------------- Add pet pop up --------------------------------------------------->



        <div id="add-pet-popup" class="popup">
            <div class="popup-container">
                <span class="close" onclick="closeAddPet()">&times;</span>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <h1 class="form-title">Add Pet Entry</h1>

                    <div class="form-content">
                        <div class="info-section">
                            <div class="input-field">
                                <label for="name"> Pet Name</label>
                                <input type="text" name="petName" id="petName" placeholder="Name" autofocus required>
                            </div>

                            <div class="input-field">
                                <label for="species">Species</label>
                                <select name="species" id="species" required>
                                    <option value="Dog">Dog</option>
                                    <option value="Cat">Cat</option>
                                    <option value="Bird">Bird</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label for="age">Age</label>
                                <input type="text" name="age" id="age" placeholder="Age (in years)" required>
                            </div>

                            <div class="input-field">
                                <label for="sex">Sex</label>
                                <select name="sex" id="sex" class="droplist" required>
                                    <option value="" hidden>Select one</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="unknown">Unknown</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label for="weight">Weight</label>
                                <input type="number" name="weight" id="weight" placeholder="Weight (in pounds)"
                                    required>
                            </div>

                            <div class="input-field">
                                <label for="color">Color</label>
                                <input type="text" name="color" id="color" placeholder="Color" required>
                            </div>

                            <div class="input-field">
                                <label for="intake-date">Intake Date</label>
                                <input type="date" name="intake-date" id="intake-date" placeholder="mm/dd/yyyy"
                                    required>
                            </div>

                            <div class="input-field">
                                <label for="spayed-neutered">Spayed/Neutered</label>
                                <input type="checkbox" name="spayed-neutered" id="spayed-neutered">
                            </div>

                            <div class="input-field">
                                <label for="comments">Comments</label>
                                <textarea name="comments" id="comments" placeholder="Enter your comments here..."
                                    rows="5" maxlength="255" required oninput="updateCharacterCount()"></textarea>
                                <div id="charCount">255 characters left</div>
                            </div>

                        </div>

                        <div class="img-upload-area" id="drop-area">
                            <input type="file" id="petPhoto" name="petPhoto" accept="image/*"
                                onchange="displayFileName()" hidden>
                            <label for="petPhoto" class="upload-zone">
                                <i class='bx bxs-cloud-upload'></i>
                                <p>Drag & drop or click here <br> to upload image</p>
                            </label>
                            <span id="file-name-display">No file selected</span>
                        </div>


                    </div>

                    <div class="submit-btn">
                        <button type="submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>


        <!---------------------------------------- End Add pet pop up --------------------------------------------------->

        <!-- Pet Edit Popup -->
        <div id="edit-pet-popup" class="popup">
            <div class="popup-container">
                <span class="close" onclick="closeEditPetPopup()">&times;</span>
                <form id="editPetForm" action="updatePet.php" method="post" enctype="multipart/form-data">
                    <h1 class="form-title">Edit Pet Entry</h1>
                    <div class="form-content">
                        <!-- Hidden field for PetID -->
                        <div class="info-section">
                            <input type="hidden" name="PetID" id="petId" value="">

                            <!-- Pet Name -->
                            <div class="input-field">
                                <label for="name">Pet Name</label>
                                <input type="text" name="Name" id="name" placeholder="Name" required>
                            </div>
                            <!-- Species -->
                            <div class="input-field">
                                <label for="species">Species</label>
                                <input type="text" name="Species" id="species" placeholder="Species" required>
                            </div>
                            <!-- Age -->
                            <div class="input-field">
                                <label for="age">Age</label>
                                <input type="text" name="Age" id="age" placeholder="Age" required>
                            </div>
                            <!-- Sex -->
                            <div class="input-field">
                                <label for="sex">Sex</label>
                                <select name="Sex" id="sex" required>
                                    <option value="">Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Unknown">Unknown</option>
                                </select>
                            </div>
                            <!-- Weight -->
                            <div class="input-field">
                                <label for="weight">Weight</label>
                                <input type="number" name="Weight" id="weight" placeholder="Weight" required>
                            </div>
                            <!-- Color -->
                            <div class="input-field">
                                <label for="color">Color</label>
                                <input type="text" name="Color" id="color" placeholder="Color" required>
                            </div>
                            <!-- Spayed/Neutered -->
                            <div class="input-field">
                                <label for="spayedNeutered">Spayed/Neutered</label>
                                <!-- Checkbox for Spayed/Neutered -->
                                <input type="checkbox" name="SpayedNeutered" id="spayedNeutered" value="1">
                            </div>
                            <!-- Intake Date -->
                            <div class="input-field">
                                <label for="intakeDate">Intake Date</label>
                                <input type="date" name="IntakeDate" id="intakeDate" required>
                            </div>
                            <!-- Comments -->
                            <div class="input-field">
                                <label for="comments">Comments</label>
                                <textarea name="Comments" id="comments" placeholder="Comments" rows="7" maxlength="255"
                                    required></textarea>
                            </div>
                            <!-- Pet Image Hidden -->
                            <input type="hidden" name="ImagePath" id="imagePath">

                            <!-- Submit Button -->
                            <div class="submit-btn">
                                <button type="submit">Update</button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
        <!-- End Pet Edit Popup -->
        <!---------------------------------------- View application pop up --------------------------------------------------->

        <div id="view-app-popup" class="popup">
            <div class="popup-container">
                <span class="close" onclick="closeViewApp()">&times;</span>



                <h1 class="app-id" data-field="hiddenApplicationID">#</h1>

                <section id="personal">
                    <h3 class="section-title">Personal Info</h3>
                    <div class="info-section">
                        <table>
                            <tr>
                                <th>Name</th>
                                <td data-field="name"></td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td data-field="phoneNumber"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td data-field="email"></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td data-field="address"></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td data-field="city"></td>
                            </tr>
                            <tr>
                                <th>State/Province</th>
                                <td data-field="stateProvince"></td>
                            </tr>
                            <tr>
                                <th>Postal Code</th>
                                <td data-field="postalCode"></td>
                            </tr>
                        </table>
                        <div class="pet-image">
                            <img src="images/dogsplaying.jpg" alt="Pet Image">
                            <h3>Pet ID: <span data-field="petID"></span></h3>
                        </div>
                    </div>

                </section>

                <section id="application">
                    <h3 class="section-title">Application</h3>
                    <table>
                        <tr>
                            <th>Have you applied with any other rescue?</th>
                            <td data-field="appliedWithOtherRescue"></td>
                        </tr>
                        <tr>
                            <th>Are you twenty-one (21) years of age or older?</th>
                            <td data-field="ageConfirmation"></td>
                        </tr>
                        <tr>
                            <th>Who do you want to adopt this pet for?</th>
                            <td data-field="intendedPetOwnershipType"></td>
                        </tr>
                        <tr>
                            <th>Where will the animal be kept when you are home?</th>
                            <td data-field="petKeptLocation"></td>
                        </tr>
                        <tr>
                            <th>How much time will the animal spend along during the day?</th>
                            <td data-field="petAloneTime"></td>
                        </tr>
                        <tr>
                            <th>Why did you choose to adopt?</th>
                            <td data-field="adoptionReason"></td>
                        </tr>
                        <tr>
                            <th>For what reason would you justify giving up your pet?</th>
                            <td data-field="petSurrenderJustification"></td>
                        </tr>
                        <tr>
                            <th>Where will your pet go when you are on vacation?</th>
                            <td data-field="petVacationPlans"></td>
                        </tr>
                        <tr>
                            <th>What type of home do you live in?</th>
                            <td data-field="homeType"></td>
                        </tr>
                        <tr>
                            <th>Is your yard fenced?</th>
                            <td data-field="yardFencingStatus"></td>
                        </tr>
                        <tr>
                            <th>Do you live with parents or other relatives?</th>
                            <td data-field="livingWithRelatives"></td>
                        </tr>
                        <tr>
                            <th>Where do your current pets spend the majority of their day?</th>
                            <td data-field="currentPetsLocation"></td>
                        </tr>
                        <tr>
                            <th>I certify that the information entered on this applicant is true. Type your FULL NAME.
                            </th>
                            <td data-field="signature"></td>
                        </tr>
                    </table>
                </section>

                <form action="update_status.php" method="post">
                    <!-- The hidden input for applicationID will be inserted here by your JavaScript -->
                    <input type="hidden" name="applicationID" id="hiddenApplicationId" value="">
                    <div class="accept-deny">
                        <button type="submit" class="btn" name="status" value="Approved" id="accept">ACCEPT</button>
                        <button type="submit" class="btn" name="status" value="Rejected" id="deny">DENY</button>
                    </div>
                </form>

            </div>
            <!---------------------------------------- End View application pop up --------------------------------------------------->

        </div>



        <!--------------------------------------------- End Pop up sections ----------------------------------------------->



    </main>



    <!-- End Main body -->


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


    <script src="script.js" defer></script>
</body>

</html>