<?php include "../controller/auth/registration.con.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../links/link.php"
    ?>
    <style>
        <?php include "../public/css/registration.css" ?>
    </style>
    
    <title>user Registration</title>
</head>

<body>
    <div class="wrapper">
        <div class="form-left">
            <h2 class="text-uppercase">E-library</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.
            </p>
            <p class="text">
                <span>Sub Head:</span>
                Vitae auctor eu augudsf ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.
            </p>
            <div class="form-field">
                <a href="user_login.view.php"><input type="submit" class="account" value="Have an Account?"></a>
            </div>
        </div>
        
        <form class="form-right" action="" method="POST" enctype="multipart/form-data">

            <h2 class="text-uppercase">Registration form</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>First Name</label>
                    <input type="text" id="user_fname" name="user_fname" class="input-field">
                    <h6 id="userfcheck">  </h6>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" id="user_lname" name="user_lname" class="input-field">
                    <h6 id="userlcheck">  </h6>
                </div>
            </div>
            <div class="mb-3">
                <label>Your Email</label>
                <input type="email" class="input-field" id="user_email" name="user_email" required>
                <h6 id="emailcheck">  </h6>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="user_password" id="pwd" class="input-field">
                    <h6 id="passcheck">  </h6>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Current Password</label>
                    <input type="password" name="cpwd" id="cpwd" class="input-field">
                    <h6 id="cpasscheck">  </h6>
                </div>
            </div>
            <!-- <div class="mb-3">
                <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                </label>
            </div> -->
            <div class="form-field mt-3">
                <input type="submit" value="Register" id="register" class="register" name="register">
            </div>
        </form>
    </div>

</body>

 <script src="../public/js/registration.js"></script>

</html>