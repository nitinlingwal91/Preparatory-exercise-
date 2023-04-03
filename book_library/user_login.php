<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "links/link.php"
    ?>
    <style><?php
    include "css/custom.css"
    ?></style>
    <title>user login</title>
</head>
<body>
<div class="container-fluid vh-100" style="margin-top:100px">
            <div class="" style="margin-top:100px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary fw-bold">User LogIn</h3>
                        </div>
                        <form action="" method="POST">
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="email" class="form-control" name="user_email" placeholder="User Email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" class="form-control" name="user_password" placeholder="password">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <button class="btn btn-primary text-center mt-2" type="submit">
                                    Login
                                </button>
                                <p class="text-center mt-5">Don't have an account?
                                    <a href="registration.php"><span class="text-primary fw-bold">Register</span></a>
                                </p>
                                <p class="text-center text-primary fw-bold">Forgot your password?</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>