<?php require_once "front_panel/head.php"; ?>
<title>Sample Blog</title>
<?php require_once "front_panel/side_head.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="">
                <a href="<?php echo $url;?>/index.php" class="text-decoration-none">
                    <h3 class="post rounded shadow-sm mb-3 bg-white text-center p-2">Post</h3>
                </a>
                <h5 class="p-2 bg-white rounded mb-2 shadow-sm">
                    <span class="ms-2"> Search by " <span class="mx-2 fw-bold">
                        <?php echo $_POST['searchKey']; ?>
                    </span> "</span>
                </h5>

                <?php
                    $result = fSearch($_POST['searchKey']);
                    if(count($result) == 0 ){
                        echo alert("This is no Data and Result. Could you search again please !", "danger");
                    }
                ?>
                <?php foreach ($result as $p){ ?>
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



