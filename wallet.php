<?php   require_once "core/auth.php" ?>
<?php include "template/header.php"?>
<?php
if(isset($_POST['transfer'])){
    transfer();
}
?>

<!--            breadcrumb-->
<div class="row">
    <div class="col-12 m-2">
        <div class="">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="bar" href="<?php echo $url;?>/dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wallet</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!--            add item section -->
<div class="row mb-5">
    <div class="col-12 col-xl-12">
        <div class="l">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="mb-0 d-flex align-items-center">
                                <i class="feather-dollar-sign text-primary me-2"></i>
                                Wallet Manager
                            </h4>
                        </div>
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 d-flex align-items-center me-2 text-primary">
                                Your money
                                <i class="feather-dollar-sign text-primary my-2"></i>
                                <?php echo user($_SESSION['user']['id'])['money']; ?>
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="">

                        <form action="" method="post" >
                            <div class="d-flex align-items-center">
                                <select name="to_user" id="" class="form-select w-25 me-2" required>
                                    <option value="" class="" selected disabled>Select User</option>
                                    <?php foreach (users() as $user){
                                        if($_SESSION['user']['id'] != $user['id']){
                                    ?>
                                        <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                                    <?php } }?>
                                </select>
                                <input type="number" class="form-control w-25 me-2" placeholder="pay amount" min="100" max="<?php echo user($_SESSION['user']['id'])['money']; ?>" name="amount" required >
                                <input type="text" class="form-control w-25 me-2" name="des" placeholder="for what" required >
                                <button class="btn btn-primary" name="transfer">
                                    <i class="feather-dollar-sign me-2"></i>
                                    Transfer
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="">
                            <table id="example" class="table table-hover table-bordered mt-3">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From User</th>
                                    <th>To User</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Date / Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach (transitions() as $tr){ ?>
                                    <tr>
                                        <td><?php echo $tr['id']; ?></td>
                                        <td><?php echo user($tr['from_user'])['name']; ?></td>
                                        <td><?php echo user($tr['to_user'])['name']; ?></td>
                                        <td><?php echo $tr['amount']; ?></td>
                                        <td><?php echo $tr['des']; ?></td>
                                        <td><?php echo date("d-m-Y / h:i", strtotime($tr['created_at'])); ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"?>

