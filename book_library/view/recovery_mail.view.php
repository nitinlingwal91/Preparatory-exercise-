<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../links/link.php" ?>
  <title>recover password</title>
</head>

<body>
  <div class="container d-flex flex-column mb-4">
    <div class="row align-items-center justify-content-center
          min-vh-100">
      <div class="col-12 col-md-8 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="mb-4">
              <h5>Forgot Password?</h5>
              <p class="mb-2">Enter your registered email ID to reset the password
              </p>
            </div>
            <form action="../controller/auth/pass_verify.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="user_email" placeholder="Enter Your Email" required="">
              </div>
              <div class="mb-3 d-grid">
                <button type="submit" name="submit" class="btn btn-primary">
                  send link
                </button>
              </div>
              <span>Don't have an account? <a href="registration.view.php">Register</a></span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>