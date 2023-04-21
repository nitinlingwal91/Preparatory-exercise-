<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../links/link.php"
    ?>
    <style>
        <?php
        include "../public/css/user_login.css"
        ?>
    </style>
    <title>user login</title>
</head>

<body>
    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="mb-5">
                                <h3 class="h4 font-weight-bold text-theme">User Login</h3>
                            </div>
                            <h6 class="h5 mb-0">Welcome back!</h6>
                            <p class="text-muted mt-2 mb-5">Enter your email address and password to access the page.</p>
                            <form action="../controller/auth/reader_login.php" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="user_email" id="user_email" required>
                                    <h6 id="emailcheck"></h6>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="user_password" id="user_password" required>
                                    <h6 id="passcheck"></h6>
                                </div>
                                
                                <button type="submit" name="reader_submit" id="reader_submit" class="btn btn-theme btn-primary">Login</button>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <a href="recovery_mail.view.php" class="forgot-link float-right text-primary text-center mt-3 mb-0 ">Forgot password?</a>
            <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="../view/registration.view.php" class="text-primary ml-1">register</a></p>

         

        </div>
   
    </div>
   
    </div>
</body>
<script src="../public/js/registration.js"></script>
</html>