<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("w_modules/header.php"); ?>
</head>

<body class="bg-man h-100">
    <section class="login ud aic bg-clear h-fit jsb w-100 ">
        <nav class="navbar bg-grey lr aic jcc w-100 py-4">
            <div class="logo-container">
                <a href="home"></a><img src="images/jobbed.png" alt="">
            </div>
        </nav>
        <div class="login-form ud p-4 h-fit jcc aic w-50">
            <div class="header">
                <h3>CREATE AN ACCOUNT</h3>
            </div>
            <span class="line"></span>
            <div class="names lr p-3 w-100">
                <div class="fname w-50 ud px-2">
                    <label for="first_name">First name:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="eg. John">
                </div>
                <div class="fname ud w-50 px-2">
                    <label for="last_name">Last name:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="eg. Doe">
                </div>
            </div>
            <div class="email p-4 ud ais w-100">
                <label for="reg_email">Enter your email:</label>
                <input type="email" name="reg_email" id="reg_email" class=" w-100 form-control" placeholder="Enter your Email here  eg.johndoe@gmail.com">
            </div>
            <div class="numbers lr p-3 w-100">
                <div class="phone_no ud w-50 px-2">
                    <label for="phone_no">Phone number:</label>
                    <input type="number" class="form-control" name="" maxlength="10" id="phone_number">
                </div>
                <div class="id_no ud w-50 px-2">
                    <label for="reg_nat_id">National ID no.</label>
                    <input type="number" maxlength="8" class="form-control" name="" id="reg_nat_id">
                </div>
            </div>
            <div class="address p-4 ud ais w-100">
                <label for="reg_address">Address:</label>
                <input type="text" name="reg_address" id="reg_address" class=" w-100 form-control" placeholder="Enter your address here">
                <small class="form-text text-muted">Your address will be used to help find jobs within your proximity. </small>
            </div>
            <div class="certs lr w-100 p-3">
                <div class="conduct ud w-50 px-2">
                    <label for="reg_conduct">Certificate of good conduct:</label>
                    <input type="file" name="reg_conduct" id="reg_conduct" class="form-control w-100">
                </div>
                <div class="reg_id_photo ud w-50 px-2">
                    <label for="reg_reg_id_photo">Copies of your ID photo:</label>
                    <input type="file" name="reg_id_photo" id="reg_id_photo" class="form-control w-100">
                </div>
            </div>
            <div class="expertise ud w-100 p-3">
                <label for="a-o-ex">Area of expertise</label>
                <select name="a-o-ex" class="form-control" class="expertise_category" id="reg_expertise">
                    <option selected>Choose your area of expertise</option>
                </select>
                <small class="form-text text-muted">Your credentials are 100% secure with us cause we know better.</small>
            </div>
            <div class="lg-btn w-100 p-4">
                <button class="btn btn-primary w-100" type="submit" id="submit_register"> SUBMIT REGISTRATION REQUEST</button>
            </div>
            <div class="reg-pas ud aic jcc w-100">
                <h4>Already have an account?</h4>
                <a href="workerLogin"> <button class="btn btn-outline-secondary">SIGN IN TO YOUR PROFILE</button></a>
            </div>
        </div>
        <div class="branding w-100 p-4 ">
            <a href="home">
                <img src="images/jobbed.png" alt="">
            </a>
            <p>©copyright JOBBED 2022</p>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            displayServices();
        })

        function displayServices() {
            $.ajax({
                url: "<?php echo base_url('data_handling/getServices') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#reg_expertise").append(
                            "<option value =" + value.service_id + ">" + value.service_name + "</option>"
                        )
                    })
                }
            })

        }

        $(document).on('click', '#submit_register', function() {
            if ($.trim($('#reg_email').val()).length == 0 || $.trim($('#first_name').val()).length == 0) {
                // $('#warning').fadeIn('slow', function() {
                //     $('#warning').delay(3000).fadeOut();
                // });
                alert("Check your credentials.")
            } else {
                var data = {
                    'first_name': $('#first_name').val(),
                    'last_name': $('#last_name').val(),
                    'reg_email': $('#reg_email').val(),
                    'phone_number': $('#phone_number').val(),
                    'reg_nat_id': $('#reg_nat_id').val(),
                    'reg_address': $('#reg_address').val(),
                    'reg_conduct': $('#reg_conduct').val(),
                    'reg_id_photo': $('#reg_id_photo').val(),
                    'reg_expertise': $('#reg_expertise').val(),
                };
                $.ajax({
                    url: "<?php echo base_url('data_handling/worker_register') ?>",
                    method: 'POST',
                    data: data,
                    success: function(result) {

                        alert(result);
                        if (result == 1) {
                            location.reload();
                        } else {
                            // $('#error').fadeIn('slow', function() {
                            //     $('#error').delay(3000).fadeOut();
                            // });
                            alert("ERROR");
                        }
                    }
                })
            }

        });
    </script>
</body>