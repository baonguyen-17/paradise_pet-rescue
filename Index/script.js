
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