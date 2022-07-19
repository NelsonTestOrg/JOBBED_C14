<navbar class="nav w-100 bg-dark aic c-w bb-white">
    <div class="logo-container w-75 lr aic jcc">
        <a href="w-landing"></a><img src="images/jobbed_w.png" class="img-sm" alt="">
    </div>
    <div class="admin-profile lr w-25 bl-white h-100">
        <div class="img">
            <img src="images/man.png" class="img-xsm" alt="">
        </div>
        <div class="details">
            <h3><?php echo $_SESSION['user_name']?></h3>
            <h5><?php echo $_SESSION['user_email']?></h5>
        </div>
        <div class="view aic ud jcc px-3">
            <button class="btn btn-outline-secondary">
                <i class="fa-solid fa-circle-chevron-right"></i>
            </button>
        </div>
    </div>
</navbar>