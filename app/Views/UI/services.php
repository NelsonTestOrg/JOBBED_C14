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
            <div class="pending-orders py-2">
                <buton class="btn btn-primary">
                    VIEW PENDING ORDERS
                    <i class="fa-solid fa-bell px-2"></i>
                </buton>
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
                <button class="btn btn-dark p-2">
                    View All Categories >>
                </button>
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
</body>

</html>