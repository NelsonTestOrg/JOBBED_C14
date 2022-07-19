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
                        <h3>REQUESTS</h3>
                        <span class="line-sm"></span>
                    </div>
                    <div class="table-holder px-4 w-100">
                        <table class="w-100 table table-striped">
                            <thead class="thead-dark p-sticky p-3 bg-grey">
                                <tr>
                                    <td> <b> REQUEST ID </b></td>
                                    <td> <b> REQUEST BIDDER </b></td>
                                    <td> <b> REQUEST CATEGORY </b></td>
                                    <td> <b> REQUEST DETAILS</b></td>
                                    <td> <b> BID AMT</b></td>
                                    <td> <b> ACTIONS</b></td>
                                </tr>
                            </thead>
                            <tbody id="issues">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </section>
    <script>
        $(document).ready(function() {
            displayIssues();
        });

        function displayIssues() {
            $.ajax({
                url: "<?php echo base_url('data_handling/getRequestsAdmin') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#issues").append(
                            "<tr>" +
                            "   <td>" + value.issue_id + "</td>" +
                            "   <td class='tx-uc'><b>" + value.users_name + "</b></td>" +
                            "   <td>" + value.service_name + ", " + value.location_name + "</td>" +
                            "   <td class='w-25'>" + value.issue_details + "</td>" +
                            "   <td><b>Ksh." + value.issue_bid_amt + "</b></td>" +
                            "   <td><button class='btn btn-danger cancel-request' data-id='" + value.issue_id + "' ><i class='fa-solid fa-trash-can'></i></button></td>" +
                            "</tr>"
                        )
                    })
                }
            })

        }
        $(document).on('click', '.cancel-request', function() {
            var issue_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('data_handling/denyRequest') ?>",
                data: {
                    issue_id: issue_id
                },
                success: function(response) {
                    if (response = 1) {
                        alert("Request declined successfully!")
                        location.reload();
                    } else if (response = 0) {
                        alert('Error declining the request.');
                        location.reload();
                    } else {
                        alert(response);

                    }
                }

            })
        })
    </script>
</body>