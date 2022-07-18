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
        <div class="service-bar">
            <div class="page-head">
                <h1>
                    SERVICES
                </h1>
            </div>
        </div>
        <div class="svc-container ">
            <div class="services-display">
                <div class="category-toggle">
                    <button>
                        Our services
                    </button>
                </div>
                <div class="card-grid" id="service_grid"></div>
            </div>

        </div>

    </section>
    <?php include("module/footer.php"); ?>
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
                            "   <button class='btn btn-success w-100 m-1' id='" + value.service_id + "' >Post Issue</button>" +
                            "</div>"
                        )
                    })
                }
            })

        }
    </script>
</body>