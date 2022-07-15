<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("module/header.php"); ?>
</head>

<body>
    <?php include("module/navbar.php"); ?>
    <section class="service-section">
        <div class="service-bar">
            <div class="page-head">
                <h1>SERVICES</h1>
            </div>
        </div>
        <div class="main_container">
            <div class="svc-container">
                <div class="category-toggle m-0">
                    <h2>POST ISSUE</h2>
                </div>
                <div class="data-input">
                    <h5 class="part-detail w-25">
                        Issue category :
                    </h5>
                    <select name="category_name" id="" class="form-select w-50">
                        <option selected>Choose issue category eg. Electrical</option>
                        <option value="1">Electrical</option>
                    </select>
                    <select name="category_location" id="" class="form-select w-25">
                        <option value="2">Indoors</option>
                        <option value="1">Outdoors</option>
                    </select>

                </div>
                <hr class="line-sep">
                <div class="data-input">
                    <h5 class="part-detail w-25">
                        Issue description :
                    </h5>
                    <textarea name="description" id="" rows="5" class="form-control w-75"></textarea>
                </div>
                <hr class="line-sep">
                <div class="data-input">
                    <h5 class="part-detail w-25">
                        My location
                    </h5>
                    <div class="location w-75">
                        <input placeholder="eg. Strathmore, Keri Rd." type="text" name="" id="" class="form-control w-100">
                        <small class="form-text text-muted">Your location will be disclosed only after accepting your bid</small>
                    </div>
                </div>
                <hr class="line-sep">
                <div class="pending-orders py-3">
                    <button class="btn btn-primary w-25 mx-4">
                        <i class="fa-solid fa-file-circle-plus px-2"></i>
                        Post issue
                    </button>
                    <a href="<?php echo base_url("profile"); ?>" class="w-25 mx-4">
                        <button class="btn btn-warning w-100">
                            <i class="fa-solid fa-bell"></i>
                            View orders
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
        </div>
    </section>
    <?php include("module/footer.php"); ?>
</body>