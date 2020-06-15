<?php 

    require "controller/controllers.php";
    session_start();

    if (isset($_COOKIE['RIFOD'])) {
        $id_user = $_COOKIE['RIFOD'];
        $query = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user = '$id_user'");
        $row = mysqli_fetch_array($query);
        if (hash('sha256', $row['username']) === $_COOKIE['RUFOD']) {
            $_SESSION['user'] = $row['username'];
            update_time($row['username']);
        }
    }

    if (isset($_SESSION['user'])) {
        header('location: dashboard.php');
    }
    
    if (isset($_POST['login'])) {
        $username = stripslashes(strip_tags(htmlspecialchars(strtolower($_POST['username']))));  
        $password = stripslashes(strip_tags(htmlspecialchars($_POST['password'])));

        if (konfirm($username, $password) > 0) {
            $_SESSION['user'] = $username;

            if (isset($_POST['remember'])) {
                $result = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$username'");
                $row = mysqli_fetch_array($result);
                setcookie('RIFOD', $row['id_user'], time() + 86400);
                setcookie('RUFOD', hash('sha256', $username), time() + 86400);
            }
            update_time($username);
            echo "<script>document.location.href='dashboard.php';</script>";
            exit();
        } else{
            $error = true;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
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
    <!-- You Can Play This -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4 bg-light shadow-2 rounded">
                <div class="card-body p-3 pb-0">
                    <h1 class="card-title">LOGIN</h1>
                    <hr>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                          Username or password, wrong!
                        </div>
                    <?php endif ?>
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Input your username ..." class="form-control" required>
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