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
		$KM_MA = $_GET['KM_MA'];
		$sql = "SELECT * FROM KHUYENMAI 
         WHERE KM_MA='".$KM_MA."'";
		$result = $conn->query($sql);
     
		$row = $result->fetch_assoc();
    
?>
<div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
            <center><h2 class="modal-title" id="editModalLabel">CẬP NHẬT KHUYẾN MÃI</h3>    </center>
            <center> <form action="khuyenmaicapnhat.php" method="post">
           
           
                            <div class="form-group col-6">
                            <label class="col-form-label font-weight-bold">MÃ KHUYẾN MÃI</label>
                            <input type="text"  id="KM_MA" name="KM_MA" class="form-control" value="<?php echo $row['KM_MA'];?>">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label font-weight-bold">TÊN KHUYẾN MÃI</label>
                            <input type="text"  id="KM_TEN" name="KM_TEN" class="form-control" value="<?php echo $row['KM_TEN'];?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">GÍA TRỊ</label>
                            <input type="text"  id="KM_GIATRI" name="KM_GIATRI" class="form-control" value="<?php echo $row['KM_GIATRI']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">NGÀY BẮT ĐẦU</label>
                            <input type="DATE"  id="KM_NGAYBD" name="KM_NGAYBD" class="form-control" value="<?php echo $row['KM_NGAYBD']; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label
                                class="col-form-label font-weight-bold">NGÀY KẾT THÚC</label>
                            <input type="DATE"  id="KM_NGAYKT" name="KM_NGAYKT" class="form-control" value="<?php echo $row['KM_NGAYKT']; ?>">
                        </div>
                    
                        <div class="form-group col-6">
         
                
                  
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