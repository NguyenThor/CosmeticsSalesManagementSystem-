<?php
       include 'inc/header.php';
       ?>
       
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
                                        
        
                                              <!-- Combobox tồn kho -->

                                       
                                            
                                                
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
                                                        $sql0 = "select * from TRANGTHAI ";
                                                        $result0 = mysqli_query($conn, $sql0);
                                                        while ($row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC)) {
                                                            $data0[] = array(
                                                            'TT_MA' => $row0['TT_MA'],
                                                            'TT_TEN' => $row0['TT_TEN'],
                                                            );
                                                        }
                                                ?>
                                               
                                                   
                                                
                                              
                                           
                                             
                                      
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-1-3" aria-controls="submenu-1-3"><i
                                        class="far fa-calendar-minus"></i>Trạng thái đơn hàng</a>
                                <div id="submenu-1-3" class="collapse submenu">
                                    <ul class="nav flex-column"> 
                                        <?php foreach ($data0 as $row0) : ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="donhangtrangthai.php?TT_MA=<?php echo $row0['TT_MA']; ?>"><?php echo $row0['TT_TEN']; ?></a>
                                        </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                                
                            </li>          


                                    </ol>
                                </nav>
                            </div>
                            
                              
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
                            $TT_MA=$_GET['TT_MA'];
                            $sql = " SELECT * FROM donhang a, khachhang b,
                       phuongthucthanhtoan d , trangthai e,diachinhanhang f
                                    where a.TT_MA='".$TT_MA."'
                                    AND a.KH_MA=b.KH_MA
                                 
                                    AND a.DCNH_MA =f.DCNH_MA
                                    AND a.PTTT_MA = d.PTTT_MA
                                    AND a.TT_MA=e.TT_MA
                                     ";
                                
                            
                            $result = mysqli_query($conn, $sql);

                            $data = [];
                        $rowNum = 1;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $data[] = array(
                                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                                'DH_MA' => $row['DH_MA'],
                                'DH_NGAYDAT' => $row['DH_NGAYDAT'],
                                'DCNH_DIACHI' => $row['DCNH_DIACHI'],
                                'DH_TONGTHANHTOAN' => $row['DH_TONGTHANHTOAN'],
                                'DCNH_MA' => $row['KH_EMAIL'],
                                'KH_TEN' => $row['KH_TEN'],
                                'DVVC_MA' => $row['DVVC_MA'],
                                'PTTT_MA' => $row['PTTT_MA'],
                                'PTTT_TEN' => $row['PTTT_TEN'],
                                'PTTT_MA' => $row['PTTT_MA'],
                                'TT_TEN' => $row['TT_TEN'],
                                'TT_MA' => $row['TT_MA'],
                            );
                        
                            $rowNum++;
                        }


                            ?>
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Ngày Đặt</th>
                                            <th scope="col">Tổng Tiền</th>
                                       
                                            <th scope="col">Tài Khoản</th>
                                            <th scope="col">Đơn Vị Vận Chuyển</th>
                                            <th scope="col">Phương Thức Vận Chuyển</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $row) : ?>
                                        <td><?php echo $row['rowNum']; ?></td>
                    <td id="kh_ten"><?php echo $row['DH_MA']; ?></td>
                        <td><?php echo $row['DH_NGAYDAT']; ?></td>
                        <td><?php echo $row['DH_TONGTHANHTOAN']; ?></td>
                       
                        <td><?php echo $row['KH_TEN']; ?></td>
						<td><?php echo $row['DVVC_MA']; ?></td>
                        <td><?php echo $row['PTTT_TEN']; ?></td>
                        <td><?php echo $row['TT_TEN']; ?></td>
                     <td>
                     <span data-toggle="modal" data-target="#detailModal">
                                                    <a href="donhangchitiet.php?DH_MA=<?php echo $row['DH_MA']; ?>" class="text-dark" data-toggle="tooltip" data-html="true"
                                                        data-placement="left" title="Chi tiết"><i
                                                            class="fas fa-eye fa-lg"></i> </a>
                     <span data-toggle="modal" >
                                                    <a href="donhangsua.php?DH_MA=<?php echo $row['DH_MA']; ?>" class="text-success" data-toggle="tooltip"
                                                        data-placement="left" data-html="true" title="Sửa"><i
                                                            class="fa fa-edit fa-lg"></i></a>
                    <span data-toggle="modal">
                                                    <a href="donhangxoa.php?DH_MA=<?php echo $row['DH_MA']; ?>" class="text-danger ml-3" data-toggle="tooltip"
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