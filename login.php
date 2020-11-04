<?php include('./controller/session.php'); ?>
<?php

require_once "./controller/koneksi.php";
include "./controller/session.php";
if (isset($session_id)) {
    header('Location:./index');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LifeMedia | Log in</title>
    <link rel="icon" href="./assets/dist/img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="./assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="./assets/plugins/toastr/toastr.min.css">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Life</b>Media
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan melakukan login</p>
                <form action="" method="POST" id="login">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" value="administrator"
                            name="username" required autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback text-danger">
                            <h9 class="text-danger form-text">
                                <?php //echo form_error('username') 
                                ?>
                            </h9>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" autofocus placeholder="Password" name="password"
                            required autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            <?php //echo form_error('password'); 
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <div class="icheck-primary">
                                <center>
                                    <p class="mb-1">
                                        <a href="">Lupa password ?</a>
                                    </p>
                                </center>
                            </div>
                        </div> <!-- /.col -->
                    </div>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" name="submit" class="btn btn-block btn-primary">
                            Login
                        </button>
                    </div>
                </form>

                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="./assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="./assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="./assets/plugins/toastr/toastr.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

</body>

</html>


<!-- proses login -->

<?php
session_start();
$error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
        // Variabel username dan password
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Membangun koneksi ke database
        include "./koneksi.php";
        // Mencegah MySQL injection
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($koneksi, $username);
        $password = mysqli_real_escape_string($koneksi, $password);

        // SQL query untuk memeriksa apakah karyawan terdapat di database?
        $sql = "SELECT id, username FROM operators WHERE username = '" .
            $username . "' AND password = '" . $password . "'";
        $query = mysqli_query($koneksi, $sql);
        $rows = mysqli_num_rows($query);
        if ($rows >= 1) {

            date_default_timezone_set('Asia/Jakarta');
            $date = date("Y-m-d H:i:s");
            $sql_update = "UPDATE operators SET lastlogin='$date' WHERE username='$username'";
            $query_update = mysqli_query($koneksi, $sql_update);

            $c = mysqli_fetch_array($query); // Membuat Sesi/session

            $_SESSION['username'] = $c['username'];
            $_SESSION['id'] = $c['id'];
            // header("location:./index");
?>
<script>
setTimeout(function() {
    window.location.href = './index'
}, 0);
</script>
<?php
        } else {
        ?>
<script>
$(function() {
    toastr.error('Nama Pengguna atau Kata Sandi Salah!')
});
$('#login')[0].reset();
</script>

<?php
            mysqli_close($koneksi);
        }
    }
}