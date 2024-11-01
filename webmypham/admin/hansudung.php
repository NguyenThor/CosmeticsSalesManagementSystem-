<?php
       include 'inc/header.php';
       ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <link rel="stylesheet" href="tonkho.css">

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- Noi dung -->

                    <div class="row mb-3"></div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row float-left" style="font-size: 20px;">
                                    <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                              <li class="breadcrumb-item"><a class="text-primary" href="Dashboard.html">Dashboard</a></li>
                                              <li class="breadcrumb-item active" aria-current="page">Quản lý hạn sử dụng</li>
        
                                              <!-- Combobox tồn kho -->
                                              <form action="#" method="POST">
                                                    <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" style="margin-left: 319px;
                                                }">
                                                    <input type="submit" value="Tìm kiếm">
                                                </form>
                                                
                                                    </ol>
                                                </nav>
                                            </div>
                        <!-- <div class="table table-reponsive"> -->
                            <div class="card-body">
                                <!-- <div class="row mb-5">
                                    <div class="col-3 ml-3">
                                       
                                            <label><strong>Ngày bắt đầu</strong></label>
                                            <input class="form-control" type="date" value="Chọn ngày">
                                   
                                    </div>
                                    <div class="col-3 ml-3">
                                            <label><strong>Ngày kết thúc</strong></label>
                                            <input class="form-control" type="date" name="">
                                    </div>
                                    <div class="col-2 mt-4 ml-3">
                                        <button class="btn btn-info border-dark">Thống kê</button>
                                    </div>
                                </div> -->
                                <div class="row table-responsive mx-auto" style="font-size: 16px">
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Mã nhập</th>
                                                <th scope="col">Loại SP</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">NCC</th>
                                                <th scope="col">Ngày nhập</th>
                                                <th scope="col">Ngày SX</th>
                                                <th scope="col">Ngày HH</th>
                                                <th scope="col">Trạng thái</th>                                                      
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>1</td>
                                                <td>Son môi</td>
                                                <td>Son bình dương</td>
                                                <td>CTY TNHH Đông Anh</td>
                                                <td>20/01/2023</td>
                                                <td>20/12/2022</td>
                                                <td>20/12/2023</td>
                                                <td style="color: rgb(255, 0, 0);">Sắp hết hạn</td>
                                            </tr>
                                            </tbody>
                                            <tbody>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>2</td>
                                                <td>Dầu gội</td>
                                                <td>Dầu gội ELASTINE</td>
                                                <td>CTY TNHH Hải Âu</td>
                                                <td>20/01/2023</td>
                                                <td>20/12/2022</td>
                                                <td>20/12/2025</td>
                                                <td style="color: blue;">Còn hạn</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                             Copyright © 2019 Team 01. All rights reserved.
                        </div>
                    </div>
                    
                </div>
            </div> -->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script src="Scripts/jquery-1.10.2.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <!-- jquery 3.3.1 -->
    <script src="Content/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="Content/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="Content/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="Content/assets/libs/js/main-js.js"></script>

    <!-- sparkline js -->
    <script src="Content/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="Content/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <!-- chart c3 js -->
    <script src="Content/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="Content/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="Content/assets/vendor/charts/c3charts/C3chartjs.js"></script>

</body>

</html>