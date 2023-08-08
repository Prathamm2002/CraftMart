<?php
// (A) PROCESS LOGIN
// (A1) ALREADY SIGNED IN
// if (isset($_COOKIE["jwt"])) {
//   require "../database.php";
//   $user = $_USER->validate($_COOKIE["jwt"]);
//   if ($user===false) { setcookie("jwt", null, -1); }
//   else { header("Location: index.php"); exit(); }
// }

// (A2) PROCESS SIGN IN
if (isset($_POST["email"]) && isset($_POST["password"])) {
  require "../database.php";
  $jwt = $_USER->login($_POST["email"], $_POST["password"]);
  if ($jwt!==false) {
    setcookie("jwt", $jwt);
    header("Location: index.php");
    exit();
  }
} ?>
<!-- (B) MESSAGE -->
<?php if (isset($jwt)) { ?>
<div class="note"><?=$_USER->error?></div>
<?php } ?>
 

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CraftMart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="../assets/css/styles2.css" />

</head>

<!-- 
<div class="dark-mode-toggle">
  <label for="darkModeToggle">Dark Mode</label>
  <input type="checkbox" id="darkModeToggle">
</div> -->


<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <div
  class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-6 col-xxl-3">
        <div class="card mb-0">
          <div class="card-body">
            <a href="./index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="../img/craftmartlogo.png" width="200" alt="">
            </a>
            <p class="text-center">Your Social Campaigns</p>
            <div class="dark-mode-wrapper">
            <form method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                  <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                  <label class="form-check-label text-dark" for="flexCheckChecked">
                    Remember this Device
                  </label>
                </div>
                <a class="text-primary fw-bold" href="./index.php">Forgot Password ?</a>
              </div>
              <input type="submit" value="Sign In">
              <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                <a class="text-primary fw-bold ms-2" id="craftmartconvert" href="./authentication-register.php">Create an account</a>
              </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script> 
</body>

</html>