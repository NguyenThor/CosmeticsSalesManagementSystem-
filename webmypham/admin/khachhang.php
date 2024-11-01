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
                                        <li class="breadcrumb-item active" aria-current="page">Quản lý khách hàng</li>
                                    </ol>
                                </nav>
                            </div>
                            
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
            $sql = " SELECT * FROM khachhang";
                
               
			$result = mysqli_query($conn, $sql);

			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'KH_MA' => $row['KH_MA'],
                'KH_TEN' => $row['KH_TEN'],
                'KH_SDT' => $row['KH_SDT'],
                'KH_EMAIL' => $row['KH_EMAIL'],
                'KH_DIACHI' => $row['KH_DIACHI'],
                'KH_MATKHAU' => $row['KH_MATKHAU'],
                

            );
            $rowNum++;
        }


            ?>
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">SDT</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Địa Chỉ</th>
                                            <th scope="col">Mật Khẩu</th>
                                           
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $row) : ?>
                                        <td><?php echo $row['rowNum']; ?></td>
                    <td id="kh_ten"><?php echo $row['KH_MA']; ?></td>
                        <td><?php echo $row['KH_TEN']; ?></td>
                        <td><?php echo $row['KH_SDT']; ?></td>
                        <td><?php echo $row['KH_EMAIL']; ?></td>
						<td><?php echo $row['KH_DIACHI']; ?></td>
                        <td><?php echo $row['KH_MATKHAU']; ?></td>
                     <td>
                     <span data-toggle="modal" >
                                                    <a href="khachhangsua.php?KH_MA=<?php echo $row['KH_MA']; ?>" class="text-success" data-toggle="tooltip"
                                                        data-placement="left" data-html="true" title="Sửa"><i
                                                            class="fa fa-edit fa-lg"></i></a>
                    <span data-toggle="modal">
                                                    <a href="khachhangxoa.php?KH_MA=<?php echo $row['KH_MA']; ?>" class="text-danger ml-3" data-toggle="tooltip"
                                                        data-placement="right" data-html="true" title="Xóa"><i
                                                            class="fa fa-trash-alt fa-lg"></i></a>
                                                </span> 
                                                </td>                          
                                             
                                                
                                             </tr>
                                                    
                                                    <!-- Modal sửa -->
                                                    <?php endforeach; ?>

                                                  
                                                          <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                                         aria-labelledby="editModalLabel" aria-hidden="true">
                                                                                                        <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="editModalLabel">Sửa Tài Khoản</h3>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                              
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Họ và Tên<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" class="form-control" value="<?php echo $row1['KH_TEN'];?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Email<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" class="form-control" value="<?php echo $row['KH_EMAIL']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Số điện thoại<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" class="form-control" value="<?php echo $row['KH_SDT']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Địa chỉ<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" class="form-control" value="<?php echo $row['KH_DIACHI']; ?>">
                                                                        </div>
                                                                      
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Mật khẩu<span class="text-danger"> (*)</span></label>
                                                                            <input type="password" class="form-control" value="<?php echo $row['KH_MATKHAU']; ?>"/>
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

                                                <!-- End modal sửa -->

                                                
                                            
                                             
                                                 

                                    </tbody>
                                    </table>
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