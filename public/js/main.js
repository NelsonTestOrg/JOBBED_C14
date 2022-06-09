var icon = document.getElementById("icon");
var menu_mobile_btn = document.getElementById("menu-button");
var menu_mobile_icon = document.getElementById("menu-button-icon");
var menu_mobile_div = document.getElementById("mobilebtn-div");

var promo_dlist = document.getElementById("promo-list");

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

    //changes list display
    promo_dlist.style.flexWrap = "wrap";
}



window.addEventListener('resize', function () {


    if (navbarX.clientWidth <= 900) {
        //hides the menu div and verif div
        menu_div.style.display = "none";
        verification_div.style.display = "none";

        //displays the button
        menu_mobile_div.style.display = "flex";
        menu_mobile_icon.className = "fa-solid fa-bars";

        //h1 text
        bigtext.style.paddingInline = "5rem"

        //changes list display
        promo_dlist.style.flexWrap = "wrap";
        promo_dlist.style.justifyContent = "center";

    } else {
        //redisplays the menu div and verif div
        menu_div.style.display = "flex";
        menu_div.style.alignItems = "center";
        verification_div.style.display = "flex";

        //hides the mobile version button 
        menu_mobile_div.style.display = "none";
        bigtext.style.paddingInline = "20rem"

        //changes list display
        promo_dlist.style.flexWrap = "nowrap";
        promo_dlist.style.justifyContent = "space-between";

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

var reg_link_btn = document.getElementById("register_link_btn");
var login_link_btn = document.getElementById("login_link_btn");
var signIn_form_div = document.getElementById("sign_in_form_div");
var signUp_form_div = document.getElementById("sign_up_form_div");

function closeModule() {
    modulest.style.display = "none";
}

function showModule() {
    modulest.style.display = "flex";
}

//switches between the login and register pages
reg_link_btn.addEventListener("click", e => {
    signUp_form_div.style.display = "block";
    signIn_form_div.style.display = "none";
})
login_link_btn.addEventListener("click", e => {
    signIn_form_div.style.display = "block";
    signUp_form_div.style.display = "none";
})



//js to listen to the click on the translucent module
modulest.addEventListener('click', e => {
    if (e.target == modulest) {
        modulest.style.display = "none";
    }
}, {
    capture: true
})


window.addEventListener("scroll", function () {
    var page = document.getElementById("main-body");

    let offset = window.pageYOffset;
    console.log(offset);
    page.style.backgroundPositionY = offset * 0.8 + "px";
})
