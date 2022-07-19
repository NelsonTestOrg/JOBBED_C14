<div class="profile-nav">
    <div class="f">
        <div class="first-div">
            <img src="images/man.png" alt="">
            <h4 class="name"><?php echo $_SESSION['user_name']; ?></h4>
            <hr>
        </div>
        <div class="second-div">
            <ul>
                <li><button class="btn btn-dark tx-uc" id="pd_btn">Personal Details</button></li>
                <li><button class="btn btn-dark tx-uc" id="pp_btn">All issues</button></li>
                <li><button class="btn btn-dark tx-uc" id="pr_btn">Order Requests</button></li>
                <li><button class="btn btn-dark tx-uc" id="ph_btn">History</button></li>
            </ul>
        </div>
    </div>
    <div class="logout-div">
        <a href=" <?php echo base_url("logout"); ?>">
            <button class="btn btn-outline-danger logout" id="logout">
                Log Out
            </button>
        </a>

    </div>
</div>