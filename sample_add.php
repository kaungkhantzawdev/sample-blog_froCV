<?php include "template/header.php"?>


<!--            breadcrumb-->
<div class="row">
    <div class="col-12 m-2">
        <div class="">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $url;?>/index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $url;?>/item_list.php">Item</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add item</li>
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
                                Add Item
                            </h4>
                        </div>
                        <div class="">
                            <div class="h4 mb-0">
                                <a href="<?php echo $url;?>/item_list.php" class="text-decoration-none">
                                    <button class="btn btn-outline-primary">
                                        <i class="feather-list"></i>
                                    </button>
                                </a>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <form action="">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="file" class="mb-2">
                                            Upload Photo
                                            <i class="feather-info ms-2"  data-bs-toggle="tooltip" data-bs-placement="top" title="Just support jpg & png"></i>
                                        </label>
                                        <input type="file" id="file" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="mb-2">Item Name</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="type" class="mb-2">Item type</label>
                                        <select type="text" class="form-select" id="type">
                                            <option value="0">clothes</option>
                                            <option value="0">hair code</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="mc" class="mb-2">Main Category</label>
                                        <select type="text" class="form-select" id="mc">
                                            <option value="" selected>select main category</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="sc" class="mb-2">Sub Category</label>
                                        <select type="text" class="form-select" id="sc">
                                            <option value="" selected>select sub category</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="qt" class="mb-2">Item Quantity</label>
                                                    <input type="text" class="form-control" id="qt">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="unit" class="mb-2">Unit</label>
                                                    <select type="text" class="form-select" id="unit">
                                                        <option value="0">clothes</option>
                                                        <option value="0">hair code</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="price" class="mb-2">Price</label>
                                            <input type="text" class="form-control" id="price">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="des" class="mb-2">Description</label>
                                            <textarea type="text" rows="9" class="form-control" id="des"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary">
                                <i class="feather-plus-circle me-2"></i>
                                Add item
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"?>


<script>

    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    let mainCategory = ['Phone','Computer','Tv'];

    let subCategory = [
        {name: 'ios', category_id: 0},
        {name: 'samsung', category_id: 0},
        {name: 'Mi', category_id: 0},
        {name: 'Iphone', category_id: 0},
        {name: 'macBook', category_id: 1},
        {name: 'Asus', category_id: 1},
        {name: 'Acer', category_id: 1},
        {name: 'Hp', category_id: 1},
        {name: 'Panasonic', category_id: 2},
        {name: 'Samsung', category_id: 2},
    ];

    mainCategory.forEach(function (el,index){
        $('#mc').append(`<option value="${index}">${el}</option>`)
    });

    subCategory.forEach(function (el,index){
        $('#sc').append(`<option value="${index}" data-category="${el.category_id}">${el.name}</option>`)
    });

    $('#mc').on('change',function (){
        // console.log($(this).val());
        let currentCategoryId = $(this).val();
        $("#sc option").hide();
        $(`[data-category = ${currentCategoryId}]`).show();
    })

</script>