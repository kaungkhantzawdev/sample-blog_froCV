<?php   require_once "core/auth.php" ?>
<?php   require_once "core/isAdmin.php" ?>
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
                                <i class="feather-package text-primary me-2"></i>
                                Ads Manager
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <?php
                        if(isset($_POST['adsBtn'])){
                            adsAdd();
                        }
                        ?>
                        <form action="" method="post"   enctype="multipart/form-data" >
                            <div class="">
                                <div class="d-flex align-items-center mb-2">
                                    <input type="text" class="form-control w-50 me-2" name="title" required autofocus>
                                    <input type="file" accept="image/gif, image/png, image/jpg" class="form-control w-50 " name="upload" required >
                                </div>
                                <input type="text" class="form-control w-100 mb-2" name="link" required >
                               <div class="d-flex align-items-center mb-2">
                                   <input type="date" class="form-control w-25 me-2" name="start" required >
                                   <input type="date" class="form-control w-25 me-2 " name="end" required >
                                   <button class="btn btn-primary w-50" name="adsBtn">
                                       <i class="feather-plus-circle me-2"></i>
                                       Add Ads
                                   </button>
                               </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="overflow-hidden">
                        <table id="example" class="table table-bordered table-responsive table-hover" style="width: 100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Owner</th>
                                <th>Ads Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Control</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach (adsAll() as $ads){
                                ?>
                                <tr>
                                    <td><?php echo $ads['id']; ?></td>
                                    <td class="text-nowrap"><?php echo $ads['owner_name']; ?></td>
                                    <td><?php echo $ads['ads_name']; ?></td>
                                    <td class="text-nowrap"><?php echo $ads['start']; ?></td>
                                    <td class="text-nowrap"><?php echo $ads['final']; ?></td>
                                    <td>
                                        <a class="btn btn-outline-warning btn-sm" href="<?php echo $url; ?>/ads_update.php?id=<?php echo $ads['id']; ?>" class="">
                                            <i class="feather-edit-3"></i>
                                        </a>
                                        <a href="<?php echo $url; ?>/ads_delete.php?id=<?php echo $ads['id']; ?>"
                                           onclick="return confirm('Are you sure to delete.')"
                                           class="btn btn-sm btn-outline-danger">
                                            <i class="feather-trash-2 fa-fw"></i>
                                        </a>
                                    </td>
                                    <td class="text-nowrap"><?php echo dateTime($ads['created_at']); ?></td>
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

