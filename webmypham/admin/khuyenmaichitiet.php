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
            $KM_MA = $_GET['KM_MA'];
            $sql = " SELECT * FROM chitietkhuyenmai a , sanpham b , khuyenmai c
            WHERE a.SP_MA = b.SP_MA 
            AND a.KM_MA = c.KM_MA
            AND a.KM_MA='".$KM_MA."'";
                
               
			$result = mysqli_query($conn, $sql);

			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'ID' => $row['ID'],
                'GIA_KM' => $row['GIA_KM'],
                'KM_MA' => $row['KM_MA'],
                'KM_NGAYBD' => $row['KM_NGAYBD'],
                'KM_NGAYKT' => $row['KM_NGAYKT'],
               
                

            );
            $rowNum++;
        }


            ?>
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
                                                <h2 class="modal-title" id="addModalLabel">Thêm Sản Phẩm Khuyến Mãi</h3>
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
                    <input type="text" id="KM_MA" name="KM_MA" class="form-control" value="<?php echo $row['KM_MA']; ?>">
                </div>
               
                <div class="form-group col-6">
                <label for="sp_ma" class="col-form-label font-weight-bold">SẢN PHẨM <span class="text-danger"> (*)</span></label>
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
            $sqlSP = "select * from SANPHAM";
            $resultSP = mysqli_query($conn, $sqlSP);
            while ($rowSP = mysqli_fetch_array($resultSP, MYSQLI_ASSOC)) {
				$dataSP[] = array(
                'SP_MA' => $rowSP['SP_MA'],
                'SP_TEN' => $rowSP['SP_TEN'],
                );

            }
            ?>
                
            <select name="SP_MA" id="SP_MA" class="form-control">
                        <option value="">CHỌN SẢN PHẨM</option>
              <?php foreach ($dataSP as $rowSP) : ?>
            
                    <option value="<?php echo $rowSP['SP_MA'];?>"><?php echo $rowSP['SP_TEN']; ?></option>
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
                                            
                                            <th scope="col">TÊN SẢN PHẨM</th>
                                            <th scope="col">GIÁ TRỊ %</th>
                                            <th scope="col">Giảm Còn</th>
                                           
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        
                                    <?php foreach ($data as $row) : ?>
                    <tr>
                    <td><?php echo $row['rowNum']; ?></td>
                    <td><?php echo $row['SP_TEN']; ?></td>
                        <td><?php echo $row['KM_GIATRI']; ?></td>
                        <td><?php echo $row['GIAKM']; ?></td>
                        
                       
                        <td>
                       
                    <span data-toggle="modal">
                                                    <a href="khuyenmaixoa.php?KM_MA=<?php echo $row['KM_MA']; ?>" class="text-danger ml-3" data-toggle="tooltip"
                                                        data-placement="right" data-html="true" title="Xóa"><i
                                                            class="fa fa-trash-alt fa-lg"></i></a>
                                                </span> 
                                                </td>    
                                                <td>
                                                <a href="khuyenmaichitiet.php?KM_MA=<?php echo $row['KM_MA']; ?>">
                                                <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Chi Tiết</button>
                                            </a>
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