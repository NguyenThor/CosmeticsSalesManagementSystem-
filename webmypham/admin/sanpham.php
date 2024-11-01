
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
                                        <li class="breadcrumb-item"><a class="text-primary"
                                                href="Dashboard.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm
                                           </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row float-right bg-success mr-3 mt-2">
                                <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                                        class="fa fa-plus"></i> Thêm</button>

                                <!-- Modal thêm -->

                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                    aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="addModalLabel">Thêm sản phẩm</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <form  action="sanphamthem.php" method="post">
                                                    <div class="row">
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Chọn ảnh<span class="text-danger"> (*)</span></label>
                                                            <input type="file" class="form-control" name="sp_hinh" id="sp_hinh" required>
                                                        </div>
                                                       
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Tên sản phẩm<span class="text-danger"> (*)</span></label>
                                                            <input type="text" class="form-control" id="sp_ten" name="sp_ten">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Công dụng</label>
                                                            <input type="text" class="form-control" id="sp_congdung" name="sp_congdung">
                                                                
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Thành phần</label>
                                                            <input type="text" class="form-control" id="sp_thanhphan" name="sp_thanhphan ">
                                                                
                                                        </div>
                                                    </div> <div class="row">
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Ngày sản xuất<span class="text-danger"> (*)</span></label>
                                                            <input type="date" class="form-control" name="sp_nsx" id="sp_nsx" required>
                                                        </div>
                                                       
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Hạn sử dụng<span class="text-danger"> (*)</span></label>
                                                            <input type="date" class="form-control" id="sp_hsd" name="sp_hsd">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row">
                                
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Giá bán<span class="text-danger"> (*)</span></label>
                                                            <input type="text" class="form-control" id="sp_giaban" name="sp_giaban">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Trọng lượng</label>
                                                            <input type="text" class="form-control" id="sp_trongluong" name="sp_trongluong">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Đơn vị tính</label>
                                                            <select class="form-control" id="sp_dvt" name="sp_dvt">
                                                                    <option>Tuýt</option>  
                                                                    <option>Chai</option> 
                                                                    <option>Set</option> 
                                                                    <option>Lọ</option> 
                                                                    <option>Miếng</option>  
                                                                    <option>Thỏi</option>  
                                                                    <option>Hộp</option>                                                                                  
                                                                </select>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label
                                                                class="col-form-label font-weight-bold">Số lượng tồn<span class="text-danger"> (*)</span></label>
                                                            <input type="text" class="form-control" id="sp_soluongton" name="sp_soluongton">
                                                                
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Loại hàng<span class="text-danger"> (*)</span></label>
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
                                                    $sql = "select * from loaihang";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                        $data[] = array(
                                                        'L_MA' => $row['L_MA'],
                                                        'L_TEN' => $row['L_TEN'],
                                                        );

                                                    }
                                                    ?>
                                                        
                                                    <select name="l_ma" id="l_ma" class="form-control">
                                                                <option value="">Chọn Loại Hàng</option>
                                                    <?php foreach ($data as $row) : ?>
                                                    
                                                            <option value="<?php echo $row['L_MA'];?>"><?php echo $row['L_TEN']; ?></option>
                                                            <?php endforeach; ?>
                                                                </select>
                                                                                                </div>
                                                        <div class="form-group col-6">
                                                            <label class="col-form-label font-weight-bold">Thương hiệu<span class="text-danger"> (*)</span></label>
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
                                                    $sql2 = "select * from THUONGHIEU";
                                                    $result2 = mysqli_query($conn, $sql2);
                                                    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                                                        $data2[] = array(
                                                        'TH_MA' => $row2['TH_MA'],
                                                        'TH_TEN' => $row2['TH_TEN'],
                                                        );

                                                    }
                                                    ?>
                                                        
                                                    <select name="th_ma" id="th_ma" class="form-control">
                                                                <option value="">Chọn Thương Hiệu</option>
                                                    <?php foreach ($data2 as $row2) : ?>
                                                    
                                                            <option value="<?php echo $row2['TH_MA'];?>"><?php echo $row2['TH_TEN']; ?></option>
                                                            <?php endforeach; ?>
                                                                </select>
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
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">STT</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Mã sản phẩm</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            
                                            <th scope="col">Giá bán</th>
                                            <th scope="col">Trọng lượng</th>
                                            <th scope="col">Đơn vị tính</th>
                                            <th scope="col">Số lượng tồn</th>
                                            <th scope="col">Số lượng đã bán</th>
                                            <th scope="col">Thương hiệu</th>
                                            <th scope="col">Loại hàng</th>
                                            <th scope="col">Ngày sản xuất</th>
                                            <th scope="col">Ngày hết hạn</th>
                                      
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
            $sql = " SELECT * FROM sanpham a , loaihang b, thuonghieu c
            WHERE a.L_MA = b.L_MA
            AND a.TH_MA=c.TH_MA";
                
               
			$result = mysqli_query($conn, $sql);

			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'SP_MA' => $row['SP_MA'],
                'SP_TEN' => $row['SP_TEN'],
                'SP_HINH' => $row['SP_HINH'],
                'SP_CONGDUNG' => $row['SP_CONGDUNG'],
                'SP_THANHPHAN' => $row['SP_THANHPHAN'],
                'SP_NSX' => $row['SP_NSX'],
                'SP_HSD' => $row['SP_HSD'],
                'SP_TRONGLUONG' => $row['SP_TRONGLUONG'],
                'SP_DVT' => $row['SP_DVT'],
                'SP_GIABAN' => $row['SP_GIABAN'],
                'SP_SOLUONGTON' => $row['SP_SOLUONGTON'],
                'SP_SOLUONGDABAN' => $row['SP_SOLUONGDABAN'],
                'TH_TEN' => $row['TH_TEN'],
                'L_TEN' => $row['L_TEN'],

            );
            $rowNum++;
        }


            ?>
                                         <?php foreach ($data as $row) : ?>
                                        <tr>
                                            <td scope="row"><?php echo $row['rowNum']; ?></td>
                                            <td><img  src="../image/addsp/<?php echo $row['SP_HINH']; ?>" width="100" height="100"></td>

                                            <td><?php echo $row['SP_MA']; ?></td>
                                            <td><?php echo $row['SP_TEN']; ?></td>
                                           
                                            <td><?php echo $row['SP_GIABAN']; ?></td>
                                            <td><?php echo $row['SP_TRONGLUONG']; ?></td>
                                            <td><?php echo $row['SP_DVT']; ?></td>
                                            <td><?php echo $row['SP_SOLUONGTON']; ?></td>
                                            <td><?php echo $row['SP_SOLUONGDABAN']; ?></td>
                                            <td><?php echo $row['TH_TEN']; ?></td>
                                            <td><?php echo $row['L_TEN']; ?></td>
                                            <td><?php echo $row['SP_NSX']; ?></td>
                                            <td><?php echo $row['SP_HSD']; ?></td>
                                            <td>
                                                 <span data-toggle="modal" >
                                                    <a href="sanphamsua.php?SP_MA=<?php echo $row['SP_MA']; ?>" class="text-success" data-toggle="tooltip"
                                                        data-placement="left" data-html="true" title="Sửa"><i
                                                            class="fa fa-edit fa-lg"></i></a></span>
                                                <span data-toggle="modal">
                                                    <a href="sanphamxoa.php?SP_MA=<?php echo $row['SP_MA']; ?>" class="text-danger ml-3" data-toggle="tooltip"
                                                        data-placement="right" data-html="true" title="Xóa"><i
                                                            class="fa fa-trash-alt fa-lg"></i></a>
                                                </span> 
                                                </td>      
                                                
                                               
                                                <?php endforeach; ?>



                                                           
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