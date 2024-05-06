<?php
require_once 'partials/header.php';
require_once 'partials/sideNav.php';
?>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2 px-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Vendors</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $user->vendorCount() ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <img style="width: 50px; height: 40px; margin-top: 5px;" src="/View/assests/SVG/vendors.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2 px-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Products</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                        <img style="width: 50px; height: 50px;" src="/View/assests/SVG/products.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2 px-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Category</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                        <img style="width: 50px; height: 50px;" src="/View/assests/SVG/category.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'partials/endSideNav.php';
require_once 'partials/footer.php';
?>