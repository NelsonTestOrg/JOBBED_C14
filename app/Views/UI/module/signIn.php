<div class="allcontainer">
    <div class="blurred-div" id="loginModule">

        <div class="w-50 p-4 form-control" id="sign_in_form_div">
            <div class="exit w-100">
                <button class="btn btn-danger py-1" style="font-size: 1.3rem;" onclick="closeModule()"><i class="fa-solid fa-xmark"></i> </button>
            </div>
            <div class="details">
                <div class="sign-in-head" style="display:flex; flex-wrap:nowrap;">
                    <img src="images/enter.png" class="p-2 mb-1" style="width: 3rem; object-fit:contain;" alt="">
                    <h3 style="padding-top:.5rem ;">Sign In</h3>
                </div>
                <div class="line m-2"></div>
            </div>

            <div class="form-group">
                <label for="user-email">Email address</label>
                <input type="email" class="form-control" id="user-email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="user-password">Password</label>
                <input type="password" class="form-control" id="user-password" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <button class="btn btn-primary w-100">Log In</button>
            <div class="sign-up-div p-3">
                <p>
                    Don't have an account?
                </p>
                <button id="register_link_btn" class="sign-up-btn btn btn-primary m-2">Sign Up!</button>
            </div>
        </div>
        <div class="w-50 p-4 form-control" id="sign_up_form_div">
            <div class="exit w-100">
                <button class="btn btn-danger py-1" style="font-size: 1.3rem;" onclick="closeModule()"><i class="fa-solid fa-xmark"></i> </button>
            </div>
            <div class="details">
                <div class="sign-in-head" style="display:flex; flex-wrap:nowrap;">
                    <img src="images/add.png" class="p-2 mb-1" style="width: 3rem; object-fit:contain;" alt="">
                    <h3 style="padding-top:.5rem ;">Sign Up</h3>
                </div>
                <div class="line m-2"></div>
            </div>

            <div class="form-group">
                <label for="user-email">Email address</label>
                <input type="email" class="form-control" id="user-email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="user-password">Password</label>
                <input type="password" class="form-control" id="user-password" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <button class="btn btn-primary w-100">Register</button>
            <div class="sign-up-div p-3">
                <p>
                    Already have an account?
                </p>
                <button class="sign-up-btn btn btn-primary m-2" id="login_link_btn">Log In</button>
            </div>
        </div>
    </div>
</div>