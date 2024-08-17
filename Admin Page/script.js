//fetch login
function fetchLogins() {
    fetch('fetch_logins.php')
        .then(response => response.json())
        .then(data => {
            const loginsTableBody = document.querySelector('#new-logins tbody');
            loginsTableBody.innerHTML = ''; // Clear existing entries

            data.forEach(login => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${login.username}</td>
                    <td>${login.loginDate}</td>
                    <td>${login.loginTime}</td>
                    <td>${login.ipAddress}</td>
                `;
                loginsTableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching logins:', error));
}

// call fetchLogins when the window loads:
window.addEventListener('load', fetchLogins);


//edit pet
function attachEditEventListeners() {
    var editButtons = document.querySelectorAll('.edit-pet-btn');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var petId = this.getAttribute('data-petid');
            showEditPetPopup(petId);
        });
    });
}

function searchPet() {
  var searchKeyword = document.getElementById('searchKeyword').value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Insert the search results into the page
      document.getElementById('search-result').innerHTML = this.responseText;

      // Now we add the event listeners to each edit button that came with the search results
      var editButtons = document.getElementsByClassName('edit-pet-btn');
      Array.from(editButtons).forEach(function(editButton) {
        editButton.addEventListener('click', function() {
          var petId = this.getAttribute('data-petid');
          showEditPetPopup(petId);
        });
      });
    }
  };
  xhttp.open("GET", "searchScript.php?petID=" + encodeURIComponent(searchKeyword), true);
  xhttp.send();
}

function showEditPetPopup(petId) {
    // TODO: Make an AJAX call to fetch the pet's data and populate the form
    document.getElementById('petId').value = petId;
    // Additional form population code goes here
    document.getElementById('edit-pet-popup').classList.add("active");
    // When populating the form
    document.getElementById('spayedNeutered').checked = data.SpayedNeutered == 1;

}

function closeEditPetPopup() {
    document.getElementById('edit-pet-popup').classList.remove("active");
}


//Update character counnt
function updateCharacterCount() {
    var textarea = document.getElementById("comments");
    var remaining = 255 - textarea.value.length;
    var message = document.getElementById("charCount");
    message.textContent = remaining + " characters left";
}

//Update application status
document.getElementById('accept').addEventListener('click', function() {
    this.form.submit();
});

document.getElementById('deny').addEventListener('click', function() {
    this.form.submit();
});

document.addEventListener('DOMContentLoaded', function() {
    fetchApplications();
    
    var dropArea = document.getElementById('drop-area');
    var fileInput = document.getElementById('petPhoto');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => dropArea.classList.add('highlight'), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => dropArea.classList.remove('highlight'), false);
    });

    dropArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        var dt = e.dataTransfer;
        var files = dt.files;

        fileInput.files = files;
        displayFileName();
    }

    function displayFileName() {
        var file = fileInput.files[0];
        if (file) {
            document.getElementById('file-name-display').textContent = 'Selected file: ' + file.name;
        }
    }

    function showAddPet(){
        let popup = document.getElementById("add-pet-popup");
    
        popup.classList.add("active");
    }

    function closeAddPet() {
        let popup = document.getElementById("add-pet-popup");
    
        popup.classList.remove("active");
    }

    // Pop-up logic (assuming you have buttons or elements with these IDs)
    const addPetButton = document.getElementById('addPetButton');
    if (addPetButton) {
        addPetButton.addEventListener('click', showAddPet);
    }
    
    const closeButtons = document.querySelectorAll('.close');
    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            button.closest('.popup').classList.remove("active");
        });
    });


});

function fetchApplications() {
    fetch('fetch_applications.php')
        .then(response => response.json())
        .then(data => {
            const applicationsTableBody = document.querySelector('#new-applications tbody');
            applicationsTableBody.innerHTML = ''; // Clear existing entries

            data.forEach(application => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${application.applicationID}</td>
                    <td>${application.firstName} ${application.lastName}</td>
                    <td>${application.applicationStatus}</td>
                    <td><button class="btn" onclick="showApplicationDetails(${application.applicationID})">Details</button></td>
                `;
                applicationsTableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching applications:', error));
}

function showApplicationDetails(applicationID) {
    fetch('fetch_applications.php?applicationID=' + applicationID)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Check what data you received
            populateApplicationPopup(data, applicationID);
            document.getElementById('view-app-popup').classList.add("active");
        })
        .catch(error => console.error('Error:', error));
}


function populateApplicationPopup(data, applicationID) {
    var application = data.find(app => app.applicationID == applicationID); 
    if (application) {
        document.getElementById('hiddenApplicationId').value = application.applicationID;
        document.querySelector(".app-id").textContent = '#' + application.applicationID;
    }
    // Assuming 'application' is an object with all the necessary properties.
    // Personal Info Section
    document.querySelector("#view-app-popup [data-field='name']").textContent = application.firstName + ' ' + application.lastName;
    document.querySelector("#view-app-popup [data-field='phoneNumber']").textContent = application.phoneNumber;
    document.querySelector("#view-app-popup [data-field='email']").textContent = application.email;
    document.querySelector("#view-app-popup [data-field='address']").textContent = application.address;
    document.querySelector("#view-app-popup [data-field='city']").textContent = application.city;
    document.querySelector("#view-app-popup [data-field='stateProvince']").textContent = application.stateProvince;
    document.querySelector("#view-app-popup [data-field='postalCode']").textContent = application.postalCode;

    // Application Section
    document.querySelector("#view-app-popup [data-field='appliedWithOtherRescue']").textContent = application.appliedWithOtherRescue ? "Yes" : "No";
    document.querySelector("#view-app-popup [data-field='ageConfirmation']").textContent = application.ageConfirmation ? "Yes" : "No";
    document.querySelector("#view-app-popup [data-field='intendedPetOwnershipType']").textContent = application.intendedPetOwnershipType;
    document.querySelector("#view-app-popup [data-field='petKeptLocation']").textContent = application.petKeptLocation;
    document.querySelector("#view-app-popup [data-field='currentPetsLocation']").textContent = application.currentPetsLocation;
    document.querySelector("#view-app-popup [data-field='petAloneTime']").textContent = application.petAloneTime;
    document.querySelector("#view-app-popup [data-field='adoptionReason']").textContent = application.adoptionReason;
    document.querySelector("#view-app-popup [data-field='petSurrenderJustification']").textContent = application.petSurrenderJustification;
    document.querySelector("#view-app-popup [data-field='petVacationPlans']").textContent = application.petVacationPlans;
    document.querySelector("#view-app-popup [data-field='homeType']").textContent = application.homeType;
    document.querySelector("#view-app-popup [data-field='yardFencingStatus']").textContent = application.yardFencingStatus;
    document.querySelector("#view-app-popup [data-field='livingWithRelatives']").textContent = application.livingWithRelatives ? "Yes" : "No";
    document.querySelector("#view-app-popup [data-field='currentPetsLocation']").textContent = application.currentPetsLocation;
    document.querySelector("#view-app-popup [data-field='signature']").textContent = application.signature;

    // Update the Pet ID if present in the application object
    if (application.petID) {
        document.querySelector("#view-app-popup [data-field='petID']").textContent = application.petID;
    }

     // Image Section
    if (application.image_path) {
        document.querySelector("#view-app-popup .pet-image img").src = application.image_path;
    }
}

function showAddPet(){
    let popup = document.getElementById("add-pet-popup");

    popup.classList.add("active");
}


function closeAddPet() {
    let popup = document.getElementById("add-pet-popup");

    popup.classList.remove("active");
}


function viewApp() {
    let popup = document.getElementById("view-app-popup");

    popup.classList.add("active");
}

function closeViewApp() {
    let popup = document.getElementById("view-app-popup");
    popup.classList.remove("active");
}

// ------------------------------------ View Vertical Nav Bar on diff. screen size ---------------------------

function showVerticalNav() {
    let checkbox = document.getElementById("burger-menu");
    let navItems = document.getElementById("nav-links");
    let burger = document.getElementById("navbar-burger");

    if (checkbox.checked == true) {     
        burger.style.position = "fixed";
        navItems.classList.add("vertical");
    }
    else {
        burger.style.position = "absolute";
        navItems.classList.remove("vertical");
    }
}