<div class="data" id="pd_div">
    <div class="buttons-div lr jcc aic">
        <button class="btn btn-dark w-50">
            <i class="fa-solid fa-circle-user px-2"></i>
            My Details
        </button>
    </div>
    <div class="my-profile">
        <div class="intro-div">
            <hr class="line-sep">
            <div class="info">
                <div class="info-text">
                    <h5 class="part-detail">
                        Personal Info
                    </h5>
                    <p>
                        Update your personal information and profile photo here.
                    </p>
                </div>
                <div class="action-buttons">
                    <button class="btn btn-secondary">
                        Cancel
                    </button>
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk px-2"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
        <div class="edit-name">
            <hr class="line-sep">
            <div class="name-change">
                <div class="abt">
                    <h5 class="part-detail">
                        Name
                    </h5>
                </div>
                <div class="name-field w-50">
                    <div class="name-data">
                        <h5 class="part-detail px-3">Surname:</h5>
                        <input type="text" name="user_surname" placeholder="<?php echo $_SESSION['user_name']; ?>" id="">
                    </div>
                    <div class="name-data">
                        <h5 class="part-detail px-3">Last Name:</h5>
                        <input type="text" name="user_lastname" placeholder="Dix" id="">
                    </div>
                </div>
            </div>
        </div>
        <div class="edit-name edit-email">
            <hr class="line-sep">
            <div class="name-change">
                <div class="abt">
                    <h5 class="part-detail">
                        Email
                    </h5>
                </div>
                <div class="edit-em-dv py-3 px-3 w-50">
                    <input type="email" name="user_email" class="edit-box" placeholder="<?php echo $_SESSION['user_email']; ?>" id="">
                </div>
            </div>
        </div>
        <div class="edit-name edit-photo">
            <hr class="line-sep">
            <div class="photo-change">
                <div class="abt">
                    <h5 class="part-detail">
                        Photo
                    </h5>
                    <small>This will be displayed on your profile</small>
                </div>
                <div class="photo-cont w-50">
                    <div class="current-profile">
                        <h5 class="part-detail">
                            Current Photo
                        </h5>
                        <img src="images/man.png" alt="">
                    </div>

                    <div class="new-profile form-control m-2 w-50"><input type="file" accept="image/*" name="user-new-profile" id="" class="image-picker"></div>
                </div>
            </div>
        </div>
        <div class="edit-contacts edit-name">
            <hr class="line-sep">
            <div class="contacts-change">
                <div class="abt">
                    <h5 class="part-detail">
                        Contacts
                    </h5>
                </div>
                <div class="contact-info w-50">
                    <h5 class="part-detail">
                        Phone Number
                    </h5>
                    <input type="number" name="" maxlength="10" class="edit-box" placeholder="+254 714165105" id="">
                </div>
            </div>
        </div>

    </div>
</div>