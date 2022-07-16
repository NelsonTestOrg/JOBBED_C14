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
        <div class="operation-message warning jcc" id="warning">
            <p>Please check your input details.</p>
        </div>
        <div class="operation-message success jcc" id="success">
            <p class="p-0 m-0 ">Issue posted successfully!!</p>
        </div>
        <div class="operation-message error jcc" id="error">
            <p>Issue posting Failed.</p>
        </div>
        <div class="service-bar">
            <div class="page-head">
                <h1>SERVICES</h1>
            </div>
        </div>
        <div class="main_container">
            <form class="svc-container">
                <input class="hidden" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <div class="category-toggle m-0">
                    <h2>POST ISSUE</h2>
                </div>
                <div class="data-input">
                    <h5 class="part-detail w-25">
                        Issue category :
                    </h5>
                    <select name="issue_category_name" id="issue_category" class="form-select w-50">
                        <option selected>Choose issue category eg. Electrical</option>
                    </select>
                    <select name="issue_category_location" id="issue_venue" class="form-select w-25">
                    </select>

                </div>
                <hr class="line-sep">
                <div class="data-input">
                    <h5 class="part-detail w-25">
                        Issue description :
                    </h5>
                    <textarea name="issue_description" required id="issue_details" rows="5" class="form-control w-75"></textarea>
                </div>
                <hr class="line-sep">
                <div class="data-input">
                    <h5 class="part-detail w-25">
                        My location
                    </h5>
                    <div class="location w-75">
                        <input required placeholder="eg. Strathmore, Keri Rd." type="text" name="issue_location" id="issue_location" class="form-control w-100">
                        <small class="form-text text-muted">Your location will be disclosed only after accepting your bid</small>
                    </div>
                </div>
                <hr class="line-sep">
                <div class="pending-orders py-3">
                    <button class="btn btn-primary w-25 mx-4" id="post_issue" >
                        <i class="fa-solid fa-file-circle-plus px-2"></i>
                        Post issue
                    </button>
                    <a href="<?php echo base_url("profile"); ?>" class="w-25 mx-4">
                        <button type="button" class="btn btn-warning w-100">
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
            </form>
        </div>
    </section>
    <?php include("module/footer.php"); ?>
    <script>
        $(document).ready(function() {
            displayServices();
            displayLocation();



        })
        $(document).on('click', '#post_issue', function() {
            if ($.trim($('#issue_details').val()).length == 0 || $.trim($('#issue_venue').val()).length == 0) {
                $('#warning').fadeIn('slow', function() {
                    $('#warning').delay(3000).fadeOut();
                });
            } else {
                var data = {
                    'issue_category': $('#issue_category').val(),
                    'issue_venue': $('#issue_venue').val(),
                    'issue_details': $('#issue_details').val(),
                    'issue_location': $('#issue_location').val(),
                    'user_id': $('#user_id').val()
                };
                $.ajax({
                    url: "<?php echo base_url('data_handling/postIssue') ?>",
                    method: 'POST',
                    data: data,
                    success: function(result) {
                        if (result == 1) {
                            alert("Issue posted successfully!");
                            location.reload();
                            // $('#success').fadeIn('slow', function() {
                            //     $('#success').delay(1000).fadeOut();
                            // });
                            // $('#issue_category').val("");
                            // $('#issue_venue').val("");
                            // $('#issue_details').val("");
                            // $('#issue_location').val("");

                        } else {
                            $('#error').fadeIn('slow', function() {
                                $('#error').delay(3000).fadeOut();
                            });
                        }
                    }
                })
            }

        });

        function displayServices() {
            $.ajax({
                url: "<?php echo base_url('data_handling/getServices') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#issue_category").append(
                            "<option value =" + value.service_id + ">" + value.service_name + "</option>"
                        )
                    })
                }
            })

        }

        function displayLocation() {
            $.ajax({
                url: "<?php echo base_url('data_handling/getLocation') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#issue_venue").append(
                            "<option value =" + value.location_id + ">" + value.location_name + "</option>"
                        )
                    })
                }
            })

        }
    </script>
</body>