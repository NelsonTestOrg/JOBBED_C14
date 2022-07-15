<nav class="nav nav-container" id="navbar">
    <div class="logo-container">
        <a href="home" class="h-100"><img src="images/jobbed.png" alt="Logo"></a>
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
                <?php
                if (isset($_SESSION['user_name'])) {
                    echo "<a href='" . base_url("profile") . "'>
                    <button class='btn btn-outline-dark top-btns'>
                        <i class='fa-solid fa-user-circle px-2'></i>
                        Profile
                    </button>
                </a> ";
                } else {
                    echo null;
                }

                ?>

            </li>
        </ul>
    </div>
    <div class="sign-in-options" id="verification">

        <?php
        if (!isset($_SESSION['user_name'])) {
            echo "<button class='btn btn-primary' onclick='showModule()'>
            Sign In
            <i class='fa-solid fa-arrow-right-to-bracket p-1'></i>
        </button>";
        } else {
            echo "<a href='" . base_url("profile") . "'><button class='btn btn-primary'>
            " . $_SESSION["user_name"] . "
            <i class='fa-solid fa-user-circle px-2'></i>
        </button></a>";
        }

        ?>


    </div>
    <div class="mobilebtn-div" id="mobilebtn-div">
        <button class="btn btn-primary menu-button" id="menu-button">
            <i class="fa-solid fa-bars" id="menu-button-icon"></i>
        </button>
    </div>
</nav>