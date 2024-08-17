
function showFirstPage () {
    document.getElementById("further-question").hidden = true;
    document.getElementById("personal-info").hidden = false;
}


function showSecondPage(){
    document.getElementById("personal-info").hidden = true;
    document.getElementById("terms-condition").hidden = true;
    document.getElementById("further-question").hidden = false;
}

function showThirdPage () {
    document.getElementById("further-question").hidden = true;
    document.getElementById("terms-condition").hidden = false;
}



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
