<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MUSCLE GYM</title>

  <link rel="stylesheet" href="css/style.css">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

</head>

<body>

  <div class="box">
    <center>
      <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/gym.jpg" alt="" height="128px" width="128px">
    </center>
    <h2>Sign in</h2>
    <p></p>
    <form action="proses_login.php" method="POST" onsubmit="return validasi()">
      <div class="inputBox">
        <input type="username" name="username" id="username" required onkeyup="this.setAttribute('value', this.value);" value="">
        <label>Username</label>
      </div>
      <div class="inputBox">
        <input type="password" name="password" id="password" required onkeyup="this.setAttribute('value', this.value);" value="">
        <label>Password</label>
      </div>
      <input type="submit" name="submit" value="Sign In">
    </form>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>
  <script>
    $.backstretch("img/logo.jpg", {
      speed: 500
    });
  </script>

  <script type="text/javascript">
    function validasi() {
      var username = $("#username").val();
      var password = $("#password").val();
      if (username != "" && password != "") {
        return true;
      } else {
        alert('Username dan Password harus di isi !');
        return false;
      }
    }
  </script>

</body>

</html>