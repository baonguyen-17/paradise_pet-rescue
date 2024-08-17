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

// Global variable to store the selected amount
var selectedAmount = 0;
const input = document.getElementById("custom-donate");

// Event listener to update selectedAmount when custom amount is entered
input.addEventListener('input', function() {
    selectedAmount = parseFloat(this.value) || 0; // Ensures that the selectedAmount is set to 0 if the input is not a number
});

// Updated function to only fill in the amount but not submit the form
function selectAmount(amount) {
    selectedAmount = amount;
    input.value = amount.toFixed(2); // Reflects the selected amount in the custom donation input field
}

// Function to handle form submission
function submitDonation() {
    var donationValue = parseFloat(selectedAmount);

    if (!isNaN(donationValue) && donationValue > 0) {
        alert('Thank you for your donation of $' + donationValue.toFixed(2) + '!');
        document.getElementById('donationForm').reset(); // Resets the form fields
        selectedAmount = 0; // Reset the selected amount
        setTimeout(function () {
            window.location.href = 'donate.php'; // Redirects to the donation page after 2 seconds
        }, 2000);
        return false; // Prevent form submission
    } else {
        alert('Please enter a valid donation amount.');
        return false; // Prevent form submission
    }
}
