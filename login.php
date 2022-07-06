<?php
require_once "core/base.php";
require_once "core/functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $url;?>/assets/vendor/bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url;?>/assets/css/style.css">

</head>
<body class="bg-light">


<section class="register container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-md-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="">
                        <h4 class="text-center text-primary">
                            <i class="feather-users"></i>
                            User Log In
                        </h4>
                        <hr>
                        <?php
                        if(isset($_POST['loginBtn'])){
                          echo signIn();
                        }
                        ?>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="mb-1"><i class="feather-mail text-primary"></i> Your Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="mb-1"><i class="feather-lock text-primary"></i> Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="">
                                <button class="btn btn-primary" name="loginBtn">Login</button>
                                <a href="register.php" class="btn btn-link text-decoration-none">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo $url;?>/assets/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url;?>/assets/vendor/popper.js"></script>
<script src="<?php echo $url;?>/assets/vendor/bootstrap_5/js/bootstrap.bundle.js"></script>

<script src="<?php echo $url;?>/assets/js/app.js"></script>
<script src="<?php echo $url;?>/assets/js/dashboard.js"></script>
</body>
</html>
