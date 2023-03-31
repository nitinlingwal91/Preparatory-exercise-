
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "links/link.php" ?>
    <style>
        <?php include "css/custom.css" ?>
    </style>
    <title>Login page</title>
</head>

<body>
    <?php
   

    include "conn/connection.php";
    

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "SELECT * From registration WHERE email = '$email'";
        $q = mysqli_query($con,$sql);
        $num = mysqli_num_rows($q);


        if ($num == 1) {
            $data = mysqli_fetch_assoc($q);
            $upass = $data['password'];
            $pass = password_verify($password, $upass);
            if($pass == true){
                ?>
                <script>
                    alert ("login successful");
                </script>
                <?php
                header("Location:index.php");
            }else{
                ?>
                <script>
                    alert ("invalid email or password");
                </script>
                <?php
            }
        }
    }
    ?>


    <nav class="navbar  navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand mx-4 fw-bold" href="#">E-LIBRARY</a>

        </div>
    </nav>
    <main>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-4">User LogIn</h2>
                                <!-- login form -->
                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label"  for="form2Example1">Email </label>
                                        <input type="email" id="form2Example1" class="form-control form-control-lg" name="email" class="form-control" required/>

                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label"  for="form2Example2">Password</label>
                                        <input type="password" id="form2Example2" class="form-control form-control-lg" name="password" class="form-control" required />

                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit"  name="submit" class="btn btn-primary btn-block mb-4">Log In</button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>Not a member? <a href="signin_form.php">Sign Up</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>