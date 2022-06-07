<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body>
    <nav class="nav nav-container" id="navbar">
        <div class="logo-container">
            <img src="images/GigRfilled.png" alt="Logo">
        </div>
        <div class="menu-container" id="menu_options">
            <ul>
                <li>
                    <button class="btn btn-light">
                        <i class="fa-solid fa-house"></i>
                        Home
                    </button>
                </li>
                <li>
                    <button class="btn btn-light">
                        <i class="fa-solid fa-circle-info"></i>
                        About us
                    </button>
                </li>
                <li>
                    <button class="btn btn-light">
                        <i class="fa-solid fa-headset"></i>
                        Contact us
                    </button>
                </li>
            </ul>
        </div>
        <div class="sign-in-options" id="verification">
            <button class="btn btn-outline-primary" onclick="showModule()">
                Sign In
                <i class="fa-solid fa-arrow-right-to-bracket p-1"></i>
            </button>

        </div>
        <div class="mobilebtn-div" id="mobilebtn-div">
            <button class="btn btn-primary menu-button" id="menu-button">
                <i class="fa-solid fa-bars" id="menu-button-icon"></i>
            </button>
        </div>
    </nav>
    <?php include("module/signIn.php");  ?>
    <section class="first-section">
        <div class="seller-text">
            <h1 id="big-text">
                taking care of your home needs
            </h1>
            <h4>
                Finding someone to run your errands, get your engine fixed? We have someone for everyone.
            </h4>
        </div>
        <div class="search-pane p-4 m-4 w-100">
            <input class="form-control form-control-lg w-50" type="text" placeholder="Which services are you looking for?">
            <button class="btn btn-primary mx-2">
                Let's get connected
            </button>
        </div>
    </section>
    <section class="promo-section">
        <div class="promo-container">
            <div class="promo-header m-3 p-4">
                <h3>Popular Services</h3>
            </div>
            <div class="line mx-4"></div>
            <div class="promo-items p-4 m-3" id="promo-list">
                <div class="card-holder p-3 m-2">
                    <img src="images/cleaning.jpg" alt="" class="promo-image">
                </div>
                <div class="card-holder p-3 m-2">
                    <img src="images/cleaning.jpg" alt="" class="promo-image">
                </div>
                <div class="card-holder p-3 m-2">
                    <img src="images/cleaning.jpg" alt="" class="promo-image">
                </div>

            </div>
        </div>
    </section>


</body>
<!-- js files -->
<script src="js/main.js"></script>

</html>