<?php require_once "core/base.php";?>
<?php require_once "core/functions.php"?>
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
    <link rel="stylesheet" href="<?php echo $url?>/assets/css/datatable/datatable_bot5.css">
    <link rel="stylesheet" href="<?php echo $url?>/assets/css/datatable/datable-bootstrap5.css">
    <link rel="stylesheet" href="<?php echo $url?>/assets/vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>/assets/css/style.css">

</head>
<body>

<section class="container-fluid">
    <div class="row">

        <!--        sidebar-->

        <?php require_once "template/sidebar.php";?>

        <!--        content-->

        <div class="col-12 col-lg-9 col-xl-10 content bg-light overflow-scroll vh-100">

            <!--            header-->
            <div class="row  header ">
                <div class="col-12">
                    <div class=" pd">
                        <div class="shadow-sm py-1 px-2 bg-primary rounded d-flex align-items-center justify-content-between">
                            <button class="d-block d-lg-none btn btn-primary" id="showSidebarBtn">
                                <i class="feather-menu text-light" style="font-size: 35px"></i>
                            </button>

                            <div class="d-none d-md-block">
                                <a href="<?php echo $url; ?>/post_add.php" class="">
                                    <button class="btn btn-light text-primary">
                                        <i class="feather-plus-circle me-2"></i>
                                        <sapn>
                                            Quick Post
                                        </sapn>
                                    </button>
                                </a>
                            </div>

                            <div class="">
                                <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo $url;?>/assets/img/<?php echo $_SESSION['user']['photo']; ?>" class="rounded-circle me-1" style="width: 30px" alt="">
                                        <?php echo $_SESSION['user']['name']; ?>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="<?php echo $url; ?>/wallet.php"><i class="feather-dollar-sign"></i> Wallet</a></li>
                                        <li><a class="dropdown-item" href="<?php echo $url; ?>/index.php"><i class="feather-arrow-right-circle"></i> Go to News</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="<?php echo $url; ?>/logout.php"><i class="feather-log-out"></i> Log out</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
