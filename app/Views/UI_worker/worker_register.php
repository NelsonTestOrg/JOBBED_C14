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
                    <input type="text" class="form-control" name="" id="reg_nat_id">
                </div>
            </div>
            <div class="address p-4 ud ais w-100">
                <label for="reg_address">Address:</label>
                <input type="password" name="reg_address" id="reg_address" class=" w-100 form-control" placeholder="Enter your address here">
                <small class="form-text text-muted">Your address will be used to help find jobs within your proximity. </small>
            </div>
            <div class="certs lr w-100 p-3">
                <div class="conduct ud w-50 px-2">
                    <label for="reg_conduct">Certificate of good conduct:</label>
                    <input type="file" name="" id="reg_conduct" class="form-control w-100">
                </div>
                <div class="reg_id_photo ud w-50 px-2">
                    <label for="reg_reg_id_photo">Copies of your ID photo:</label>
                    <input type="file" name="" id="reg_reg_id_photo" class="form-control w-100">
                </div>
            </div>
            <div class="expertise ud w-100 p-3">
                <label for="a-o-ex">Area of expertise</label>
                <select name="a-o-ex" class="form-control" id="reg_expertise">
                    <option class="p-4" value="1">Manslaughter</option>
                </select>
                <small class="form-text text-muted">Your credentials are 100% secure with us cause we know better.</small>
            </div>
            <div class="lg-btn w-100 p-4">
                <button class="btn btn-primary w-100" type="submit" id="login_wk"> SUBMIT REGISTRATION REQUEST</button>
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
        $(document).on('click', '#login_wk', function() {
            if ($.trim($('#worker_email').val()).length == 0 || $.trim($('#worker_password').val()).length == 0) {
                alert("Invalid lengths!");
            } else {
                var data = {
                    'worker_email': $('#worker_email').val(),
                    'worker_password': $('#worker_password').val()
                };
                $.ajax({
                    url: "<?php echo base_url('data_handling/workerLogin') ?>",
                    method: 'POST',
                    data: data,
                    success: function(login_res) {
                        if (login_res == 1) {
                            $('#worker_email').val("");
                            $('#worker_password').val("");
                            window.location = 'browseJobs';

                        } else if (login_res == 0) {
                            alert("Some issue");
                        } else {
                            alert("Deez NUts");
                        }
                    }
                })
            }
        });
    </script>
</body>