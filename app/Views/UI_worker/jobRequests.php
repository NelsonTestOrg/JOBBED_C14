<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("w_modules/header.php"); ?>
</head>

<body>
    <section class="main-body">
        <?php include("w_modules/navbar.php"); ?>
        <div class="bgw aic ud w-100 my-2 c-3 h-fit px-1 py-1">
            <div class="t-head py-4">
                <h2>Job Requests</h2>
            </div>
            <span class="line my-2"></span>
            <div class="list ud w-100 px-3 py-2">
                <div class="job-card lr my-2 aic jsb w-100 bg-grey c-3">
                    <div class="prof_data p-3 ud jcc aic w-fc">
                        <img src="images/man.png" alt="" class="img-sm">
                        <h5>Beth Mariko</h5>
                    </div>
                    <div class="issue w-75 ud">
                        <div class="lr px-3 aic jcs">
                            <h4>Category :</h4>
                            <span class="ctg-span-w">Plumbing</span>
                            <span class="ctg-span-w">Electrical</span>
                        </div>
                        <span class="line bg-white"></span>
                        <div class="lr px-3">
                            <h4 class="w-25">Details :</h4>
                            <p class="w-50">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis non, culpa vel temporibus similique accusamus autem sapiente architecto error illum repellendus expedita mollitia odit nesciunt? Repudiandae dicta voluptatibus officiis vitae?</p>
                        </div>
                        <span class="line bg-white"></span>
                        <div class="stats lr jsb aic px-3 py-2 w-100">
                            <div class="status lr aic jcc">
                                <h5>Status</h5>
                                <span class="ctg-span bg-gold">PENDING</span>
                            </div>
                            <div class="avg lr aic">
                                <h5>My bid:</h5>
                                <span class="ctg-span-w bg-yellow">Ksh.500</span>
                            </div>
                            <div class="b aic px-4 w-25">
                                <button class="btn btn-warning w-100"><i class="fa-solid fa-person-through-window mx-2"></i>End Request</button>
                            </div>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section>
    <section class="sidenav">
        <div class="side-body">
            <div class="worker-profile">
                <div class="worker-img w-50"><img src="images/man.png" class="img-sm" alt=""></div>
                <div class="worker-stats w-50">
                    <h3>David Sanchez</h3>
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
                    <button class="btn btn-text">View All >></button>
                </div>
                <div class="nav-card lr w-100 jsa">
                    <div class="ctg-img">
                        <img src="images/plumbing.png" class="img-cd" alt="">
                    </div>
                    <div class="ud w-50">
                        <p>Jeanne's Kitchen Sink</p>
                        <button class="btn btn-primary">View Details</button>
                    </div>
                </div>
            </div>
            <span class="line"></span>
            <div class="worker-active">
                <div class="sect-head">
                    <h5><i class="fa-solid fa-business-time mx-2 br"></i>Pending requests</h5>
                    <button class="btn btn-text">View All >></button>
                </div>
                <div class="nav-card lr w-100 jsa">
                    <div class="ctg-img">
                        <img src="images/plumbing.png" class="img-cd" alt="">
                    </div>
                    <div class="ud w-50">
                        <p>Jeanne's Kitchen Sink</p>
                        <button class="btn btn-primary">View Details</button>
                    </div>
                </div>
            </div>
            <span class="line"></span>
            <div class="logout-div my-2">
                <a href=" <?php echo base_url("logout"); ?>">
                    <button class="btn btn-danger logout" id="logout">
                        Log Out
                    </button>
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


</body>