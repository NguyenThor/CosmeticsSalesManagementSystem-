<?php
    include '../lib/session.php';
   /// Session::checkSession();
?>
<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Content/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="Content/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="Content/assets/libs/css/style.css">
    <link rel="stylesheet" href="Content/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="Content/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="Content/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet"
        href="Content/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="Content/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="Content/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Page Admin - TEAM 01</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="Dashboard.php">ADMIN PAGE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        <li class="nav-item text-center">
                            <div id="custom-search" class="top-search-bar">
                                <h5>    <i class="fa fa-user" aria-hidden="true"></i>  Admin</h5>
                            </div>
                        </li>
                        <?php
                            // if(isset($_GET['action'])&& $_GET['action']=='logout'){
                            //     Session::destroy();
                                
                            // }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php"><i class="fa fa-power-off"></i> Đăng xuất</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- <a class="d-xl-none d-lg-none" href="Dashboard.html">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Quản trị
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php"><i class="fas fa-home"
                                        aria-hidden="true"></i>Dashboard</a>
                            </li>
                            
                            <li class="nav-item ">
                                <a class="nav-link " href="sanpham.php"><i class="fa fa-list" aria-hidden="true"></i>Quản lý sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="khachhang.php"><i class="fa fa-address-card" aria-hidden="true"></i>Quản lý khách hàng</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="donhang.php"><i class="fa fa-fw fa-rocket"></i>Quản lý đơn hàng</a>

                            </li>
                            
                            
                            <li class="nav-item">
                                <a class="nav-link" href="khuyenmai.php"><i class="fa fa-bullhorn" aria-hidden="true"></i>Quản lý khuyến mãi</a>

                            </li>
                           
                            <li class="nav-item">

                                <a class="nav-link" href="posts.php"><i class="far fa-file"></i>Quản lý bài
                                    viết</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-1-2" aria-controls="submenu-1-2"><i
                                        class="far fa-calendar-minus"></i>Quản lý thống kê</a>
                                <div id="submenu-1-2" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="thongkeDoanhThu.php">Thống kê doanh thu</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="thongkeDonHang.php">Thống kê đơn hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="thongkeTonKho.php">Thống kê tồn kho</a>
                                        </li>

                                    </ul>
                                </div>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-2-2" aria-controls="submenu-2-2"><i
                                        class="far fa-calendar-minus"></i>Danh mục sản phẩm</a>
                                <div id="submenu-2-2" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="loaihang.php">Loại hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="thuonghieu.php">Thương hiệu</a>
                                        </li>
                                        

                                    </ul>
                                </div>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="nhanvien.php"><i class="fa fa-fw fa-rocket"></i>Quản lý nhân viên</a>

                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>