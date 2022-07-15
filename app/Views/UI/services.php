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
        <div class="operation-message warning-2" id="warning">
            <p>Log in required!</p>
        </div>
        <div class="service-bar">
            <div class="page-head">
                <h1>SERVICES</h1>
            </div>
            <div class="pending-orders py-2">
                <?php
                if (isset($_SESSION['user_name'])) {
                    echo " <a href='request'>
                    <button class='btn btn-primary w-100'>
                        POST ISSUE
                        <i class='fa-solid fa-file-circle-plus'></i>
                    </button>
                </a>";
                } else {
                    echo "<button class='btn btn-primary w-25' id='request'>
                        POST ISSUE
                        <i class='fa-solid fa-file-circle-plus'></i>
                    </button>";
                }
                ?>
                <?php
                if (isset($_SESSION['user_name'])) {
                    echo " <a href='profile'>
                    <button class='btn btn-warning w-100'>
                        VIEW PENDING ORDERS
                        <i class='fa-solid fa-bell'></i>
                    </button>
                </a>";
                } else {
                    echo "<button class='btn btn-warning w-25 mx-4' id='request2'>
                    VIEW PENDING ORDERS
                    <i class='fa-solid fa-bell'></i>
                </button>";
                }
                ?>

            </div>
            <div class="search-bar">
                <button>
                    <p class="m-0 p-0"> All Categories</p>
                    <i class="fa-solid fa-chevron-down mx-2"></i>
                </button>
                <input type="text" name="search_service" id="" class="search-field px-4" placeholder="I'm looking for ...">
                <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="view-all w-100 px-3">
                <a href="<?php echo base_url('categories'); ?>">
                    <button class="btn btn-dark p-2">
                        View All Categories >>
                    </button>
                </a>

            </div>
        </div>
        <div class="main_container">
            <div class="items-page-link">
                <h3>Common Categories</h3>
            </div>
            <div class="list-view">
                <div class="category-item">
                    <img src="images/gardening.png" alt="">
                    <h2>Gardening</h2>
                </div>
                <div class="category-item">
                    <img src="images/gardening.png" alt="">
                    <h2>Gardening</h2>
                </div>
                <div class="category-item">
                    <img src="images/gardening.png" alt="">
                    <h2>Gardening</h2>
                </div>
                <div class="category-item">
                    <img src="images/gardening.png" alt="">
                    <h2>Gardening</h2>
                </div>
            </div>
        </div>
    </section>
    <?php include("module/footer.php"); ?>
    <script>
        $(document).on('click', '#request', function() {
            $('#warning').fadeIn('slow', function() {
                $('#warning').delay(1000).fadeOut();
            });
        });
        $(document).on('click', '#request2', function() {
            $('#warning').fadeIn('slow', function() {
                $('#warning').delay(1000).fadeOut();
            });
        });
    </script>
</body>

</html>