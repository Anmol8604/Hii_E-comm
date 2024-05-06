<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <img width="50px" src="https://assets.bootstrapemail.com/logos/light/square.png" alt="">
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-1">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item  <?php echo $heading == "Dashboard" ? 'active' : ""  ?> ">
            <a class="nav-link text-black-50" href="/Admin/home">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                    <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293z" />
                </svg>
                <span>Dashboard</span></a>
        </li>
        <!-- Heading -->
        <div class="sidebar-heading text-black-50">
            Pages
        </div>

        <li class="nav-item  <?php echo $heading == "Vendors" ? 'active' : ""  ?> ">
            <a class="nav-link pb-0 text-black-50 collapsed" href="/Admin/vendor">
                <img style="width: 20px; height: 20px; " src="/View/assests/SVG/vendors.svg" alt="">
                <span>Vendors</span>
            </a>
        </li>

        <li class="nav-item  <?php echo $heading == "Products" ? 'active' : ""  ?> ">
            <a class="nav-link pb-0 text-black-50 collapsed" href="">
                <img style="width: 20px; height: 20px; " src="/View/assests/SVG/products.svg" alt="">
                <span>Products</span>
            </a>
        </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?= $name ?>
                            </span>
                            <?php if ($role == 1){
                                echo '<img class="img-profile rounded-circle" src="/View/assests/images/'. $image .'" alt="">';
                            }
                            ?>

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in " aria-labelledby="userDropdown">
                            <a id='uP' class="dropdown-item" href="/Admin/profile">
                                <img style="width: 20px;" src="/View/assests/SVG/profile.svg" alt="">
                                View Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <img style="width: 20px;" src="/View/assests/SVG/logout.svg" alt="">
                                Logout
                            </button>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid px-4 py-1">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"> <?= $heading ?> </h1>
                </div>