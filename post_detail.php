<?php require_once 'core/auth.php';?>
<?php include "template/header.php"?>

<?php
    $id = $_GET['id'];
    $currentPost = post($id);
?>
<!--            breadcrumb-->
<div class="row">
    <div class="col-12 m-2">
        <div class="">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/post_list.php">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo $currentPost['title']; ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!--            add item section -->
<div class="row mb-5">
    <div class="col-12 col-xl-6">
        <div class="" >
            <div class="card border-0 shadow-sm" id="full">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="mb-0 d-flex align-items-center">
                                <i class="feather-info text-primary me-2"></i>
                                Post Detail
                            </h4>
                        </div>
                        <div class="">
                            <div class="h4 mb-0">
                                <button class="btn btn-outline-warning" id="full-btn">
                                    <i class="feather-maximize"></i>
                                </button>
                                <a href="<?php echo $url; ?>/post_add.php" class="text-decoration-none">
                                    <button class="btn btn-outline-primary">
                                        <i class="feather-plus-circle"></i>
                                    </button>
                                </a>
                                <a href="<?php echo $url; ?>/post_list.php" class="text-decoration-none">
                                    <button class="btn btn-outline-primary">
                                        <i class="feather-list"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
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
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card border-0 shadow-sm full" >
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h4 class="mb-0 d-flex align-items-center">
                            <i class="feather-users text-primary me-2"></i>
                            Post viewers
                        </h4>
                    </div>
                    <div class="">
                        <div class="h4 mb-0">
                            <button class="btn btn-outline-warning full-btn" >
                                <i class="feather-maximize"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="overflow-hidden mt-2 mt-lg-0">
                    <table id="example" class="mt-2 mt-lg-0 table table-bordered table-responsive" style="width:100%">
                        <thead>
                        <th>Who</th>
                        <th>Device</th>
                        <th>Time</th>
                        </thead>
                        <tbody>
                        <?php foreach (viewCountByPost($id) as $p){ ?>

                            <tr>
                                <?php if($p['user_id']==0){ ?>
                                    <td class="text-nowrap"><?php  echo 'Guest'; ?></td>
                                <?php }else{?>
                                    <td class="text-nowrap"><?php  echo user($p['user_id'])['name']; ?></td>
                                <?php }?>
                                <td><?php  echo $p['device']; ?></td>
                                <td class="text-nowrap"><?php  echo dateTime($p['created_at']) ?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>


<?php include "template/footer.php"?>


