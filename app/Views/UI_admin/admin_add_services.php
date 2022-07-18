<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("admin_modules/header.php"); ?>
</head>

<body>
    <section class="w-100">
        <navbar class="nav w-100 bg-dark aic c-w bb-white">
            <div class="logo-container w-75 lr aic jcc">
                <a href="w-landing"></a><img src="images/jobbed_w.png" class="img-sm" alt="">
            </div>
            <div class="admin-profile lr w-25 bl-white h-100">
                <div class="img">
                    <img src="images/man.png" class="img-xsm" alt="">
                </div>
                <div class="details">
                    <h3>ADNREW TATE</h3>
                    <h5>andrewtate@gmail.com</h5>
                </div>
                <div class="view aic ud jcc px-3">
                    <button class="btn btn-outline-secondary">
                        <i class="fa-solid fa-circle-chevron-right"></i>
                    </button>
                </div>
            </div>
        </navbar>
        <section class="admin-body lr jcc w-100 ">
            <?php include("admin_modules/admin_side_nav.php"); ?>
            <div class="table-section ud aic w-75 bg-grey">
                <div class="page-head">
                    <h1>ADMINISTRATOR</h1>
                </div>
                <div class="cont-div ud w-100 jcc">
                    <div class="table-head ud aic jcc w-100 p-4">
                        <h3>ADD SERVICES</h3>
                        <span class="line-sm"></span>
                    </div>
                    <div class="add-service ud aic w-100 jcc">
                        <div class="service-photo w-50 ud aic ">
                            <img src="images/search.png" alt="" class="img-lg bd-dark my-2 image_preview">
                            <input type="file" name="service_img" class="form-control w-100" id="service_img" accept="Image/*">
                        </div>
                        <div class="service-name w-50 ud">
                            <label for="service_name">Service name:</label>
                            <input type="text" name="service_name" id="service_name" class="form-control w-100">
                            <button class="btn btn-primary my-1" id="add_service"><i class="fa-solid fa-plus"></i>ADD SERVICE</button>
                        </div>


                    </div>
                </div>
                <div class="cont-div ud w-100 jcc">
                    <div class="table-head ud aic jcc w-100 p-4">
                        <h3>ADD CATEGORY</h3>
                        <span class="line-sm"></span>
                    </div>
                    <div class="add-service ud aic w-100 jcc">
                        <div class="service-name w-50 ud">
                            <label for="location_name">Category name:</label>
                            <input type="text" name="category_name" id="location_name" class="form-control w-100">
                            <button class="btn btn-primary my-1" id="add_s_location"><i class="fa-solid fa-plus"></i>ADD CATEGORY</button>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </section>

    <script>
        const inpFile = document.getElementById("service_img");
        const PreviewImage = document.querySelector(".image_preview");

        inpFile.addEventListener("change", function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function() {
                    PreviewImage.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            }


        })

        $(document).on('click', '#add_service', function() {
            if ($.trim($('#service_name').val()).length == 0) {
                alert("Invalid service name lengths!");
            } else {
                var data = {
                    'service_name': $('#service_name').val(),
                };
                $.ajax({
                    url: "<?php echo base_url('data_handling/addService') ?>",
                    method: 'POST',
                    data: data,
                    success: function(login_res) {
                        if (login_res = 1) {
                            $('#service_name').val("");
                            alert("Service added successfully.")
                            location.reload();

                        } else if (login_res = 0) {
                            alert("Good !");
                        } else {
                            alert("Deez NUts");
                        }
                    }
                })
            }
        });
        $(document).on('click', '#add_s_location', function() {
            if ($.trim($('#location_name').val()).length == 0) {
                alert("Invalid service name lengths!");
            } else {
                var data = {
                    'location_name': $('#location_name').val(),
                };
                $.ajax({
                    url: "<?php echo base_url('data_handling/addLocation') ?>",
                    method: 'POST',
                    data: data,
                    success: function(login_res) {
                        if (login_res = 1) {
                            $('#location_name').val("");
                            alert("Location added successfully.")
                            location.reload();

                        } else if (login_res = 0) {
                            alert("Something went wrong!");
                        } else {
                            alert("Deez N...");
                        }
                    }
                })
            }
        });
    </script>
</body>