<?php
       include 'inc/header.php';
       ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
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
                                        <li class="breadcrumb-item active" aria-current="page">Quản lý đơn hàng</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row float-right bg-success mr-3 mt-2">
                                <button class="btn btn-success" data-toggle="modal" data-target="#addModal"></i> Tìm kiếm</button>

                                <!-- Modal thêm -->

                                <!-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                    aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="addModalLabel">Thêm Thông Tin Khu Trọ</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label class="col-form-label font-weight-bold">Mã khu
                                                            trọ:</label>
                                                        <input type="text" class="form-control">
                                                    </div> 
                                                    <div class="form-group">
                                                        <label class="col-form-label font-weight-bold">Tên khu
                                                            trọ<span class="text-danger"> (*)</span></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label font-weight-bold">Địa chỉ<span class="text-danger"> (*)</span></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label font-weight-bold">Số điện
                                                            thoại<span class="text-danger"> (*)</span></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Đóng</button>
                                                <button type="button" class="btn btn-success">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- End modal thêm -->

                            </div>
                            <!-- Search bar -->

                            <div class="navbar-nav col-3 float-right">
                                <div id="custom-search" class="top-search-bar">
                                    <input class="form-control" type="text" placeholder="Search..">

                                </div>
                            </div>

                            <!-- End search bar -->
                        </div>
                        <!-- <div class="table table-reponsive"> -->
                        <div class="card-body">
                            <div class="row table-responsive mx-auto" style="font-size: 16px">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Mã đơn hàng</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Ngày đặt</th>
                                            <th scope="col">Tổng tiền hàng</th>
                                            <th scope="col">Tiền vận chuyển</th>
                                            <th scope="col">Tổng thanh toán</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>M01</td>
                                            <td>Son Bình Dương</td>
                                            <td>20/12/2023</td>
                                            <td>20000</td>
                                            <td>150</td>
                                            <td>2000000</td>
                                            <td>Đang xử lý</td>
                                            <td>
                                               <span data-toggle="modal" data-target="#detailModal">
                                                    <a href="#" class="text-dark" data-toggle="tooltip" data-html="true"
                                                        data-placement="left" title="Chi tiết"><i
                                                            class="fas fa-eye fa-lg"></i> </a>
                                                </span> 
                                                <span data-toggle="modal" data-target="#editModal">
                                                    <a href="#" class="text-success" data-toggle="tooltip"
                                                        data-placement="left" data-html="true" title="Sửa"><i
                                                            class="fa fa-edit fa-lg"></i></a>
                                                </span>
                                                <span data-toggle="modal" data-target="#deleteModal">
                                                    <a href="#" class="text-danger ml-3" data-toggle="tooltip"
                                                        data-placement="right" data-html="true" title="Xóa"><i
                                                            class="fa fa-trash-alt fa-lg"></i></a>
                                                </span>
                                                  <!-- Modal chi tiết -->

                                                 <div class="modal fade" id="detailModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="detailModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="detailModalLabel">Thông
                                                                    Tin Chi Tiết Đơn hàng</h3>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="row">
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Mã:</label>
                                                                            <input type="text" class="form-control"
                                                                                value="1624801040032" disabled>
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Tỉnh/Thành Phố</label>
                                                                            <input type="text" class="form-control"
                                                                                id="tensv-name" value="Nguyễn Văn A"
                                                                                disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Số
                                                                                điện thoại:</label>
                                                                            <input type="text" class="form-control"
                                                                                value="09090609" disabled>
                                                                        </div>
                                                                        
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Quận/Huyện</label>
                                                                            <input type="text" class="form-control"
                                                                                disabled>
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Tên khách hàng</label>
                                                                            <input type="text" class="form-control"
                                                                                disabled>
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Phường/Xã</label>
                                                                            <input type="text" class="form-control"
                                                                                disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Email:</label>
                                                                            <input type="text" class="form-control"
                                                                                value="abc@gmail.com" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Loại hàng</label>
                                                                            <input type="text" class="form-control"
                                                                                id="#" value="D16HT01"
                                                                                disabled>
                                                                        </div>
                                                                     
                                                                    </div>






                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Đóng</button>
                                                                <button type="button"
                                                                    class="btn btn-success">Thêm</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <!-- End modal chi tiết -->

                                                <!-- Modal sửa -->

                                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="editModalLabel">Cập nhật tình trạng</h3>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-form-label font-weight-bold">Mã đơn hàng:</label>
                                                                        <input type="text" class="form-control" disabled>
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label class="col-form-label font-weight-bold">Trạng thái<span class="text-danger"> (*)</span></label>
                                                                        <select class="form-control">
                                                                            <option>Đang giao</option>
                                                                            <option>Đang xử lý</option>
                                                                            <option>Đã hủy</option>
                                                                            <option>Đã nhận</option>                                        
                                                                        </select>
                                                                    </div>
                                                                    <!-- <div class="form-group">
                                                                        <label
                                                                            class="col-form-label font-weight-bold">Chủ trọ:</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-form-label font-weight-bold">Địa chỉ nhận hàng:</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-form-label font-weight-bold">Số điện thoại:</label>
                                                                        <input type="text" class="form-control">
                                                                    </div> -->
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Đóng</button>
                                                                <button type="button"
                                                                    class="btn btn-success">Cập nhật</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End modal sửa -->

                                                <!-- Modal xóa -->

                                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="deleteModalLabel">Xóa đơn hàng</h3>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger float-left"
                                                                    data-dismiss="modal">Hủy</button>
                                                                <button type="button" class="btn btn-dark">Xóa</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End modal xóa -->
                                            </td>
                                     
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
    <!-- chart chartist js -->
    <script src="Content/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="Content/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="Content/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="Content/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="Content/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="Content/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="Content/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="Content/assets/libs/js/dashboard-ecommerce.js"></script>

</body>

</html>