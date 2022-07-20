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
                <?php include("app-sections/profile-requests.php"); ?>
            </div>
        </div>
    </section>
    <?php include("module/user.php"); ?>
    <?php include("module/footer.php"); ?>
    <script>
        var pd_btn = document.getElementById("pd_btn");
        var pp_btn = document.getElementById("pp_btn");
        var ph_btn = document.getElementById("ph_btn");
        var pr_btn = document.getElementById("pr_btn");
        const ph_div = document.getElementById("ph_div");
        const pd_div = document.getElementById("pd_div");
        const pp_div = document.getElementById("pp_div");
        const pr_div = document.getElementById("pr_div");


        ph_btn.addEventListener("click", function() {
            ph_div.style.display = "flex";
            pd_div.style.display = "none";
            pp_div.style.display = "none";
            pr_div.style.display = "none";
        })
        pp_btn.addEventListener("click", function() {
            ph_div.style.display = "none";
            pd_div.style.display = "none";
            pp_div.style.display = "flex";
            pr_div.style.display = "none";
        })
        pd_btn.addEventListener("click", function() {
            ph_div.style.display = "none";
            pd_div.style.display = "flex";
            pp_div.style.display = "none";
            pr_div.style.display = "none";
        })
        pr_btn.addEventListener("click", function() {
            ph_div.style.display = "none";
            pd_div.style.display = "none";
            pp_div.style.display = "none";
            pr_div.style.display = "flex";
        })

        $(document).ready(function() {
            displayPendingIssues();
            displayHistory();
            displayRequests();

        })

        function displayPendingIssues() {
            var data = {
                'user_id': $('#user_id_public').val(),
            }

            $.ajax({
                url: "<?php echo base_url('data_handling/getPendingIssues') ?>",
                method: 'POST',
                data: data,
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#pending-issues").append(
                            " <tr class='py-4 bb-black'>" +
                            "   <td class='w-sm br-black ud aic jcc'> IS /" + value.issue_id + "</td>" +
                            "   <td class='w-25  ud aic jcc'>" +
                            "       <div class='ud px-4 '>" +
                            "         <input value='" + value.issue_id + "' class='hidden issue_id' id='issue_id'>  " +
                            "           <h5 class='ta-start px-1 py-0 tx-uc'> <b>" + value.service_name + " , " + value.location_name + "</b></h5>    " +
                            "       </div>" +
                            "   </td>" +
                            "   <td class='w-50  ud aic jcc'>" +
                            "       <p class='ta-start w-100 px-1'>" + value.issue_details + "</p>" +
                            "   </td>" +
                            "   <td class='w-md  ud aic jcc'>" + value.issue_map_location + "</td>" +
                            "   <td class='w-md  ud aic jcc'><span class='" + value.status_name + "'>" + value.status_name + "</span></td>" +
                            "   <td class='w-fit ud aic jcc'>" +
                            "       <div class='ud w-md aic'>" +
                            "           <button class='btn btn-danger w-50 my-1 delete-issue' data-id='" + value.issue_id + "'> <i class='fa-solid fa-trash-can'></i> Delete Issue </button>" +
                            "       </div>" +
                            "   </td>" +
                            "</tr>"
                        )
                    }, appendRequests())
                }
            })


        }

        function appendRequests() {
            var issue_id = {
                'issue_id': $('.issue_id').val(),
            }
            $.ajax({
                url: "<?php echo base_url('data_handling/getRequestData') ?>",
                method: 'POST',
                data: issue_id,
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#bidder-details").append(
                            "       <div class='bid-profile bg-dark my-1 ud w-75 aic p-1' >" +
                            "           <div class='w-img lr jsb w-100'>" +
                            "               <img src='images/man.png' class='img-sm'>" +
                            "               <div class='w-details ud w-50 ta-start'>" +
                            "                   <p class='m-0'>" + value.request_bidder_id + "</p>" +
                            "                   <span>Bid Price: <b>Ksh. " + value.requst_bid_amt + "</b></span>" +
                            "                   <a href='' class='td-none'>View Profile</a>" +
                            "               </div>" +
                            "           </div>" +
                            "           <div class='w-100 action-btn lr p-1'>" +
                            "               <button class='btn btn-success mx-1 w-50'><i class='fa-solid fa-phone mx-2'></i>Engage</button>" +
                            "               <button class='btn btn-danger mx-1 w-50'><i class='fa-solid fa-link-slash mx-2'></i>Turn down</button>" +
                            "           </div>" +
                            "       </div>"

                        )
                    })
                }
            })
        }

        function displayHistory() {
            var data = {
                'user_id': $('#user_id_public').val(),
            }

            $.ajax({
                url: "<?php echo base_url('data_handling/getHistory') ?>",
                method: 'POST',
                data: data,
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#user_history").append(
                            " <tr class='py-4 bb-black'>" +
                            "   <td class='w-sm br-black aic'> IS /" + value.issue_id + "</td>" +
                            "   <td>" +
                            "       <div class='issue-card ud px-4 w-100 '>" +
                            "         <input value='" + value.issue_id + "' class='hidden' id='issue_id'>  " +
                            "           <h5 class='ta-start px-1 py-0'>" + value.service_name + " , " + value.location_name + "</h5>    " +
                            "           <p class='ta-start w-100 px-1'>" + value.issue_details + "</p>" +
                            "       </div>" +
                            "   </td>" +
                            "   <td class='w-md'>Completed</td>" +
                            "   <td>" + value.users_name +
                            "   </td>" +
                            "   <td class='w-fit'>" +
                            "       <div class='ud w-md aic'>" +
                            "           <button class='btn btn-danger w-50 my-1'> <i class='fa-solid fa-trash-can'></i> Delete Issue </button>" +
                            "       </div>" +
                            "   </td>" +
                            "</tr>"
                        )
                    })
                }
            })
        }

        function displayRequests() {
            var data = {
                'user_id': $('#user_id_public').val(),
            }

            $.ajax({
                url: "<?php echo base_url('data_handling/getWorkerRequests') ?>",
                method: 'POST',
                data: data,
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#pending-requests").append(
                            "		<tr class='py-4 bb-black'>" +
                            "                <td class='w-sm br-black ud aic jcc'>OR/12</td>" +
                            "                <td class='w-50 ud aic jcc'>" +
                            "                    <div class='ud ta-start px-4 w-100'>" +
                            "                        <h5 class='ta-start px-1 py-0 tx-uc'><b>" + value.service_name + "," + value.location_name + "</b></h5>" +
                            "                       <p class='ta-start w-100 px-1'>" + value.issue_details + "</p>" +
                            "                   </div>" +
                            "              </td>" +
                            "               <td class='w-md  ud aic jcc'>" + value.issue_map_location + "</td>" +
                            "               <td class='lr jcc aic w-25'>" +
                            "                     <img src='images/man.png' alt='' class='img-sm'>" +
                            "                    <div class='tx ud jcc ta-start'>" +
                            "                        <h5 class='tx-uc'>" + value.worker_fname + "</h5>" +
                            "                         <span>Bid Price:  Ksh." + value.issue_bid_amt + "</span>" +
                            "                          <span>Phone Number: <p class='tx-uc'>+254 " + value.worker_phone_no + "</p></span>" +
                            "                    </div>" +
                            "                 </td>" +
                            "                 <td class='ud w-md aic jcc'>" +
                            "                    <button class='btn btn-success w-50 my-1 engage' data-id='" + value.issue_id + "'><i class='fa-solid fa-phone px-1'></i>ENGAGE</button>" +
                            "                    <button class='btn btn-danger w-50 cancel-request' data-id='" + value.issue_id + "'><i class='fa-solid fa-trash-can px-1'></i>CANCEL</button>" +
                            "                </td>" +
                            "            </tr>"
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
                        location.reload();
                    } else if (response = 0) {
                        alert('Error deleting issue.It may be linked to an active job.');
                        $('#issues').html("");
                        location.reload();
                    } else {
                        alert(response);

                    }
                }

            })
        })
        $(document).on('click', '.engage', function() {
            var issue_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('data_handling/acceptRequest') ?>",
                data: {
                    issue_id: issue_id
                },
                success: function(response) {
                    if (response = 1) {
                        alert("Issue assigned successfully!")
                        location.reload();
                    } else if (response = 0) {
                        alert('Error assigning issue.It may be linked to an active job.');
                        location.reload();
                    } else {
                        alert(response);

                    }
                }

            })
        })
    </script>

</body>