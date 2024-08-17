document.addEventListener('DOMContentLoaded', function() {
    fetchPets(currentPage); // Call fetchPets with the currentPage when the DOM is fully loaded
});

let currentPage = 1; // Initialize currentPage
let totalPages = 0; // totalPages will be set after fetching data

function fetchPets(page) {
    currentPage = page; // Update the current page number
    fetch(`fetch_pets.php?page=${currentPage}`) // Include the currentPage in the fetch request
        .then(response => response.json())
        .then(data => {
            totalPages = data.totalPages; // Update totalPages from the response
            const petsContainer = document.getElementById('pets');
            petsContainer.innerHTML = ''; // Clear existing entries

            data.pets.forEach(pet => { // Make sure to use data.pets to access the pets array
                const petDiv = document.createElement('div');
                petDiv.className = 'pet';
                petDiv.innerHTML = `
                    <img src="${pet.image_path}">
                    <div class="pet-id-name">
                        <p>${pet.PetID}</p>
                        <p>${pet.Name}</p>
                    </div>
                    <div class="hover">
                        <i class='bx bx-search'></i>
                    </div>
                `;
                petDiv.onclick = () => showPopUp(pet); // Keep the existing onclick event
                petsContainer.appendChild(petDiv);
            });

            updatePaginationControls(); // Call this function to update the page numbers
        })
        .catch(error => console.error('Error fetching pets:', error));
}

function updatePaginationControls() {
    const paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = ''; // Clear existing pagination controls

    // Generate and append Previous Page button if not on the first page
    if (currentPage > 1) {
        const prevPageButton = document.createElement('button');
        prevPageButton.innerText = 'Previous';
        prevPageButton.id = "prevPage";
        prevPageButton.onclick = () => fetchPets(currentPage - 1);
        paginationContainer.appendChild(prevPageButton);
    }

    // Generate page number buttons
    for (let i = 1; i <= totalPages; i++) {
        const pageButton = document.createElement('button');
        pageButton.innerText = i;
        pageButton.onclick = () => fetchPets(i);
        if (currentPage === i) pageButton.disabled = true; // Disable the current page button
        paginationContainer.appendChild(pageButton);
    }

    // Generate and append Next Page button if not on the last page
    if (currentPage < totalPages) {
        const nextPageButton = document.createElement('button');
        nextPageButton.innerText = 'Next';
        nextPageButton.id = "nextPage";
        nextPageButton.onclick = () => fetchPets(currentPage + 1);
        paginationContainer.appendChild(nextPageButton);
    }
}

function showPopUp(pet) {
    const popup = document.getElementById('popup');
    popup.innerHTML = `
        <div class="popup-container">
            <span class="close" onclick="closePopUp()">&times;</span>
            <div class="pet-info">
                <div class="left-section">
                    <h3>Pet ID: ${pet.PetID}</h3>
                    <img src="${pet.image_path}">
                </div>
                <div class="right-section">
                    <table>
                        <tr><th>Name:</th><td>${pet.Name}</td></tr>
                        <tr><th>Species:</th><td>${pet.Species}</td></tr>
                        <tr><th>Age:</th><td>${pet.Age} year(s)</td></tr>
                        <tr><th>Sex:</th><td>${pet.Sex}</td></tr>
                        <tr><th>Weight:</th><td>${pet.Weight} lb(s)</td></tr>
                        <tr><th>Color:</th><td>${pet.Color}</td></tr>
                        <tr><th>Spayed/Neutered:</th><td>${pet.SpayedNeutered === "1" ? 'Yes' : 'No'}</td></tr>
                        <tr><th>Intake Date:</th><td>${pet.IntakeDate}</td></tr>
                        <tr><th>Adoption Status:</th><td>${pet.AdoptionStatus}</td></tr>
                        <tr><th>Comments:</th><td>${pet.Comments ? pet.Comments : 'None'}</td></tr>
                        </table>
                </div>
            </div>

            <div class="adoption-process">
                <a href="../About Us Page/AboutUs.php">
                    <p>Learn out more about our adoption process</p>
                </a>
                <a href="#reclaim">
                    <p>If you believe this may be your missing pet, find out about our pet reclaim process.</p>
                </a>
            </div>
            <div class="contact-infos">
                <p>To find out more information, please email <a href="#email">information@paradisepetrescue.in</a> or call
                    970-123-4567 and reference this pet's ID number</p>
            </div>
        </div>
    `;
    popup.style.display = 'block'; // Show the popup
}

function closePopUp() {
    const popup = document.getElementById('popup');
    popup.style.display = 'none'; // Hide the popup
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

// ------------------------------------ View Vertical Nav Bar on diff. screen size ---------------------------

// New function to handle the search results
function handleSearchResults(data) {
    const petsContainer = document.getElementById('pets');
    petsContainer.innerHTML = ''; // Clear existing entries

    if (data.error) {
        petsContainer.innerHTML = '<p>' + data.error + '</p>';
        return;
    }

    // Create a new div element for the pet and set its onclick event
    const petDiv = document.createElement('div');
    petDiv.className = 'pet';
    petDiv.innerHTML = `
        <img src="${data.image_path}">
        <div class="pet-id-name">
            <p>${data.PetID}</p>
            <p>${data.Name}</p>
        </div>
    `;
    petDiv.onclick = () => showPopUp(data);
    petsContainer.appendChild(petDiv);
}

// Update to the existing searchPetID function
function searchPetID() {
    const IDKey = document.getElementById('petID').value;
    fetch('searchScript.php?petID=' + encodeURIComponent(IDKey))
        .then(response => response.json())
        .then(data => handleSearchResults(data))
        .catch(error => console.error('Error in search:', error));
}
