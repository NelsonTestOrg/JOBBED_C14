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

    <section class="first-section" id="main-body">
        <div class="page-head">
            <h1>HOME</h1>
        </div>
        <div class="seller-text">
            <h1 class="big-text">
                taking care of your home needs
            </h1>
            <h4 style="color: white;">
                Finding someone to run your errands, get your engine fixed? We have someone for everyone.
            </h4>
        </div>
        <div class="search-pane p-4 w-100">
            <select class="form-select form-select-lg w-50 search-option" id="services">
                <option selected>What services are you looking for?</option>
            </select>
            <a href="services"><button class="btn btn-primary mx-2 p-3">
                    LET'S GET CONNECTED
                </button></a>
        </div>
    </section>
    <section class="promo-section">
        <div class="promo-container">
            <div class="promo-header m-3 p-4">
                <h3>Popular Services</h3>
            </div>
            <div class="line mx-4"></div>
            <div class="promo-row p-4">
                <div class="popular-card z-2 bg-trans">
                    <img src="images/cleaning.jpg" alt="" class="img-card" />
                    <div class="cd bg-trans ud jcc aic z-2 p-2">
                        <h4 class="tx-uc c-b bold">Cleaning</h4>
                        <a href="services" class="w-100"><button class="btn btn-outline-dark w-100">See more</button></a>
                    </div>
                </div>
                <div class="popular-card">
                    <img src="images/elec_home.jpg" alt="" class="img-card" />
                    <div class="cd bg-trans ud jcc aic z-2 p-2">
                        <h4 class="tx-uc c-b bold">Electrical</h4>
                        <a href="services" class="w-100"><button class="btn btn-outline-dark w-100">See more</button></a>
                    </div>
                </div>
                <div class="popular-card">
                    <img src="images/gardening_home.jpg" alt="" class="img-card" />
                    <div class="cd bg-trans ud jcc aic z-2 p-2">
                        <h4 class="tx-uc c-b bold">Gardening</h4>
                        <a href="services" class="w-100"><button class="btn btn-outline-dark w-100">See more</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mid-section" id="mid-section">
        <div class="promo-header m-3 p-4">
            <h3>Customer Comments</h3>
        </div>
        <div class="line-2 mx-4"></div>
        <div class="comment-holder lr w-100 p-1 jcc">
            <div class="comment jcc aic ud w-25 p-2">
                <h4 class="w-100">"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores sapiente aliquid quibusdam, minima pariatur optio a aspernatur. At excepturi ullam assumenda eos eveniet nemo amet culpa quod facere, error voluptatum?"</h4>
                <div class="lr w-100 aic jcc py-2">
                    <img src="images/person1.jpg" class="img-profile" alt="">
                    <h3 class="px-2">-Candace Ligma</h3>
                </div>
            </div>
            <div class="comment jcc aic ud w-25 p-2">
                <h4 class="w-100">"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores sapiente aliquid quibusdam, minima pariatur optio a aspernatur. At excepturi ullam assumenda eos eveniet nemo amet culpa quod facere, error voluptatum?"</h4>
                <div class="lr w-100 aic jcc py-2">
                    <img src="images/person2.jpg" class="img-profile" alt="">
                    <h3 class="px-2">-Sigma Chad</h3>
                </div>
            </div>
            <div class="comment jcc aic w-25 ud p-2">
                <h4 class="w-100">"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores sapiente aliquid quibusdam, minima pariatur optio a aspernatur. At excepturi ullam assumenda eos eveniet nemo amet culpa quod facere, error voluptatum?"</h4>
                <div class="lr w-100 aic jcc py-2">
                    <img src="images/ThePapaa.jpeg" class="img-profile" alt="">
                    <h3 class="px-2">-Sir.Gon D.</h3>
                </div>
            </div>
            <div class="comment jcc aic w-25 ud p-2">
                <h4 class="w-100">"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores sapiente aliquid quibusdam, minima pariatur optio a aspernatur. At excepturi ullam assumenda eos eveniet nemo amet culpa quod facere, error voluptatum?"</h4>
                <div class="lr w-100 aic jcc py-2">
                    <img src="images/person4.jpg" class="img-profile" alt="">
                    <h3 class="px-2">-The Man.</h3>
                </div>
            </div>
        </div>

    </section>
    <?php include("module/footer.php"); ?>

</body>
<!-- js files -->

<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    //registration procedure
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

                        alert(result);
                        if (result == 1) {
                            location.reload();
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
        displayServices();
    });

    function displayServices() {
        $.ajax({
            url: "<?php echo base_url('data_handling/getServices') ?>",
            method: 'GET',
            success: function(response) {
                $.each(response, function(key, value) {
                    $("#services").append(
                        "<option value =" + value.service_id + ">" + value.service_name + "</option>"
                    )
                })
            }
        })

    }
</script>

</html>