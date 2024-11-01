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
                  
                     <!-- Modal sửa -->



         <?php
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "mypham";
                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            $BV_MA = $_GET['BV_MA'];
                                            $sqlSelect = "select * from `baiviet` where BV_MA = '$BV_MA' ";
                                            $resultSelect = mysqli_query($conn, $sqlSelect);
                                            $Row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);

                        ?> 
        <?php
                                        if (isset($_POST['btnSave'])) {
                                            $BV_TEN = $_POST['BV_TEN']; 
                                            $BV_MOTANGAN = $_POST['BV_MOTANGAN'];
                                            $BV_NOIDUNG = $_POST['BV_NOIDUNG'];
                                            $BV_HINH = $_POST['BV_HINH'];
                                                    
                                            $sql = "UPDATE baiviet SET BV_TEN='$BV_TEN', BV_MOTANGAN='$BV_MOTANGAN', BV_NOIDUNG='$BV_NOIDUNG', BV_HINH='$BV_HINH' WHERE BV_MA='$BV_MA';";

                                        // echo $sql;

                                        // echo $sql;
                                            
                                            mysqli_query($conn, $sql);

                                            
                                            mysqli_close($conn);
                                            header('location:bomon.php');
                                            
                                        //
                                        

                        }
                ?>

                                               <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="editModalLabel">Sửa Bài Viết
                                                                    </h3>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                        <form action="add_post.php" method="post">
                                                                <div class="form-group">
                                                                    <label class="col-form-label font-weight-bold">Tiêu đề<span class="text-danger"></span></label>
                                                                    <input id="BV_TEN" name="BV_TEN" type="text" class="form-control" value="<?php echo $Row['BV_TEN'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label font-weight-bold">Mô tả ngắn<span class="text-danger"></span></label>
                                                                    <textarea id="BV_MOTANGAN" name="BV_MOTANGAN" class="form-control" value="<?php echo $Row['BV_MOTANGAN'] ?>"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label font-weight-bold">Nội dung<span class="text-danger"></span></label>
                                                                    <textarea id="BV_NOIDUNG" name="BV_NOIDUNG" class="form-control" value="<?php echo $Row['BV_NOIDUNG'] ?>"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label font-weight-bold">Hình ảnh<span class="text-danger"></span></label>
                                                                    <input id="BV_HINH" name="BV_HINH" type="file" class="form-control" value="<?php echo $Row['BV_HINH'] ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                        <a href="posts.php"><button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Đóng</button></a>
                                                        <button name="btnSave" class="btn btn-success">Cập nhật</button>
                                                    </div>
                                                                        </form>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                <!-- End modal sửa -->
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