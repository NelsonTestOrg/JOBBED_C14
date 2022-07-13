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
            <select class="form-select form-select-lg w-50 search-option">
                <option selected>What services are you looking for?</option>
                <option value="1">Service One</option>
                <option value="2">Service Two</option>
                <option value="3">Service Three</option>
            </select>
            <button class="btn btn-primary mx-2">
                Let's get connected
            </button>
        </div>
    </section>
    <section class="promo-section">
        <div class="promo-container">
            <div class="promo-header m-3 p-4">
                <h3>Popular Services</h3>
            </div>
            <div class="line mx-4"></div>
            <div class="promo-row">
                <div class="col-promo">
                    <div class="card">
                        <div class="image-container">
                            <img src="./images/cleaning.jpg" alt="" />
                        </div>
                        <div class="card-details">
                            <h3>Cleaning</h3>
                            <p>Get the best cleaning services</p>
                        </div>
                    </div>
                </div>
                <div class="col-promo">
                    <div class="card">
                        <div class="image-container">
                            <img src="./images/cleaning.jpg" alt="" />
                        </div>
                        <div class="card-details">
                            <h3>Cleaning</h3>
                            <p>Get the best cleaning services</p>
                        </div>
                    </div>
                </div>
                <div class="col-promo">
                    <div class="card">
                        <div class="image-container">
                            <img src="./images/cleaning.jpg" alt="" />
                        </div>
                        <div class="card-details">
                            <h3>Cleaning</h3>
                            <p>Get the best cleaning services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mid-section" id="mid-section">
        <div class="promo-header m-3 p-4">
            <h3>Pricing</h3>
        </div>
        <div class="line-2 mx-4"></div>
        <div class="pricing-details p-4">
            <h4>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores fuga architecto aliquid eum recusandae incidunt cum ut aliquam blanditiis quis. A illum natus deserunt minima iste nisi in, recusandae doloremque.</h4>
        </div>
        <div class="button p-4">
            <button class="btn btn-outline-light w-50">
                View Prices
            </button>
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
                alert('Please fill Both Fields')

            } else {
                var data = {
                    'user_name': $('#user_name').val(),
                    'user_email': $('#user_email').val(),
                    'user_password': $('#user_password').val()
                };
                $.ajax({
                    url: "<?php echo base_url('data_handling/new_user') ?>",
                    method: 'POST',
                    data: data,
                    success: function(result) {
                        if (result == 1) {
                            alert("Nice Job!");
                            $('#user_name').val("");
                            $('#user_email').val("");
                            $('#user_password').val("");

                        } else {
                            alert("Something went awfully wrong");
                        }
                    }
                })
            }

        });



    });
</script>

</html>