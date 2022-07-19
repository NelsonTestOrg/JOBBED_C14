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
                        <h3>USERS</h3>
                        <span class="line-sm"></span>
                    </div>
                    <div class="table-holder px-4 w-100">
                        <table class="w-100 table table-striped">
                            <thead class="thead-dark p-sticky p-3 bg-grey">
                                <tr>
                                    <td> <b> USER ID </b></td>
                                    <td> <b> USER NAME </b></td>
                                    <td> <b> USER EMAIL</b></td>
                                    <td> <b> USER ROLE</b></td>
                                    <td> <b> ACTIONS</b></td>
                                </tr>
                            </thead>
                            <tbody id="users">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </section>

    <script>
        //registration procedure
        $(document).ready(function() {
            displayUsers();
        });

        function displayUsers() {
            $.ajax({
                url: "<?php echo base_url('data_handling/getUsers') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#users").append(
                            "<tr>" +
                            "   <td>" + value.user_id + "</td>" +
                            "   <td>" + value.users_name + "</td>" +
                            "   <td>" + value.user_email + "</td>" +
                            "   <td>" + value.role_name + "</td>" +
                            "   <td><button class='btn btn-danger delete-user' data-id='" + value.user_id + "' ><i class='fa-solid fa-trash-can'></i></button></td>" +
                            "</tr>"
                        )
                    })
                }
            })

        }
        $(document).on('click', '.delete-user', function() {
            var user_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('data_handling/deleteUser') ?>",
                data: {
                    user_id: user_id
                },
                success: function(response) {
                    if (response = 1) {
                        $('#users').html("");
                        alert("User deleted successfully!")
                        displayUsers();
                    } else if (response = 0) {
                        alert('Error deleting user.They may be linked to an active job.');
                        $('#users').html("");
                        displayUsers();
                    } else {
                        alert(response);

                    }
                }

            })
        })
    </script>
</body>