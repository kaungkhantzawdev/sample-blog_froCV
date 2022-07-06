<?php require_once 'core/auth.php';?>
<?php require_once 'core/isAdmin.php';?>
<?php include "template/header.php"?>

<!--            breadcrumb-->
<div class="row">
    <div class="col-12 m-2">
        <div class="">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/user_list.php">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                                <i class="feather-users text-primary me-2"></i>
                                User Detail
                            </h4>
                        </div>
                        <div class="">
                            <div class="h4 mb-0">
                                <button class="btn btn-outline-warning" id="full-btn">
                                    <i class="feather-maximize"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>View Post</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $id = $_GET['id'];
                            foreach (viewPostByUser($id) as $cat){
                                ?>
                                <tr>
                                    <td><?php echo user($cat['user_id'])['name'] ; ?></td>
                                    <td><?php echo post($cat['post_id'])['title']; ?></td>
                                    <td><?php echo dateTime($cat['created_at']) ; ?></td>
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
