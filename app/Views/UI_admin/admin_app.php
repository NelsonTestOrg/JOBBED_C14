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
        <?php include("admin_modules/navbar.php"); ?>
        <section class="admin-body lr jcc w-100 ">
            <?php include("admin_modules/admin_side_nav.php"); ?>
            <div class="table-section ud aic w-75 bg-grey">
                <div class="page-head">
                    <h1>ADMINISTRATOR</h1>
                </div>
                <div class="cont-div ud w-100 jcc">
                    <div class="table-head ud aic jcc w-100 p-4">
                        <h3>ISSUES</h3>
                        <span class="line-sm"></span>
                    </div>
                    <div class="table-holder px-4 w-100">
                        <table class="w-100 table table-striped">
                            <thead class="thead-dark p-sticky p-3 bg-grey">
                                <tr>
                                    <td> <b> REQUEST ID </b></td>
                                    <td> <b> WORKER NAME</b></td>
                                    <td> <b> WORKER EMAIL</b></td>
                                    <td> <b> PHONE NO.</b></td>
                                    <td> <b> ADDRESS</b></td>
                                    <td> <b> NATIONAL ID</b></td>
                                    <td> <b> ACTIONS</b></td>
                                </tr>
                            </thead>
                            <tbody id="applications">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </section>

    <script>
        $(document).ready(function() {
            displayapplications();
        });

        function displayapplications() {
            $.ajax({
                url: "<?php echo base_url('data_handling/getApplications') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#applications").append(
                            "<tr>" +
                            "   <td>" + value.worker_id + "</td>" +
                            "   <td class='tx-uc'>" + value.worker_fname + "_" + value.worker_lname + " </td>" +
                            "   <td>" + value.worker_email + "</td>" +
                            "   <td class='w-25'>" + value.worker_phone_no + "</td>" +
                            "   <td>" + value.worker_address + "</td>" +
                            "   <td class='w-25'>" + value.worker_id + "</td>" +
                            "   <td class='lr'>" +
                            "       <button class='btn btn-danger delete-app mx-1' data-id='" + value.worker_id + "' ><i class='fa-solid fa-trash-can'></i></button>" +
                            "       <button class='btn btn-success accept-app mx-1' data-id='" + value.worker_id + "' ><i class='fa-solid fa-check'></i></button>" +
                            "   </td>" +
                            "</tr>"
                        )
                    })
                }
            })

        }
        $(document).on('click', '.delete-app', function() {
            var worker_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('data_handling/deleteApp') ?>",
                data: {
                    worker_id: worker_id
                },
                success: function(response) {
                    if (response = 1) {
                        alert("Application deleted successfully!")
                        location.reload();
                    } else if (response = 0) {
                        alert('Error deleting application.');

                        location.reload();
                    } else {
                        alert(response);

                    }
                }

            })
        })
        $(document).on('click', '.accept-app', function() {
            var worker_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('data_handling/acceptApp') ?>",
                data: {
                    worker_id: worker_id
                },
                success: function(response) {
                    if (response = 1) {
                        alert("Application accepted successfully!")
                        location.reload();
                    } else if (response = 0) {
                        alert('Error accepting application.');

                        location.reload();
                    } else {
                        alert(response);

                    }
                }

            })
        })
    </script>
</body>