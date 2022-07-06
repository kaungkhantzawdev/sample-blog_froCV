<?php session_start(); ?>
<?php require_once "front_panel/head.php"; ?>
<title>Sample Blog</title>
<?php require_once "front_panel/side_head.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="">
                <h4 class="post rounded shadow-sm mb-2 bg-white text-center p-2">Post</h4>
                <div class="mb-2 text-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="feather-calendar me-1"></i>sorting
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="<?php echo $url; ?>/sortByDate.php?order_by='created_at'&sort_by='asc'">
                                    <i class="feather-arrow-down me-1"></i> Oldest to Newest
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo $url; ?>/sortByDate.php?order_by='created_at'&sort_by='desc'">
                                    <i class="feather-arrow-up me-1"></i> Newest to Oldest
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo $url; ?>/index.php">
                                    <i class="feather-pocket me-1"></i> default
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php

                    foreach (fPosts() as $p){

                    ?>
                    <div class="card border-0 shadow-sm mb-2 post">
                        <div class="card-body">
                            <a href="detail.php?id=<?php echo $p['id']; ?>" class="text-decoration-none ">
                                <h4 class="">
                                    <?php echo $p['title'] ; ?>
                                </h4>
                            </a>
                            <div class="my-3">
                                <span class="me-2">
                                    <i class="feather-user text-primary"></i>
                                    <?php echo user($p['user_id'])['name'] ; ?>
                                </span>
                                    <span class="me-2">
                                    <i class="feather-layers text-success"></i>
                                    <?php echo category($p['category_id'])['title'] ; ?>
                               </span>
                                    <span class="me-2">
                                    <i class="feather-calendar  text-danger"></i>
                                    <?php echo dateTime($p['created_at'], "j M Y"); ?>
                               </span>
                            </div>
                            <p class="text-black-50">
                                <?php echo short( strip_tags(html_entity_decode($p['description'])), "200"); ?>
                            </p>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
        <?php require_once 'front_panel/side_right_category.php';?>
    </div>
</div>

<?php require_once "front_panel/footer.php"; ?>



