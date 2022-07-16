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
    <section class="profile-page">
        <div class="page-head">
            <h1>PROFILE</h1>
        </div>
        <div class="profile-section">
            <div class="trans-cover">
                <?php include("app-sections/profile-navbar.php"); ?>
                <?php include("app-sections/user-profile.php"); ?>
                <?php include("app-sections/profile-history.php"); ?>
                <?php include("app-sections/profile-pending.php"); ?>
            </div>
        </div>
    </section>
    <?php include("module/footer.php"); ?>
    <script>
        var pd_btn = document.getElementById("pd_btn");
        var pp_btn = document.getElementById("pp_btn");
        var ph_btn = document.getElementById("ph_btn");
        const ph_div = document.getElementById("ph_div");
        const pd_div = document.getElementById("pd_div");
        const pp_div = document.getElementById("pp_div");


        ph_btn.addEventListener("click", function() {
            ph_div.style.display = "flex";
            pd_div.style.display = "none";
            pp_div.style.display = "none";
        })
        pp_btn.addEventListener("click", function() {
            ph_div.style.display = "none";
            pd_div.style.display = "none";
            pp_div.style.display = "flex";
        })
        pd_btn.addEventListener("click", function() {
            ph_div.style.display = "none";
            pd_div.style.display = "flex";
            pp_div.style.display = "none";
        })

        $(document).ready(function() {
            displayPendingIssues();
        })

        function displayPendingIssues() {
            $.ajax({
                url: "<?php echo base_url('data_handling/getPendingIssues') ?>",
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
    </script>

</body>