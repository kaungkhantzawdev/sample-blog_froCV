<?php require_once "core/auth.php";?>
<?php include "template/header.php"?>

<!--            breadcrumb-->
<div class="row">
    <div class="col-12 m-2">
        <div class="">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/post_list.php">Post</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Post</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!--            add item section -->
<?php
if(isset($_POST['addBtn'])){
    postAdd();
}
?>
<form class="row mb-5" method="post">
    <div class="col-12 col-xl-8">
        <div class="">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="mb-0 d-flex align-items-center">
                                <i class="feather-plus-circle text-primary me-2"></i>
                                Create Post
                            </h4>
                        </div>
                        <div class="">
<!--                            <div class="h4 mb-0">-->
<!--                                <a href="--><?php //echo $url;?><!--/post_list.php" class="text-decoration-none">-->
<!--                                    <button class="btn btn-outline-primary">-->
<!--                                        <i class="feather-list"></i>-->
<!--                                    </button>-->
<!--                                </a>-->
<!---->
<!--                            </div>-->
                        </div>
                    </div>
                    <hr>
                    <div class="">

                            <div class="">
                                <div class="mb-3">
                                    <label for="post" class="mb-1">Post Title</label>
                                    <input type="text" id="post" name="title" required autofocus class="form-control">
                                </div>

                                <div class="mb-0">
                                    <label for="post_des" class="mb-1">Post Description</label>
                                    <textarea name="description" class="form-control" id="summernote" rows="15"></textarea>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h4 class="mb-0 d-flex align-items-center">
                            <i class="feather-layers text-primary me-2"></i>
                            Select Category
                        </h4>
                    </div>
                    <div class="">
<!--                        <div class="h4 mb-0">-->
<!--                            <a href="--><?php //echo $url;?><!--/category_add.php" class="text-decoration-none">-->
<!--                                <button class="btn btn-outline-primary">-->
<!--                                    <i class="feather-plus-circle"></i>-->
<!--                                </button>-->
<!--                            </a>-->
<!---->
<!--                        </div>-->
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                        <?php foreach (categories() as $c){ ?>
                            <div class="form-check">
                                <input class="form-check-input" value="<?php echo $c['id']; ?>" type="radio" name="category_id" id="flexRadioDefault<?php echo $c['id']; ?>">
                                <label class="form-check-label" for="flexRadioDefault<?php echo $c['id']; ?>">
                                    <?php echo $c['title']; ?>
                                </label>
                            </div>

                        <?php } ?>

                </div>

                <button class="btn btn-primary" name="addBtn">
                    <i class="feather-plus-circle me-2"></i>
                    Add Post
                </button>

            </div>
        </div>
    </div>
</form>

<?php include "template/footer.php"?>


