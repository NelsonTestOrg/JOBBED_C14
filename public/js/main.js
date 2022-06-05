var icon = document.getElementById("icon");
var menu_mobile_btn = document.getElementById("menu-button");
var menu_mobile_icon = document.getElementById("menu-button-icon");
var menu_mobile_div = document.getElementById("mobilebtn-div");

var navbarX = document.getElementById("navbar");
var menu_div = document.getElementById("menu_options");
var verification_div = document.getElementById("verification");

var bigtext = document.getElementById("big-text");

if (navbarX.clientWidth <= 900) {

    //hides the big screen menu navbar
    menu_div.style.display = "none";
    verification_div.style.display = "none";
    bigtext.style.paddingInline = "5rem"

    //displays the menu button
    menu_mobile_div.style.display = "flex";
}

window.addEventListener('resize', function () {
    // console.log('hi')

    if (navbarX.clientWidth <= 900) {
        //hides the menu div and verif div
        menu_div.style.display = "none";
        verification_div.style.display = "none";

        //displays the button
        menu_mobile_div.style.display = "flex";
        menu_mobile_icon.className = "fa-solid fa-bars";

        //h1 text
        bigtext.style.paddingInline = "5rem"

    } else {
        //redisplays the menu div and verif div
        menu_div.style.display = "flex";
        menu_div.style.alignItems = "center";
        verification_div.style.display = "flex";

        //hides the mobile version button 
        menu_mobile_div.style.display = "none";
        bigtext.style.paddingInline = "20rem"

    }
})

menu_mobile_btn.addEventListener('click', function () {
    if (menu_mobile_icon.className == "fa-solid fa-bars") {
        menu_mobile_icon.className = "fa-solid fa-xmark";

    } else {
        menu_mobile_icon.className = "fa-solid fa-bars";
    }
})


const modulest = document.getElementById("loginModule");
const form_div = document.getElementById("form_div");

function closeModule() {
    modulest.style.display = "none";
}

function showModule() {
    modulest.style.display = "flex";
}


//js to listen to the click on the translucent module
modulest.addEventListener('click', e => {
    if (e.target == modulest) {
        modulest.style.display = "none";
    }
    e.stopPropagation();
}, {
    capture: true
})






