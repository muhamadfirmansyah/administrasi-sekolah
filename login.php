
<?php 
    error_reporting(0);
    session_start();
    require 'config/koneksi.php';

    if (isset($_COOKIE['RIFOD'])) {
        $id_user = $_COOKIE['RIFOD'];
        $query = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user = '$id_user'");

        $r = mysqli_fetch_array($query);
        if (hash('sha256', $r['username']) === $_COOKIE['RUFOD']) {
            $_SESSION['user'] = $r['username'];
        }
    }

    if (isset($_SESSION['user'])) {
        header('location: dashboard.php');
        exit();
    }
    if (isset($_POST['login'])) {
        $username = strip_tags(stripcslashes(htmlspecialchars($_POST['username'])));
        $password = strip_tags(stripcslashes(htmlspecialchars($_POST['password'])));
        $usernamehash = hash('sha256', $username);

        $password = hash('sha256', $password);


        $cek = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$usernamehash'");
        if (mysqli_num_rows($cek) > 0) {
            $r = mysqli_fetch_array($cek);
            if ($r['password'] === $password) {
                if (isset($_POST['remember'])) {
                    setcookie('RIFOD', $r['id_user'], time() + 86400);
                    setcookie('RUFOD', hash('sha256', $username), time() + 86400);
                }
                $_SESSION['user'] = $r['nama'];
                header('location: dashboard.php');
            }
            else{
                $passerror = true;
            }
        }
        else{
            $akunerror = true;
        }
    }

?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>ADMINISTRASI SEKOLAH</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="custom/css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4 bg-light shadow-2 rounded">
                <div class="card-body p-3 pb-0">
                    <h1 class="card-title">LOGIN</h1>
                    <hr>
                    <?php if (isset($passerror)): ?>
                        <div class="alert alert-danger" role="alert">
                          Password, salah!
                        </div>
                    <?php endif ?>
                    <?php if (isset($akunerror)): ?>
                        <div class="alert alert-danger" role="alert">
                          Akun tidak terdaftar!
                          <small>Hubungi administrator!</small>
                        </div>
                    <?php endif ?>
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Input your username ..." class="form-control" value="<?= @$username ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Input your password ..." class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox mt-1 pointer">
                                <input type="checkbox" class="custom-control-input" name="remember">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Remember Me</span>
                            </label>
                        </div>  
                        <input type="submit" name="login" value="Login" class="btn btn-primary w-100 mb-2">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Custom -->
    <script src="custom/js/script.js"></script>
    <!-- icon / font-awesome -->
    <script src="dist\fontawesome-free-5.0.2\svg-with-js\js\fontawesome-all.min.js"></script>
  </body>
</html> 