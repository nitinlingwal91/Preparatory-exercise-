
<!doctype html>
<html lang="en">

<head>
    <?php include "links/link.php"?>
    <style><?php include "/csscustom.css"?></style>
    <title>sign up page</title>
</head>

<body>
<?php

include "conn/connection.php";

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
    

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = " SELECT * FROM registration WHERE email = '$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        ?>
        <script>
            alert("email already exists")
        </script>
        <?php

        
    }else{
        if($password === $cpassword){
            $insertquery = "insert into registration( username , email , password ) values( '$username' , '$email' , '$pass' )";
            $iquery = mysqli_query($con, $insertquery);

            if($iquery){
                ?>
                    <script>
                        alert("insert successfully");
                    </script>
                <?php
                header("Location:login.php");
            }else{
                ?>
                    <script>
                        alert("no insert");
                    </script>
                <?php
            }
            

        }else{
            ?>
            <script>
                alert("password are not matching");
            </script>
        <?php
        }
    }
}



?>
    <nav class="navbar navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold ms-md-4" href="#">E-LIBRARY</a>
            <section>
                <a type="button" class="btn btn-primary d-flex justify-content-end align-items-center" href="login.php">Log In</a>
            </section>

        </div>
    </nav>
    <main>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-4">Create an account</h2>

                                <form action="" method="POST">

                                    <div class="form-outline mb-3">
                                        <label class="form-label"  for="form3Example1cg">user name</label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="username" required />

                                    </div>

                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="form3Example3cg">email</label>
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" required />

                                    </div>

                                    <div class="form-outline mb-3">
                                        <label class="form-label"  for="form3Example4cg">Password</label>
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" required />

                                    </div>

                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="form3Example4cdg">confirm password</label>
                                        <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="cpassword"required />

                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Sign Up</button>
                                    </div>
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