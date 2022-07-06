<div class="col-12 col-xl-4 pb-5 side_right">
    <div class="categories_panel">
        <div class="mb-2">
            <div class="card border-0 shadow-sm post">
                <div class="card-body">
                    <?php if(isset($_SESSION['user']['id'])){ ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <b class=""><span class="me-2 fw-bold">Hi</span> <?php echo $_SESSION['user']['name']; ?></b>
                            <a href="<?php echo $url; ?>/dashboard.php" class="btn btn-primary d-inline-block ">
                               Go Dashboard
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <b class=""><span class="me-2 fw-bold">Hi</span>  Guest</b>
                            <a href="<?php echo $url; ?>/register.php" class="btn btn-primary d-inline-block">
                                Register Here
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="shadow-sm mb-2 post">
            <div class="">
                <div class="list-group">
                    <a href="<?php echo $url; ?>/index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? '' : 'active'; ?>">
                        All Categories
                    </a>
                    <?php foreach (fCategories() as $c){ ?>
                        <a href="categories_posts.php?category_id=<?php echo $c['id'] ?>" class="list-group-item list-group-item-action
                        <?php echo isset($_GET['category_id'])? ( $_GET['category_id'] == $c['id'] ? 'active':'' ):""; ?>
                        ">
                            <?php echo $c['title']; 
                                if($c['ordering']==1){
                            ?>
                                <i class="feather-paperclip text-primary ms-2"></i>
                            <?php } ?>
                        </a>
                    <?php }?>
                </div>
            </div>
        </div>
<!---->
<!--        <div class="mb-3">-->
<!--            <h3 class="post rounded shadow-sm mb-2 bg-white text-center p-2">Advertisement</h3>-->
<!--            <div class="d-flex align-items-center justify-content-center  post p-1 shadow-sm bg-white rounded" >-->
<!--                <img src="--><?php //echo $url; ?><!--/assets/img/web-link.png" class="w-75" alt="">-->
<!--            </div>-->
<!--        </div>-->


        <div class="mb-3">
            <div class="card border-0 shadow-sm post">
                <div class="card-body">
                    <h4 class="mb-3">Search By Date</h4>

                    <form action="search_by_date.php" method="post">
                        <input type="date" class="form-control mb-3" name="start" required>
                        <input type="date" class="form-control mb-3" name="end" required>
                        <button class="btn btn-primary" name="searchBtn">
                            <i class="feather-calendar me-1"></i> Search
                        </button>
                    </form>

                </div>
            </div>
        </div>


    </div>
</div>