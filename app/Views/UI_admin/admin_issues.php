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
                        <h3>ISSUES</h3>
                        <span class="line-sm"></span>
                    </div>
                    <div class="table-holder px-4 w-100">
                        <table class="w-100 table table-striped">
                            <thead class="thead-dark p-sticky p-3 bg-grey">
                                <tr>
                                    <td> <b> ISSUE ID </b></td>
                                    <td> <b> ISSUE OWNER </b></td>
                                    <td> <b> ISSUE CATEGORY</b></td>
                                    <td> <b> ISSUE DETAILS</b></td>
                                    <td> <b> ISSUE LOCATION</b></td>
                                    <td> <b> ISSUE STATUS</b></td>
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
                url: "<?php echo base_url('data_handling/getIssues') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#issues").append(
                            "<tr>" +
                            "   <td>" + value.issue_id + "</td>" +
                            "   <td>" + value.users_name + "</td>" +
                            "   <td>" + value.service_name + ", " + value.location_name + "</td>" +
                            "   <td class='w-25'>" + value.issue_details + "</td>" +
                            "   <td>" + value.issue_map_location + "</td>" +
                            "   <td class='w-25'><span class ='w-100" + value.status_name + "'>" + value.status_name + "</span></td>" +
                            "   <td><button class='btn btn-danger delete-issue' data-id='" + value.issue_id + "' ><i class='fa-solid fa-trash-can mx-2'></i>TAKE DOWN</button></td>" +
                            "</tr>"
                        )
                    })
                }
            })

        }
        $(document).on('click', '.delete-issue', function() {
            var issue_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('data_handling/deleteIssue') ?>",
                data: {
                    issue_id: issue_id
                },
                success: function(response) {
                    if (response = 1) {
                        $('#issues').html("");
                        alert("Issue deleted successfully!")
                        displayIssues();
                    } else if (response = 0) {
                        alert('Error deleting issue.It may be linked to an active job.');
                        $('#issues').html("");
                        displayIssues();
                    } else {
                        alert(response);

                    }
                }

            })
        })
    </script>
</body>