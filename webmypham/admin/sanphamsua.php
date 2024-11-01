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
                    <div class="modal-body">
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
		$SP_MA = $_GET['SP_MA'];
		$sql = "SELECT * FROM SANPHAM a, THUONGHIEU b , loaihang c 
         WHERE a.TH_MA = b.TH_MA
         AND a.L_MA = c.L_MA
         AND SP_MA='".$SP_MA."'";
		$result = $conn->query($sql);
     
		$row = $result->fetch_assoc();
    
?>
<div class="container">
        <div class="modal-dialog">
            <div class="modal-content" >
            <center><h2 class="modal-title" id="editModalLabel">Cập Nhật Sản Phẩm</h3></center>
            <center> <form action="sanphamcapnhat.php" method="post">
                <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label font-weight-bold">Mã Sản Phẩm</label>
                            <input type="text"  id="sp_ma" name="sp_ma" class="form-control" value="<?php echo $row['SP_MA'];?>">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label font-weight-bold">Tên Sản Phẩm</label>
                            <input type="text"  id="sp_ten" name="sp_ten" class="form-control" value="<?php echo $row['SP_TEN'];?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Công dụng</label>
                            <input type="text"  id="sp_congdung" name="sp_congdung" class="form-control" value="<?php echo $row['SP_CONGDUNG']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Thành phần</label>
                            <input type="text"  id="sp_thanhphan" name="sp_thanhphan" class="form-control" value="<?php echo $row['SP_THANHPHAN']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Giá Bán</label>
                            <input type="text"  id="sp_giaban" name="sp_giaban" class="form-control" value="<?php echo $row['SP_GIABAN']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Trọng Lượng</label>
                            <input type="text"  id="sp_trongluong" name="sp_trongluong" class="form-control" value="<?php echo $row['SP_TRONGLUONG']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Ngày sản xuất</label>
                            <input type="date"  id="sp_nsx" name="sp_nsx" class="form-control" value="<?php echo $row['SP_NSX']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Hạn sử dụng</label>
                            <input type="date"  id="sp_hsd" name="sp_hsd" class="form-control" value="<?php echo $row['SP_HSD']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label font-weight-bold">Đơn Vị Tính</label>
                            <select class="form-control" id="sp_dvt" name="sp_dvt">
                                                                 <option><?php echo $row['SP_DVT']; ?></option>  
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
                                class="col-form-label font-weight-bold">Số lượng tồn</label>
                            <input type="text"  id="sp_soluongton" name="sp_soluongton" class="form-control" value="<?php echo $row['SP_SOLUONGTON']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Đã Bán</label>
                            <input type="text"  id="sp_soluongdaban" name="sp_soluongdabna" class="form-control" value="<?php echo $row['SP_SOLUONGDABAN']; ?>">
                        </div>
           
                        <div class="form-group col-6">
                        <label  class="col-form-label font-weight-bold" for="chucvu">Thương Hiệu</label>
                            <select name="th_ma" id="th_ma"  class="form-control">
                            <option value="<?php echo $row['TH_MA'];?>">
                                    <?php echo $row['TH_TEN']; ?></option>
                            <?php
                        $sql0 = "select * from THUONGHIEU ";
                        $result0 = mysqli_query($conn, $sql0);
                        while ($row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC)) {
                            $data0[] = array(
                            'TH_MA' => $row0['TH_MA'],
                            'TH_TEN' => $row0['TH_TEN'],
                            );
                        }
                        ?>
                        <?php foreach ($data0 as $row0) : ?>
                                <option value="<?php echo $row0['TH_MA'];?>"><?php echo $row0['TH_TEN']; ?></option>
                                <?php endforeach; ?>
                        </select>
                        </div>
                                
                            
                            
                        <div class="form-group col-6">
                                    <label  class="col-form-label font-weight-bold" for="chucvu">Loại Hàng</label>
                            <select name="l_ma" id="l_ma"  class="form-control">
                            <option value="<?php echo $row['L_MA'];?>">
                                    <?php echo $row['L_TEN']; ?></option>
                            <?php
                        $sql4 = "select * from LOAIHANG ";
                        $result4 = mysqli_query($conn, $sql4);
                        while ($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
                            $data4[] = array(
                            'L_MA' => $row4['L_MA'],
                            'L_TEN' => $row4['L_TEN'],
                            );
                        }
                        ?>
                        <?php foreach ($data4 as $row4) : ?>
                                <option value="<?php echo $row4['L_MA'];?>"><?php echo $row4['L_TEN']; ?></option>
                                <?php endforeach; ?>
                        </select>
                        </div>
                                <input type="submit" value="Cập Nhật" name="bntUpDate" class="btn btn-success btn-block">
                </div>                                                  
                </form>
            </div>
        </div>
    </div>
              
                            
    </center>
                                              </div>
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