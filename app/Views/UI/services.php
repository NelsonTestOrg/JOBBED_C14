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
    <?php include("module/signIn.php");  ?>
    <section class="service-section">
        <div class="operation-message warning-2" id="warning">
            <p>Log in required!</p>
        </div>
        <div class="service-bar">
            <div class="page-head">
                <h1>SERVICES</h1>
            </div>
            <div class="pending-orders py-more">
                <?php
                if (isset($_SESSION['user_name'])) {
                    echo " <a href='request'>
                    <button class='btn btn-primary w-100'>
                        POST ISSUE
                        <i class='fa-solid fa-file-circle-plus mx-3'></i>
                    </button>
                </a>";
                } else {
                    echo "<button class='btn btn-primary w-25' id='request'>
                        POST ISSUE
                        <i class='fa-solid fa-file-circle-plus mx-3'></i>
                    </button>";
                }
                ?>
                <?php
                if (isset($_SESSION['user_name'])) {
                    echo " <a href='profile'>
                    <button class='btn btn-warning w-100'>
                        VIEW PENDING ORDERS
                        <i class='fa-solid fa-bell mx-3'></i>
                    </button>
                </a>";
                } else {
                    echo "<button class='btn btn-warning w-25 mx-4' id='request2'>
                    VIEW PENDING ORDERS
                    <i class='fa-solid fa-bell mx-3'></i>
                </button>";
                }
                ?>
                <a href="<?php echo base_url('categories'); ?>">
                    <button class="btn btn-dark p-2 w-100 tx-uc">
                        View All Categories <i class="fa-solid fa-angles-right px-2"></i>
                    </button>
                </a>
            </div>
            <!-- <div class="search-bar">
                <button>
                    <p class="m-0 p-0"> All Categories</p>
                    <i class="fa-solid fa-chevron-down mx-2"></i>
                </button>
                <input type="text" name="search_service" id="" class="search-field px-4" placeholder="I'm looking for ...">
                <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div> -->
       
        </div>
        <div class="main_container">
            <div class="items-page-link">
                <h3>Common Categories</h3>
            </div>
            <div class="list-view">
                <div class="category-item">
                    <img src="images/electrical.png" alt="">
                    <h2>Electrical</h2>
                </div>
                <div class="category-item">
                    <img src="images/gardening.png" alt="">
                    <h2>Gardening</h2>
                </div>
                <div class="category-item">
                    <img src="images/plumbing.png" alt="">
                    <h2>Plumbing</h2>
                </div>
                <div class="category-item">
                    <img src="assets/1658217933_e556505f84a3dc917b6c.png" alt="">
                    <h2>Movers</h2>
                </div>
            </div>
        </div>
    </section>
    <?php include("module/footer.php"); ?>
    <script src="js/main.js"></script>
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
        $(document).ready(function() {
        $(document).on('click', '#register', function() {
            if ($.trim($('#user_email').val()).length == 0 || $.trim($('#user_password').val()).length == 0) {
                $('#warning').fadeIn('slow', function() {
                    $('#warning').delay(3000).fadeOut();
                });
            } else {
                var data = {
                    'user_name': $('#user_name').val(),
                    'user_email': $('#user_email').val(),
                    'user_password': $('#user_password').val()
                };
                $.ajax({
                    url: "<?php echo base_url('data_handling/register') ?>",
                    method: 'POST',
                    data: data,
                    success: function(result) {


                        if (result == 1) {

                            $('#success').fadeIn('slow', function() {
                                $('#success').delay(3000).fadeOut();
                            });
                            $('#user_name').val("");
                            $('#user_email').val("");
                            $('#user_password').val("");

                        } else {
                            $('#error').fadeIn('slow', function() {
                                $('#error').delay(3000).fadeOut();
                            });
                        }
                    }
                })
            }

        });
        $(document).on('click', '#login', function() {
            if ($.trim($('#login-email').val()).length == 0 || $.trim($('#login-password').val()).length == 0) {
                $('#warning').fadeIn('slow', function() {
                    $('#warning').delay(3000).fadeOut();
                });
            } else {
                var data = {
                    'login_email': $('#login-email').val(),
                    'login_password': $('#login-password').val()
                };
                $.ajax({
                    url: "<?php echo base_url('data_handling/login') ?>",
                    method: 'POST',
                    data: data,
                    success: function(login_res) {
                        if (login_res == 1) {
                            $('#success_2').fadeIn('slow', function() {
                                $('#success_2').delay(3000).fadeOut();
                            });
                            $('#login-email').val("");
                            $('#login-password').val("");
                            window.location = 'home';

                        } else if (login_res == 0) {
                            $('#error').fadeIn('slow', function() {
                                $('#error').delay(3000).fadeOut();
                            });
                        } else {
                            alert("Deez NUts");
                        }
                    }
                })
            }
        });
    
    });
    </script>
</body>

</html>