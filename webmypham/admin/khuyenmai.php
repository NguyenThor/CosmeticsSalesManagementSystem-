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
                                        <li class="breadcrumb-item active" aria-current="page">Quản lý khuyến mãi</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row float-right bg-success mr-3 mt-2">
                                <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                                        class="fa fa-plus"></i> Thêm</button>

                                <!-- Modal thêm -->

                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                    aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="addModalLabel">Thêm Khuyến Mãi</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>

<div class="modal-body">
<form action="khuyenmaithem.php" method="post">
            <div class="row">
                <div class="form-group col-6">
                    <label
                        class="col-form-label font-weight-bold">MÃ KHUYẾN MÃI<span class="text-danger"> (*)</span></label>
                    <input type="text" id="KM_MA" name="KM_MA" class="form-control" value="">
                </div>
                <div class="form-group col-6">
                    <label class="col-form-label font-weight-bold">Chọn ảnh<span class="text-danger"> (*)</span></label>
                    <input type="file" class="form-control" name="KM_HINH" id="KM_HINH" required>
                </div>
                <div class="form-group col-6">
                    <label
                        class="col-form-label font-weight-bold">TÊN KHUYẾN MÃI<span class="text-danger"> (*)</span></label>
                    <input type="text" id="KM_TEN" name="KM_TEN" class="form-control" value="">
                </div>
                
                
               
                <div class="form-group col-6">
                    <label
                        class="col-form-label font-weight-bold">NGÀY BẮT ĐẦU<span class="text-danger"> (*)</span></label>
                    <input type="date" class="form-control" value="" id="KM_NGAYBD" name="KM_NGAYBD">
                </div>
                <div class="form-group col-6">
                    <label
                        class="col-form-label font-weight-bold">NGÀY KẾT THÚC<span class="text-danger"> (*)</span></label>
                    <input type="date" class="form-control" value="" id="KM_NGAYKT" name="KM_NGAYKT">
                </div>
                <div class="form-group col-6">
                    <label
                        class="col-form-label font-weight-bold">GIÁ TRỊ %<span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" value="" id="KM_GIATRI" name="KM_GIATRI">
                </div>
        <div class="modal-footer">
        <input type="submit" value="Thêm" name="bntAdd"  class="btn btn-success"> </div>
        
    </div>  
</form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Đóng</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- End modal thêm -->

                            </div>

                            <!-- Search bar -->

                            <!-- <div class="navbar-nav col-3 float-right">                               
                                        <div id="custom-search" class="top-search-bar">
                                            <input class="form-control" type="text" placeholder="Search..">
                                        
                                        </div>                                                                     
                            </div> -->

                            <!-- End search bar -->

                        </div>
                        <!-- <div class="table table-reponsive"> -->
                        <div class="card-body">
                            <div class="row table-responsive mx-auto" style="font-size: 16px">
                            <?php
            $servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "mypham";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
            $sql = " SELECT * FROM khuyenmai";
                
               
			$result = mysqli_query($conn, $sql);

			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'KM_MA' => $row['KM_MA'],
                'KM_TEN' => $row['KM_TEN'],
                'KM_HINH' => $row['KM_HINH'],
                'KM_GIATRI' => $row['KM_GIATRI'],
                'KM_NGAYBD' => $row['KM_NGAYBD'],
                'KM_NGAYKT' => $row['KM_NGAYKT'],
               
                

            );
            $rowNum++;
        }


            ?>
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">STT</th>
                                            
                                            <th scope="col">Mã Khuyến Mãi</th>
                                            <th scope="col">Tên Khuyến Mãi</th>
                                            <th scope="col">Hình Khuyến Mãi</th>
                                            <th scope="col">Giá Trị %</th>
                                            <th scope="col">Ngày Bắt Đầu</th>
                                            <th scope="col">Ngày Kết Thúc</th>
                                          
                                            <th scope="col">Thao Tác</th>
                                          
                                            
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        
                                    <?php foreach ($data as $row) : ?>
                    <tr>
                    <td><?php echo $row['rowNum']; ?></td>
                    <td><?php echo $row['KM_MA']; ?></td>
                        <td><?php echo $row['KM_TEN']; ?></td>
                        <td><img  src="../image/post/<?php echo $row['KM_HINH']; ?>" width="100" height="100"></td>
                        <td><?php echo $row['KM_GIATRI']; ?></td>
                        <td><?php echo $row['KM_NGAYBD']; ?></td>
                        <td><?php echo $row['KM_NGAYKT']; ?></td>
                       
                        <td>
                        <span data-toggle="modal" >
                                                    <a href="khuyenmaisua.php?KM_MA=<?php echo $row['KM_MA']; ?>" class="text-success" data-toggle="tooltip"
                                                        data-placement="left" data-html="true" title="Sửa"><i
                                                            class="fa fa-edit fa-lg"></i></a></span>
                    <span data-toggle="modal">
                                                    <a href="khuyenmaixoa.php?KM_MA=<?php echo $row['KM_MA']; ?>" class="text-danger ml-3" data-toggle="tooltip"
                                                        data-placement="right" data-html="true" title="Xóa"><i
                                                            class="fa fa-trash-alt fa-lg"></i></a>
                                                </span> 
                                                </td>    
                                                
                                    </tr>

                        <?php endforeach; ?>                                              
                                        
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