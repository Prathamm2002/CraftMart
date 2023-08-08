<?php
// (A) PROCESS LOGIN
// (A1) ALREADY SIGNED IN
if (isset($_COOKIE["jwt"])) {
  require "../database.php";
  $user = $_USER->validate($_COOKIE["jwt"]);
  if ($user===false) { setcookie("jwt", null, -1); }
  else { header("Location: index.php"); exit(); }
}

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
 
<!-- (C) LOGIN FORM -->
<form method="post">
  <h1>LOGIN</h1>
  <input type="email" placeholder="Email" name="email" >
  <input type="password" placeholder="Password" name="password">
  <input type="submit" value="Sign In">
</form>