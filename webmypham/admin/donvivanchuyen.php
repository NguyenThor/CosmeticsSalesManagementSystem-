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
                                        <li class="breadcrumb-item active" aria-current="page">Quản lý vị vận chuyển</li>
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
                                                <h2 class="modal-title" id="addModalLabel">Thêm Đơn vị vận chuyển</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>

<div class="modal-body">
<form action="donvivanchuyen_them.php" method="post">
            <div class="row">
                <div class="form-group col-6">
                    <label
                        class="col-form-label font-weight-bold">Tên đơn vị<span class="text-danger"> (*)</span></label>
                    <input type="text" id="dv_ma" name="dv_ma" class="form-control" value="">
                </div>
                <div class="form-group col-6">
                    <label
                        class="col-form-label font-weight-bold">Hãng vận chuyển<span class="text-danger"> (*)</span></label>
                    <input type="text" id="dv_hangvanchuyen" name="dv_hangvanchuyen" class="form-control" value="">
                </div>
                <div class="form-group col-6">
                    <label
                        class="col-form-label font-weight-bold">Loại dịch vụ<span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" value="" id="dv_loaidichvu" name="dv_loaidichvu">
                    <label
                        class="col-form-label font-weight-bold">Liên hệ<span class="text-danger"> (*)</span></label>
                        <input type="text" class="form-control" id="dv_lienhe" name="dv_lienhe">
                </div>
                <div class="form-group col-6">
                    <label
                        class="col-form-label font-weight-bold">Thời gian<span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" value="" id="dv_thoigian" name="dv_thoigian">
                    <label
                        class="col-form-label font-weight-bold">Tuyến vận chuyển<span class="text-danger"> (*)</span></label>
                        <input type="text" class="form-control" id="dv_tuyenvanchuyen" name="dv_tuyenvanchuyen">
                    </div>
                </div>
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
            $sql = " SELECT * FROM donvivanchuyen";
                
               
			$result = mysqli_query($conn, $sql);

			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'DV_MA' => $row['DV_MA'],
                'DV_HANGVANCHUYEN' => $row['DV_HANGVANCHUYEN'],
                'DV_LOAIDICHVU' => $row['DV_LOAIDICHVU'],
                'DV_THOIGIAN' => $row['DV_THOIGIAN'],
                'DV_TUYENVANCHUYEN' => $row['DV_TUYENVANCHUYEN'],
                'DV_LIENHE' => $row['DV_LIENHE'],
            );
            $rowNum++;
        }


            ?>

        <div class="modal-footer">
        <input type="submit" value="Thêm" name="bntAdd"  class="btn btn-success"> 
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button></div>
</form>
</div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="table table-reponsive"> -->
                        <div class="card-body">
                            <div class="row table-responsive mx-auto" style="font-size: 16px">
                            
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">STT</th>
                                            
                                            <th scope="col">Mã Đơn Vị</th>
                                            <th scope="col">Hãng Vận Chuyển</th>
                                            <th scope="col">Loại Dịch Vụ</th>
                                            <th scope="col">Thời Gian</th>
                                            <th scope="col">Tuyến Vận Chuyển</th>
                                            <th scope="col">Liên hệ</th>
                                            <th scope="col">Tra Cứu Phí</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        
                                    <?php foreach ($data as $row) : ?>
                    <tr>
                    <td><?php echo $row['rowNum']; ?></td>
                    <td><?php echo $row['DV_MA']; ?></td>
                    <td><img  src="../image/dv_vanchuyen/<?php echo $row['DV_HANGVANCHUYEN']; ?>" width="100" height="100"></td>
                        <td><?php echo $row['DV_LOAIDICHVU']; ?></td>
                        <td><?php echo $row['DV_THOIGIAN']; ?></td>
                        <td><?php echo $row['DV_TUYENVANCHUYEN']; ?></td>
                        <td><?php echo $row['DV_LIENHE']; ?></td>
                        <!-- <td><?php echo $row['DV_TRACUU']; ?></td> -->
                        <td>
                        <span data-toggle="modal" data-target="#detailModal">
                                                    <a href="#" class="text-dark" data-toggle="tooltip" data-html="true"
                                                        data-placement="left" title="Tra cứu"><i
                                                        class="fas fa-file"></i></a>
                                    </td>
                                    <td>

                        <!-- <span data-toggle="modal" data-target="#detailModal">
                                                    <a href="#" class="text-dark" data-toggle="tooltip" data-html="true"
                                                        data-placement="left" title="Chi tiết"><i
                                                            class="fas fa-eye fa-lg"></i> </a> -->
                        <span data-toggle="modal" >
                                                    <a href="donvivanchuyen_sua.php?DV_MA=<?php echo $row['DV_MA']; ?>" class="text-success" data-toggle="tooltip"
                                                        data-placement="left" data-html="true" title="Sửa"><i
                                                            class="fa fa-edit fa-lg"></i></a></span>
                    <span data-toggle="modal">
                                                    <a href="donvivanchuyen_xoa.php?DV_MA=<?php echo $row['DV_MA']; ?>" class="text-danger ml-3" data-toggle="tooltip"
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
        </div>
    </div>
   

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