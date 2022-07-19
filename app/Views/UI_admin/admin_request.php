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
                                    <td> <b> USER ID </b></td>
                                    <td> <b> USER NAME </b></td>
                                    <td> <b> USER EMAIL</b></td>
                                    <td> <b> USER ROLE</b></td>
                                    <td> <b> ACTIONS</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>30</td>
                                    <td>Brathwaite Kinuthia</td>
                                    <td>kinuthiabrathwaite@gmail.com</td>
                                    <td>USER_CLIENT</td>
                                    <td><button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </section>
</body>