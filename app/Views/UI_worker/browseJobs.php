<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("w_modules/header.php"); ?>
</head>

<body>
    <section class="main-body">
        <?php include("w_modules/navbar.php"); ?>
        <?php include("w_credentials/user.php"); ?>
        <div class="bgw aic ud w-100 my-2 c-3 h-fit px-1 py-1">
            <div class="t-head py-4">
                <h2>List of Jobs</h2>
            </div>
            <span class="line my-2"></span>
            <div class="list ud w-100 px-3 py-2" id="jobbrowser">
            </div>

        </div>
    </section>
    <?php include("w_modules/sidenav.php"); ?>


    <script>
        $(document).ready(function() {
            displayJobs();
        })

        function displayJobs() {
            var data = {
                'user_id': $('#user_id').val()
            };

            $.ajax({
                url: "<?php echo base_url('data_handling/getFreeJobs') ?>",
                method: 'POST',
                data: data,
                success: function(response) {
                    $.each(response, function(key, value) {
                        $('#jobbrowser').append(
                            "<div class='job-card lr my-2 aic jsb w-100 bg-grey c-3'>" +
                            "      <div class='prof_data p-3 ud jcc aic w-fc'>" +
                            "           <img src='images/man.png'  class='img-sm'>" +
                            "           <h5 class='tx-uc'>" + value.users_name + "</h5>" +
                            "      </div>" +
                            "      <div class='issue w-75 ud'>" +
                            "           <div class='lr px-3 aic jcs'>" +
                            "               <h4>Category :</h4>" +
                            "               <span class='ctg-span-w'>" + value.service_name + "</span>" +
                            "               <span class='ctg-span-w'>" + value.location_name + "</span>" +
                            "           </div>" +
                            "           <span class='line bg-white'></span>" +
                            "           <div class='lr px-3 py-2'>" +
                            "               <h4 class='w-25'>Details :</h4>" +
                            "               <p class='w-50'>" + value.issue_details + "</p>" +
                            "           </div>" +
                            "           <span class='line bg-white'></span>" +
                            "           <div class='stats lr jsb aic px-3 py-2 w-100'>" +
                            "               <div class='bids aic lr'>" +
                            "                   <h5>Bids:</h5>" +
                            "                   <span class='ctg-span-w'>10</span>" +
                            "               </div>" +
                            "               <div class='avg lr aic'>" +
                            "                   <h5>Average bid cost:</h5>" +
                            "                   <span class='ctg-span-w'>Ksh.500</span>" +
                            "               </div>" +
                            "               <div class='b ud aic px-4 w-25'>" +
                            "                   <div class='lr w-100 aic jcc p-1'>" +
                            "                       <label for='bid-amt'><b>Your bid: Ksh. </b></label>" +
                            "                       <input type='number' placeholder='500' class='form-control w-50 mx-1' id='" + value.issue_id + "'>" +
                            "                   </div>" +
                            "                   <button class='btn btn-primary w-100 submit-request' data-id ='" + value.issue_id + "'><i class='fa-solid fa-folder-plus px-2'></i>Submit Request</button>" +
                            "               </div>" +
                            "           </div>" +
                            "       </div>" +
                            "  </div>"
                        )
                    })
                }
            })
        }
        $(document).on('click', '.submit-request', function() {
            var service_id = $(this).data('id');
            var data = {
                'user_id': $('#user_id').val(),
                'bid_amount': $('#'.service_id).val(),
                'service_id': service_id
            };
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('data_handling/addRequest') ?>",
                data: data,
                success: function(response) {
                    if (response = 1) {
                        $('#jobbrowser').html("");
                        alert("Request sent successfully!")
                        displayJobs();
                    } else if (response = 0) {
                        alert('Error sending request.');
                        $('#jobbrowser').html("");
                        displayJobs();
                    } else {
                        alert(response);

                    }
                }

            })
        })
    </script>
</body>