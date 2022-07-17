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
                        <h3>PROFILE</h3>
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