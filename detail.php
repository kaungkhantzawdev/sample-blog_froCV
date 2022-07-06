<?php session_start(); ?>
<?php require_once "front_panel/head.php"; ?>
<title>Sample Blog</title>
<?php require_once "front_panel/side_head.php"; ?>
<?php
$id = $_GET['id'];
$currentPost = post($id);
$currentCat = $currentPost['category_id'];

if(isset($_SESSION['user']['id'])){
    $userId = $_SESSION['user']['id'];
}else{
    $userId = 0;
}
viewRecord($userId, $id, $_SERVER['HTTP_USER_AGENT']);
?>
<div class="container">
    <div class="row pb-5">
        <div class="col-12 col-xl-8">
            <div class="">
                <a href="<?php echo $url;?>/index.php" class="text-decoration-none">
                    <h3 class="post rounded shadow-sm mb-3 bg-white text-center p-2">Post</h3>
                </a>
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/index.php">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo $currentPost['title']; ?>
                        </li>
                    </ol>
                </nav>
                <div class="mb-3 card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="">
                            <h4 class="">
                                <?php echo $currentPost['title']; ?>
                            </h4>
                            <div class="my-3">
                            <span class="me-2">
                                <i class="feather-user text-primary"></i>
                                <?php echo user($currentPost['user_id'])['name'] ; ?>
                            </span>
                                <span class="me-2">
                                <i class="feather-layers text-success"></i>
                                <?php echo category($currentPost['category_id'])['title'] ; ?>
                           </span>
                                <span class="me-2">
                                <i class="feather-calendar  text-danger"></i>
                                <?php echo dateTime($currentPost['created_at'], "j M Y"); ?>
                           </span>
                            </div>
                            <div class="">
                                <?php echo html_entity_decode($currentPost['description']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach (fPostCategories($currentCat, 2, $id) as $p){ ?>
                    <div class="col-12 col-lg-6">
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
                    </div>
                    <?php }?>

                </div>
            </div>
        </div>
        <?php require_once 'front_panel/side_right_category.php';?>
    </div>
</div>

<?php require_once "front_panel/footer.php"; ?>



