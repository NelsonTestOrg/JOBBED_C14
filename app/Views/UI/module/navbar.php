<nav class="nav nav-container" id="navbar">
    <div class="logo-container">
        <img src="images/jobbed.png" alt="Logo">
    </div>
    <div class="menu-container" id="menu_options">
        <ul>
            <li>
                <a href="<?php echo base_url("/") ?>">
                    <button class="btn btn-outline-dark top-btns">
                        <i class="fa-solid fa-house px-2"></i>
                        Home
                    </button>
                </a>

            </li>
            <li>
                <a href="<?php echo base_url("services") ?>">
                    <button class="btn btn-outline-dark top-btns">
                        <i class="fa-solid fa-briefcase px-2"></i>
                        Services
                    </button>
                </a>

            </li>
            <li>
                <a href="<?php echo base_url("profile") ?>">
                    <button class="btn btn-outline-dark top-btns">
                        <i class="fa-solid fa-user-circle px-2"></i>
                        Profile
                    </button>
                </a>
            </li>
        </ul>
    </div>
    <div class="sign-in-options" id="verification">
        <button class="btn btn-primary" onclick="showModule()">
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