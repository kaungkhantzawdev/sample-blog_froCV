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
<div class="row mb-5">
    <div class="col-12 col-xl-8">
        <div class="">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="mb-0 d-flex align-items-center">
                                <i class="feather-plus-circle text-primary me-2"></i>
                                Add Post
                            </h4>
                        </div>
                        <div class="">
                            <div class="h4 mb-0">
                                <a href="<?php echo $url;?>/post_list.php" class="text-decoration-none">
                                    <button class="btn btn-outline-primary">
                                        <i class="feather-list"></i>
                                    </button>
                                </a>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <?php
                        $id = $_GET['id'];
                        $currentRow = post($id);

                        if(isset($_POST['updateBtn'])){
                            if(postUpdate()){
                                linkTo("post_list.php");
                            };
                        }
                        ?>
                        <form action="" method="post">
                            <div class="">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="mb-3">
                                    <label for="post" class="mb-1">Post Title</label>
                                    <input type="text" id="post" name="title" value="<?php echo $currentRow['title']; ?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="mb-1">Select Category</label>
                                    <select name="category_id" id="" class="form-select">
                                        <?php foreach (categories() as $c){ ?>
                                            <option value="<?php echo $c['id']; ?>" <?php echo $c['id']==$currentRow['category_id']?"selected":""; ?>><?php echo $c['title']; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="post_des" class="mb-1">Post Description</label>
                                    <textarea name="description" class="form-control" id="post_des" rows="15"><?php echo $currentRow['description']; ?></textarea>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" name="updateBtn">
                                <i class="feather-plus-circle me-2"></i>
                                Update Post
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"?>


