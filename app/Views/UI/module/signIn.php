<div class="allcontainer">
    <div class="blurred-div" id="loginModule">
        <div class="operation-message success" id="success">
            <p>User Registration Successful.</p>
        </div>
        <div class="operation-message success" id="success_2">
            <p>User Login Successful.</p>
        </div>
        <div class="operation-message error" id="error">
            <p>User Registration Failed.</p>
        </div>
        <div class="operation-message warning" id="warning">
            <p>Please check your email and password credentials.</p>
        </div>
        <div class="operation-message warning" id="warning_ex">
            <p>Error occured while validating your credentials</p>
        </div>
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
                <input type="email" class="form-control" id="login-email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="user-password">Password</label>
                <input type="password" class="form-control" id="login-password" placeholder="Password">

            </div>
            <button id="login" class="btn btn-primary w-100 my-3">Log In</button>
            <div class="sign-up-div p-3">
                <p>
                    Don't have an account?
                </p>
                <button id="register_link_btn" class="sign-up-btn btn btn-outline-secondary m-2">Sign Up!</button>
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
                <label for="user_name">Username</label>
                <input type="text" class="form-control" id="user_name" aria-describedby="emailHelp" placeholder="Enter username">
                <small id="emailHelp" class="form-text text-muted">Enter your username here.</small>
            </div>
            <div class="form-group">
                <label for="user_email">Email address</label>
                <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="user-password">Password</label>
                <input type="password" class="form-control" id="user_password" minlength="5" maxlength="15" placeholder="Password">
                <small class="form-text text-muted">
                    Password should be at least 5 characters long
                </small>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <button class="btn btn-primary w-100" id="register">Register</button>
            <div class="sign-up-div p-3">
                <p>
                    Already have an account?
                </p>
                <button class="sign-up-btn btn btn-outline-secondary m-2" id="login_link_btn">Log In</button>
            </div>
        </div>
    </div>
</div>