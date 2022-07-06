<?php   require_once "core/auth.php" ?>
<?php include "template/header.php"?>


<!--            breadcrumb-->
<div class="row">
    <div class="col-12 m-2">
        <div class="">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                                <i class="feather-layers text-primary me-2"></i>
                                Category Manager
                            </h4>
                        </div>
                        <div class="">
                            <div class="h4 mb-0">
                                <a href="<?php echo $url;?>/category_add.php" class="text-decoration-none">
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
                        $currentRow = category($id);

                        if(isset($_POST['updateBtn'])){
                            if(categoryUpdate($id)){
                               return linkTo("category_add.php");
                            };
                        }
                        ?>
                        <form action="" method="post">
                            <div class="d-flex align-items-center">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="text" class="form-control w-50 me-2" name="title" value="<?php echo $currentRow['title'];?>" required autofocus>
                                <button class="btn btn-primary" name="updateBtn">
                                    <i class="feather-plus-circle me-2"></i>
                                    Update Category
                                </button>
                            </div>
                        </form>
                        <hr>
                        <?php include_once "category_list.php";?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"?>

