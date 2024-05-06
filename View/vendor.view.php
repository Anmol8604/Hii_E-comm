<?php
require_once 'partials/header.php';
require_once 'partials/sideNav.php';
?>

<div class="d-flex flex-wrap align-items-end mb-2 justify-content-between">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2 px-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Vendors
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user->vendorCount() ?></div>
                    </div>
                    <div class="col-auto">
                        <img style="width: 50px; height: 40px; margin-top:5px;" src="/View/assests/SVG/vendors.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex mb-2">
        <div class="list-group list-group-horizontal pe-3">
            <?php
            // if (isset($_GET['sort'])) {
            //     if ($_GET['sort'] == 'name') {
            //         echo '<span class="btn me-1">Sort By Name</span> <a href="vendor.php" class="btn btn-outline-secondary">Clear Filter</a>';
            //     } else if ($_GET['sort'] == 'Bname') {
            //         echo '<span class="btn me-1">Sort By Business Name</span> <a href="vendor.php" class="btn btn-outline-secondary">Clear Filter</a>';
            //     }
            // }
            ?>
        </div>
        <div class="dropdown pe-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                    <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5z" />
                </svg>&nbsp;Filter</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="vendor.php?sort=name">By Name</a></li>
                <li><a class="dropdown-item" href="vendor.php?sort=Bname">By Business Name</a></li>
            </ul>
        </div>
        <div class="pe-3 d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" id="search" onchange="search(2)" class="form-control bg-outline-secondary border-1 border-secondary small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#AddVendor">+ Create Vendor</button>
        </div>
    </div>
</div>

<!-- Vendor Table -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Vendors</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Business Type</th>
                                <th scope="col">Business Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="venTable">
                            <?php
                            // $i = $page * 5 - 5;
                            // $data2 = $conn->query($selectVendor);
                            // while ($res = $data2->fetch_array()) {
                            //     echo "<tr'>";
                            //     echo "<td>" . ++$i . "</td>";
                            //     echo "<td>" . $res['fname'] . " " . $res['lname'] . "</td>";
                            //     echo "<td>" . $res['email'] . "</td>";
                            //     echo "<td>" . $res['Btype'] . "</td>";
                            //     echo "<td>" . $res['Bname'] . "</td>";
                            //     echo '<td>
                            //             <a href="vendor/view?' . $res['email'] . '"><img src="../MyCss/images/eye.png" alt=""></a>
                            //             <a href="../vendor/edit?' . $res['email'] . '"><img src="../MyCss/images/cursor.png" alt=""></a>
                            //             <a href="vendor/delete?' . $res['email'] . '"><img src="../MyCss/images/delete.png" alt=""></a>
                            //         </td>';
                            //     echo "</tr>";
                            // }
                            ?>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="">
                                    <nav aria-label="" class="d-flex justify-content-center">
                                        <ul class="pagination">
                                            <?php
                                            // $total_pages = $data1->num_rows;
                                            // $total_pages = ceil($total_pages / 5);
                                            // if (isset($_GET['sort'])) {
                                            //     $sort = $_GET['sort'];
                                            //     for ($i = 1; $i <= $total_pages; $i++) {
                                            //         echo "<li class='page-item'><a class='page-link' href='vendor.php?sort=$sort&page=" . $i . "'>" . $i . "</a></li>";
                                            //     }
                                            // } else {
                                            //     for ($i = 1; $i <= $total_pages; $i++) {
                                            //         echo "<li class='page-item'><a class='page-link' href='vendor.php?page=" . $i . "'>" . $i . "</a></li>";
                                            //     }
                                            // }
                                            ?>
                                        </ul>
                                        <ul class="pagination ps-4">
                                            <li class='page-item page-link'>
                                                <?php
                                                // $count = $page * 5;
                                                // if (isset($searchQuery)) {
                                                //     $count = $searchQuery->num_rows;
                                                // } else if ($count > $data1->num_rows) {
                                                //     $count = $data1->num_rows;
                                                // }
                                                // echo $count . " / " . $data1->num_rows
                                                ?>
                                            </li>
                                        </ul>
                                    </nav>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'partials/endSideNav.php';
?>

<div class="modal  fade" id="AddVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div id="xcvb" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="col-12  position-relative">
                <div class="card-body">
                    <h2 class=" text-uppercase text-center mb-3 mt-2">Add New Vendor<img width="40" height="40" src="https://img.icons8.com/3d-fluency/40/rocket.png" alt="rocket" /></h2>
                    <form id="venForm" class="row g-3" method="post" enctype="multipart/form-data">
                        <!-- Upload profile picture -->
                        <div class="d-flex">
                            <div data-mdb-input-init class="form-outline mb-1 me-1 w-50">
                                <label class="form-label" for="form3Example1cg">First Name *</label>
                                <input type="text" id="form3Example1cg" class="form-control form-control" name="fname" />
                                <span class="text-danger" id='fname'></span>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-1 ms-1 w-50">
                                <label class="form-label" for="form3Example2cg">Last Name *</label>
                                <input type="text" name="lname" id="form3Example2cg" class="form-control form-control" />
                                <span class="text-danger" id='lname'></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div data-mdb-input-init class="form-outline me-1 mb-1 w-50">
                                <label class="form-label" for="form3Example4cg">Email *</label>
                                <input type="email" name="email" id="form3Example4cg" class="form-control form-control" />
                                <span class="text-danger" id='email'></span>
                            </div>

                            <div data-mdb-input-init class="form-outline ms-1 mb-1 w-50">
                                <label class="form-label" for="form3Example4cdg">Phone *</label>
                                <input type="tel" name="phone" id="form3Example4cdg" class="form-control form-control" />
                                <span class="text-danger" id='phone'></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div data-mdb-input-init class="form-outline me-1 mb-1 w-50">
                                <label for="inputCountry" class="form-label">Country *</label>
                                <select id="inputCountry" name="Country" class="form-select">
                                    <option value="Choose..." selected>Choose...</option>
                                    <?php
                                    foreach ($countries as $country) {
                                        echo "<option value=\"$country[0]\">$country[1]</option>";
                                    }
                                    ?>
                                </select>
                                <span class="text-danger" id="Country"></span>
                            </div>
                            <div data-mdb-input-init class="form-outline ms-1 mb-1 w-50">
                                <label for="inputState" class="form-label">State *</label>
                                <select id="inputState" name="state" class="form-select">

                                </select>
                                <span class="text-danger" id="state"></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div data-mdb-input-init class="form-outline me-1 mb-1 w-50">
                                <label class="form-label" for="inputCity">City *</label>
                                <select id="inputCity" name="City" class="form-select">
                                </select>
                                <span class="text-danger" id='city'></span>
                            </div>
                            <div data-mdb-input-init class="form-outline ms-1 mb-1 w-50">
                                <label for="inputZip" class="form-label">Zip *</label>
                                <input type="text" name="zip" class="form-control" id="inputZip">
                                <span class="text-danger" id='zip'></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div data-mdb-input-init class="form-outline me-1 mb-1 w-50">
                                <label for="inputBT" class="form-label">Business Type *</label>
                                <select id="inputBT" name="businessT" class="form-select">
                                    <option value="Choose..." selected>Choose...</option>
                                    <?php
                                    $Btypes = [
                                        "Startups",
                                        "Franchises",
                                        "Microenterprise", "Small and Medium-sized Enterprises", "Family-Owned Businesses"
                                    ];

                                    foreach ($Btypes as $type) {
                                        echo "<option value=\"$type\">$type</option>";
                                    }
                                    ?>
                                </select>
                                <span class="text-danger" id="businessT"></span>
                            </div>
                            <div data-mdb-input-init class="form-outline ms-1 mb-1 w-50">
                                <label class="form-label" for="form3Example">Business Name *</label>
                                <input type="text" name="Bname" id="form3Example" class="form-control form-control" />
                                <span class="text-danger" id="Bname"></span>
                            </div>
                        </div>
                        <!-- Submit button -->
                        <div class="mt-4 mb-8 d-flex justify-content-around">
                            <button name='vendorAdd' onclick="addVendor()" type="button" class="btn btn-secondary">Add Vendor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'partials/footer.php';
?>