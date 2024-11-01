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
		$NV_MA = $_GET['NV_MA'];
		$sql = "SELECT * FROM NHANVIEN a , CHUCVU b
         WHERE NV_MA='".$NV_MA."'";
		$result = $conn->query($sql);
     
		$row = $result->fetch_assoc();
    
?>
<div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
            <center><h2 class="modal-title" id="editModalLabel">Cập Nhật Nhân Viên</h3>    </center>
            <center> <form action="nhanviencapnhat.php" method="post">
           
           
                            <div class="form-group col-6">
                            <label class="col-form-label font-weight-bold">Mã Nhân Viên</label>
                            <input type="text"  id="nv_ma" name="nv_ma" class="form-control" value="<?php echo $row['NV_MA'];?>">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label font-weight-bold">Tên Khách Hàng</label>
                            <input type="text"  id="nv_ten" name="nv_ten" class="form-control" value="<?php echo $row['NV_TEN'];?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Email</label>
                            <input type="text"  id="nv_email" name="nv_email" class="form-control" value="<?php echo $row['NV_EMAIL']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Số điện thoại</label>
                            <input type="text"  id="nv_sdt" name="nv_sdt" class="form-control" value="<?php echo $row['NV_SDT']; ?>">
                        </div>
                        <div class="form-group col-6">
                        <label  class="col-form-label font-weight-bold" for="chucvu">Chức Vụ</label>
                <select name="cv_ma" id="cv_ma"  class="form-control">
                <option value="<?php echo $row['CV_MA'];?>">
                        <?php echo $row['CV_TEN']; ?></option>
                <?php
            $sql0 = "select * from CHUCVU ";
            $result0 = mysqli_query($conn, $sql0);
            while ($row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC)) {
				$data0[] = array(
                'CV_MA' => $row0['CV_MA'],
                'CV_TEN' => $row0['CV_TEN'],
                );
            }
            ?>
              <?php foreach ($data0 as $row0) : ?>
                    <option value="<?php echo $row0['CV_MA'];?>"><?php echo $row0['CV_TEN']; ?></option>
                    <?php endforeach; ?>
              </select>
              </div>
                    
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">Mật khẩu</label>
                            <input type="password"  id="nv_matkhau" name="nv_matkhau" class="form-control" value="<?php echo $row['NV_MATKHAU']; ?>"/>
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