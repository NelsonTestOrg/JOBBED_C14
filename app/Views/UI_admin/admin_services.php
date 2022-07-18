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
                        <h3>SERVICES</h3>
                        <span class="line-sm"></span>
                    </div>
                    <div class="card-grid h-65" id="service_grid"></div>
                </div>

            </div>
        </section>
    </section>

    <script>
        $(document).ready(function() {
            displayServices();
        });

        function displayServices() {
            $.ajax({
                url: "<?php echo base_url('data_handling/getServices') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#service_grid").append(
                            "<div class='category-item'>" +
                            "   <img src='images/gardening.png' alt=''>" +
                            "   <h3 class='tt-uc'>" + value.service_name + "</h3>" +
                            "   <button class='btn btn-danger w-100 m-1 delete-service' data-id='" + value.service_id + "' ><i class='fa-solid fa-trash-can'></i> Delete category</button>" +
                            "</div>"
                        )
                    })
                }
            })

        }
        $(document).on('click', '.delete-service', function() {
            var service_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('data_handling/deleteService') ?>",
                data: {
                    service_id: service_id
                },
                success: function(response) {
                    if (response = 1) {
                        $('#service_grid').html("");
                        alert("Service deleted successfully!")
                        displayServices();
                    } else if (response = 0) {
                        alert('Error deleting category.It may be linked to an active job.');
                        $('#service_grid').html("");
                        displayServices();
                    } else {
                        alert(response);

                    }
                }

            })
        })
    </script>
</body>