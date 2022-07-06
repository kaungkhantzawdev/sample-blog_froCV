<?php require_once 'core/auth.php';?>
<?php include "template/header.php"?>


<!--            breadcrumb-->
<div class="row">
    <div class="col-12 m-2">
        <div class="">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Posts</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!--            add item section -->
<div class="row mb-5">
    <div class="col-12">
        <div class="" >
            <div class="card border-0 shadow-sm" id="full">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="mb-0 d-flex align-items-center">
                                <i class="feather-list text-primary me-2"></i>
                                Post List
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
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <table id="example" class="table table-bordered table-responsive" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category Title</th>
                                <th>Description</th>
                                <?php if($_SESSION['user']['role'] == 0){ ?>
                                <th>User</th>
                                <?php } ?>
                                <th>Viewers</th>
                                <th>Control</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach (posts() as $cat){
                                ?>
                                <tr>
                                    <td><?php echo $cat['id'] ; ?></td>
                                    <td><?php echo short($cat['title']) ; ?></td>
                                    <td><?php echo category($cat['category_id'])['title']; ?></td>
                                    <td><?php echo short( strip_tags(html_entity_decode($cat['description']))); ?></td>
                                    <?php if($_SESSION['user']['role'] == 0){ ?>
                                        <td class="text-nowrap"><?php echo user($cat['user_id'])['name'] ; ?></td>
                                    <?php } ?>
                                    <td class="text-center"><?php echo count(viewCountByPost($cat['id'])); ?></td>
                                    <td class="text-nowrap">
                                        <a href="post_detail.php?id=<?php echo $cat['id'] ; ?>" class="btn btn-sm btn-outline-info">
                                            <i class="feather-info fa-fw"></i>
                                        </a>
                                        <a href="post_update.php?id=<?php echo $cat['id'] ; ?>" class="btn btn-sm btn-outline-warning">
                                            <i class="feather-edit-2 fa-fw"></i>
                                        </a>
                                        <a href="post_delete.php?id=<?php echo $cat['id'] ; ?>"
                                           onclick="return confirm('Are you sure to delete.')"
                                           class="btn btn-sm btn-outline-danger">
                                            <i class="feather-trash-2 fa-fw"></i>
                                        </a>
                                    </td>
                                    <td class="text-nowrap"><?php echo dateTime($cat['created_at']) ; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "template/footer.php"?>


