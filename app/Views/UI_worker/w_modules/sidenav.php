<section class="sidenav">
    <div class="side-body">
        <div class="worker-profile">
            <div class="worker-img w-50"><img src="images/man.png" class="img-sm" alt=""></div>
            <div class="worker-stats w-50">
                <h3 class="tx-uc"><?php echo $_SESSION["user_name"]; ?></h3>
                <h4>Rating Scores:</h4>
                <div class="rating w-75">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <button class="btn btn-outline-dark w-100 my-3">
                    View Profile <i class="fa-solid fa-angles-right mx-3"></i>
                </button>
            </div>

        </div>
        <span class="line"></span>
        <div class="worker-categories">
            <h3 class="w-100 p-1">My Categories :</h3>
            <div class="categories">
                <span class="ctg-span">
                    Plumbing
                </span>
                <span class="ctg-span">
                    Electrical
                </span>
                <span class="ctg-span">
                    Add category +
                </span>

            </div>
        </div>
        <span class="line"></span>
        <div class="worker-active">
            <div class="sect-head">
                <h5><i class="fa-solid fa-triangle-exclamation mx-2 gld"></i>Active Jobs</h5>
                <a href="activeJobs"><button class="btn btn-text">View All >></button></a>
            </div>
            <div class="nav-card lr w-100 jsa">
                <div class="ctg-img">
                    <img src="images/plumbing.png" class="img-cd" alt="">
                </div>
                <div class="ud w-50">
                    <p>Jeanne's Kitchen Sink</p>
                    <a href="activeJobs"><button class="btn btn-primary">View Details</button></a>
                </div>
            </div>
        </div>
        <span class="line"></span>
        <div class="worker-active">
            <div class="sect-head">
                <h5><i class="fa-solid fa-business-time mx-2 br"></i>Pending requests</h5>
                <a href="jobRequests"><button class="btn btn-text">View All >></button></a>
            </div>
            <div class="nav-card lr w-100 jsa">
                <div class="ctg-img">
                    <img src="images/plumbing.png" class="img-cd" alt="">
                </div>
                <div class="ud w-50">
                    <p>Jeanne's Kitchen Sink</p>
                    <a href="jobRequests"><button class="btn btn-primary">View Details</button></a>
                </div>
            </div>
        </div>
        <span class="line"></span>
        <div class="logout-div ud  my-2">
            <a href=" <?php echo base_url("logout"); ?>">
                <button class="btn btn-danger logout" id="logout">
                    Log Out
                </button>
            </a>
            <a href="<?php echo base_url("admin_home") ?>" class="my-2 w-100">
                <button class="btn btn-primary">Admin</button>
            </a>
        </div>
        <div class="branding w-100 ">
            <a href="home">
                <img src="images/jobbed.png" alt="">
            </a>
            <p>©copyright JOBBED 2022</p>
        </div>
    </div>
</section>