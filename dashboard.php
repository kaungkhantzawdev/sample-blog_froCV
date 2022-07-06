<?php   require_once "core/auth.php" ?>
<?php include "template/header.php"?>

<!--            icon section -->
<div class="row iconSection">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card border-0 shadow-sm mb-3 status-card mt-1" onclick="goUrl('<?php echo $url; ?>/user_list.php')">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-center w-100 h-100">
                            <i class="feather-users fs-1 text-primary"></i>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <span class="fw-bold h1 mb-2 text-warning counter"><?php echo countTotal('users') ?></span>
                            <p class="text-black-50 mb-0">Total User</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card border-0 shadow-sm mb-3 status-card mt-1" onclick="goUrl('<?php echo $url; ?>/post_list.php')">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-center w-100 h-100">
                            <i class="feather-list fs-1 text-primary"></i>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <span class="fw-bold h1 mb-2 text-warning counter"><?php echo countTotal('posts'); ?></span>
                            <p class="text-black-50 mb-0">Total Post</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card border-0 shadow-sm mb-3 status-card mt-1" onclick="goUrl('<?php echo $url; ?>/category_add.php')">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-center w-100 h-100">
                            <i class="feather-layers fs-1 text-primary"></i>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <span class="fw-bold h1 mb-2 text-warning counter"><?php echo countTotal('categories') ?></span>
                            <p class="text-black-50 mb-0">Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card border-0 shadow-sm mb-3 status-card mt-1" onclick="goUrl()">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-center w-100 h-100">
                            <i class="feather-heart fs-1 text-primary"></i>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <span class="fw-bold h1 mb-2 text-warning counter"><?php echo countTotal('viewers') ?></span>
                            <p class="text-black-50 mb-0">Visitors</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--            chart -->
<div class="row">
    <div class="col-12 col-xl-7">
        <div class="mb-3">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="d-flex align-items-center justify-content-between p-3">
                    <h5 class="mb-0">Visitors & transitions</h5>
                    <div class="d-flex">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar1.jpg" alt="" class="shadow-sm rounded-circle" style="margin-left: -15px; width: 40px; height: 40px">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar2.jpg" alt="" class="shadow-sm rounded-circle" style="margin-left: -15px; width: 40px; height: 40px">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar3.jpg" alt="" class="shadow-sm rounded-circle" style="margin-left: -15px; width: 40px; height: 40px">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar4.jpg" alt="" class="shadow-sm rounded-circle" style="margin-left: -15px; width: 40px; height: 40px">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar5.jpg" alt="" class="shadow-sm rounded-circle" style="margin-left: -15px; width: 40px; height: 40px">
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="ov" height="145"></canvas>
                </div>
            </div>

        </div>
    </div>
    <div class="col-12 col-xl-5">
        <div class="">
            <div class="card border-0 shadow-sm mb-3">
                <div class="d-flex align-items-center justify-content-between p-3">
                    <h5 class="mb-0">Category / Post</h5>
                    <div class="d-flex">
                        <i class="feather-pie-chart fs-3 text-primary"></i>
                    </div>
                </div>
                <div class="card-body">

                    <canvas id="sv" height="220"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!--            item & table-->
<div class="row ">
    <div class="col-12">
        <div class="mb-3">
            <div class="card border-0 shadow-sm table-responsive" >
                <div class="">
                    <div class="d-flex align-items-center justify-content-between p-3">
                        <h5 class="mb-0">Recent Post</h5>
                        <?php

                         $currentUserId = $_SESSION['user']['id'];
                         $totalPosts = countTotal('posts');
                         $totalUserPost = countTotal('posts', "user_id='$currentUserId'");
                         $result = ($totalUserPost/$totalPosts)*100;

                        ?>
                        <div class="w-25">
                            <h6>Yours Post : <?php echo $totalUserPost; ?></h6>
                            <div class="progress w-100" style="height: 8px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo floor($result); ?>%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <table class="table table-bordered table-responsive" style="width:100%">
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
                            foreach (dashboardPosts('5') as $cat){
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


<script>
    $('.counter').counterUp({
        delay: 10,
        time: 2000
    });

    <?php
    $dateArr = [];
    $viewerRate = [];
    $transitions =[];
    $today = date("Y-m-d");
    for ($i=0; $i<10; $i++){
        $date=date_create($today);
        date_sub($date,date_interval_create_from_date_string("$i days"));
        $current =  date_format($date,"Y-m-d");
        array_push($dateArr, $current);
        $result = countTotal("viewers", "CAST(created_at AS DATE)='$current'");
        array_push($viewerRate, $result);
        $resultTwo = countTotal("transitions", "CAST(created_at AS DATE)='$current'");
        array_push($transitions, $resultTwo);
    }

    ?>

    let viewDates =<?php echo json_encode($dateArr);?>;
    let viewerCount = <?php echo json_encode($viewerRate);?>;
    let secData = <?php echo json_encode($transitions); ?>;

    const ov = document.getElementById('ov').getContext('2d');
    const ovChart = new Chart(ov, {
        type: 'line',
        data: {
            labels: viewDates,
            datasets: [{
                label: 'Orders & viewers',
                data: viewerCount,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                tension: 0
            },
                {
                    label: 'Orders & viewers',
                    data: secData,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(13,110,253, 1)',
                        'rgb(235,54,232)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    tension: 0
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines : {
                        display: false
                    },
                    ticks: {
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display:false
                    },
                    ticks: {
                        display: true
                    }
                }],
            },
            legend: {
                labels : {
                    usePointStyle: true
                }
            }
        }
    });


    <?php

        $catName = [];
        $postByCat = [];
        foreach (categories() as $c){
            array_push($catName, $c['title']);
            array_push($postByCat, countTotal("posts", "category_id={$c['id']}"));
        }
    ?>


    let catN = <?php echo json_encode($catName); ?>;
    let postByCat = <?php echo json_encode($postByCat); ?>;


    const sv = document.getElementById('sv').getContext('2d');
    const svChart = new Chart(sv, {
        type: 'pie',
        data: {
            labels: catN,
            datasets: [{
                label: '# of Votes',
                data: postByCat,
                backgroundColor: [
                    '#0d6efd',
                    '#33d68f',
                    '#fd7e14',
                    '#f00d5c',
                    '#ffd500',
                ],

                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    fontColor: '#333',
                    usePointStyle : true
                }
            }
        }
    });



</script>
