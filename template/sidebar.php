<div class="col-12 col-lg-3 col-xl-2">
    <div class="sidebar vh-100">
        <div class="d-flex align-items-center justify-content-between pd nav-brand">
            <div class="d-flex align-items-center justify-content-center">
                <span class="text-primary"><i class="feather-shopping-bag fs-3 me-2"></i></span>
                <span class="fw-bold fs-5 text-primary">My Shop</span>
            </div>
            <button class="d-block d-lg-none p-2 btn btn-light" id="hideSidebarBtn">
                <i class="feather-x text-primary" style="font-size: 35px"></i>
            </button>
        </div>

        <!--                nav menu-->
        <div class="py-2 nav-main">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?php echo $url;?>/dashboard.php" class="nav-item-link">
                        <i class="feather-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url;?>/index.php" class="nav-item-link">
                        <i class="feather-arrow-right-circle"></i>
                        Go to News
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url;?>/wallet.php" class="nav-item-link">
                        <i class="feather-dollar-sign"></i>
                        Wallet
                    </a>
                </li>
                <li class="nav-spacer py-2"></li>

                <li class="nav-title">
                    Manage Post
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url;?>/post_add.php" class="nav-item-link">
                        <i class="feather-plus-circle"></i>
                        Add Post
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url;?>/post_list.php" class="nav-item-link ">
                        <div class="d-flex justify-content-between">
                             <span class="">
                              <i class="feather-list"></i>
                              Post List
                             </span>
                            <span class="badge p-1 bg-white shadow-sm text-primary">
                                <?php echo countTotal('posts'); ?>
                            </span>
                        </div>
                    </a>
                </li>
                <li class="nav-spacer py-2"></li>


                <li class="nav-title">
                    Viewers
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url;?>/viewers_list.php" class="nav-item-link ">
                        <div class="d-flex justify-content-between">
                         <span class="">
                          <i class="feather-heart"></i>
                            Viewers
                         </span>
                            <span class="badge p-1 bg-white shadow-sm text-primary">
                            <?php echo countTotal('viewers'); ?>
                        </span>
                        </div>
                    </a>
                </li>
                <li class="nav-spacer py-2"></li>

                <?php if($_SESSION['user']['role'] <= 1){ ?>
                <li class="nav-title">
                    Setting
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url;?>/category_add.php" class="nav-item-link ">
                        <div class="d-flex justify-content-between">
                             <span class="">
                              <i class="feather-layers"></i>
                                Category Manager
                             </span>
                            <span class="badge p-1 bg-white shadow-sm text-primary">
                                <?php echo countTotal('categories'); ?>
                            </span>
                        </div>
                    </a>
                </li>
                  <?php if($_SESSION['user']['role'] == 0){ ?>
                    <li class="nav-item">
                        <a href="<?php echo $url;?>/user_list.php" class="nav-item-link ">
                            <div class="d-flex justify-content-between">
                                 <span class="">
                                  <i class="feather-users"></i>
                                    User Manager
                                 </span>
                                <span class="badge p-1 bg-white shadow-sm text-primary">
                                    <?php echo countTotal('users'); ?>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                            <a href="<?php echo $url;?>/ads_add.php" class="nav-item-link ">
                                <div class="d-flex justify-content-between">
                                 <span class="">
                                  <i class="feather-package"></i>
                                    Ads Manager
                                 </span>
                                    <span class="badge p-1 bg-white shadow-sm text-primary">
                                    <?php echo countTotal('ads'); ?>
                                </span>
                                </div>
                            </a>
                        </li>
                    <?php }?>

                    <li class="nav-spacer py-2"></li>
                <?php } ?>

                <li class="nav-spacer py-2"></li>
                <li class="nav-item">
                    <a href="<?php echo $url;?>/logout.php" class="btn btn-danger w-100">
                        <i class="feather-log-out"></i>
                        Logout
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>

<script src="<?php echo $url; ?>/assets/vendor/jquery-3.3.1.min.js"></script>
<script>
    let currentPage = location.href;

    $('.nav-item-link').each(function (){
        let links = $(this).attr('href');
        if (currentPage == links ){
            $(this).addClass('active-nav');
        }
    });

</script>
