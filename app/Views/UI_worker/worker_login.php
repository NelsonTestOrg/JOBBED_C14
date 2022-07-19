<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("w_modules/header.php"); ?>
</head>

<body class="bg-man h-100">
    <section class="login ud aic bg-clear h-full jsb w-100 ">
        <nav class="navbar bg-grey lr aic jcc w-100 py-4">
            <div class="logo-container">
                <a href="home"><img src="images/jobbed.png" alt=""></a>
            </div>
        </nav>
        <div class="login-form ud p-4 h-100 jcc aic w-50">
            <div class="header">
                <h3>WELCOME TO JOBBED WORKER PLATFORM!</h3>
            </div>
            <span class="line"></span>
            <div class="email p-3 ud ais w-100">
                <label for="worker_email">Enter your worker email:</label>
                <input type="email" name="worker_email" id="worker_email" class=" w-100 form-control" placeholder="Enter your Email here">
            </div>
            <div class="pass p-3 ud ais w-100">
                <label for="worker_password">Enter your password:</label>
                <input type="password" name="worker_password" id="worker_password" class=" w-100 form-control" placeholder="Enter your password here">
                <small class="form-text text-muted">Your password is your secret. </small>
            </div>
            <div class="lg-btn w-100 p-4">
                <button class="btn btn-primary w-100" type="submit" id="login_wk">Login</button>
            </div>
            <div class="reg-pas ud aic jcc w-100">
                <h4>Don't have an account?</h4>
                <a href="workerRegister"><button class="btn btn-outline-secondary">CREATE AN ACCOUNT</button></a>
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
                        alert(login_res);
                        if (login_res == 2) {
                            $('#worker_email').val("");
                            $('#worker_password').val("");
                            window.location = 'browseJobs';

                        } else if (login_res == 3) {
                            window.location = 'admin_home';
                        } else {
                            alert("Error mate!");
                        }
                    }
                })
            }
        });
    </script>
</body>