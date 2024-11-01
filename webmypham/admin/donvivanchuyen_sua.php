<?php
       include 'inc/header.php';
       ?>
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
		$NV_MA = $_GET['DV_MA'];
		$sql = "SELECT * FROM donvivanchuyen";
		$result = $conn->query($sql);
     
		$row = $result->fetch_assoc();
    
?>
<div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
            <center><h2 class="modal-title" id="editModalLabel">Cập Nhật Đơn Vị Vận Chuyển</h3>    </center>
            <center> <form action="donvivanchuyen_capnhat.php" method="post">
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
                  
                    <input type="submit" value="Cập Nhật" name="bntUpDate" class="btn btn-success btn-block">
                                                          
                </form>
            </div>
        </div>
    </div>
                            
    </center>
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