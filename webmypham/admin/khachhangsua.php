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
                            $KH_MA = $_GET['KH_MA'];
                            $sql = "SELECT * FROM KHACHHANG 
                            WHERE KH_MA='".$KH_MA."'";
                            $result = $conn->query($sql);
                        
                            $row = $result->fetch_assoc();
                        
                    ?>
<div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
            <center><h2 class="modal-title" id="editModalLabel">Cập Nhật Khách Hàng</h3>    </center>
            <center> <form action="khachhangcapnhat.php" method="post">
           
           
                            <div class="form-group col-6">
                            <label class="col-form-label font-weight-bold">Mã Khách Hàng</label>
                            <input type="text"  id="kh_ma" name="kh_ma" class="form-control" value="<?php echo $row['KH_MA'];?>">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label font-weight-bold">Tên Khách Hàng</label>
                            <input type="text"  id="kh_ten" name="kh_ten" class="form-control" value="<?php echo $row['KH_TEN'];?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Email</label>
                            <input type="text"  id="kh_email" name="kh_email" class="form-control" value="<?php echo $row['KH_EMAIL']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Số điện thoại</label>
                            <input type="text"  id="kh_sdt" name="kh_sdt" class="form-control" value="<?php echo $row['KH_SDT']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Địa chỉ</label>
                            <input type="text"  id="kh_diachi" name="kh_diachi" class="form-control" value="<?php echo $row['KH_DIACHI']; ?>">
                        </div>
                    
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Mật khẩu</label>
                            <input type="password"  id="kh_matkhau" name="kh_matkhau" class="form-control" value="<?php echo $row['KH_MATKHAU']; ?>"/>
                        </div>
                
                  
                    <input type="submit" value="Cập Nhật" name="bntUpDate" class="btn btn-success btn-block">
                                                          
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