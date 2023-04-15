<?php include "../conn/connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../links/link.php"?>
    <title>new password</title>
</head>
<body>
<div class="container d-flex flex-column mb-4">
    <div class="row align-items-center justify-content-center
          min-vh-100">
      <div class="col-12 col-md-8 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="mb-4">
            
              <p class="mb-2 fw-bold">Reset your password
              </p>
            </div>
            <form action="../controller/auth/pass_verify.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="pass_token" value="<?php if(isset($_GET['email_token'])){echo $_GET['email_token'];}?>">

              <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" id="email" class="form-control" name="user_email" value="<?php if(isset($_GET['user_email'])){echo $_GET['user_email'];}?>" placeholder="" required="">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" id="password" class="form-control" name="user_password" placeholder="" required="">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" id="password" class="form-control" name="cpwd" placeholder="" required="">
              </div>
              <div class="mb-3 d-grid">
                <button type="submit" name="pass_submit" class="btn btn-primary">
                  Save Password
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>