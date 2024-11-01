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
                            $DH_MA = $_GET['DH_MA'];
                            $sql = "SELECT * FROM chitietdonhang c, DONHANG a , SANPHAM b, DIACHINHANHANG d,
                            PHUONGTHUCTHANHTOAN e , trangthai t
                            WHERE a.DH_MA='".$DH_MA."'
                            and c.DH_MA = a.DH_MA
                            and a.DCNH_MA = d.DCNH_MA
                            and a.PTTT_MA = e.PTTT_MA
                            and a.TT_MA = t.TT_MA
                        
                            and c.SP_MA = b.SP_MA";
                            $result = $conn->query($sql);
                        
                            $row = $result->fetch_assoc();
                        
                    ?>
<div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
            <center><h2 class="modal-title" id="editModalLabel">ĐƠN HÀNG</h3></center>
            <center> <form action="donhang.php" method="post" >
           
           
            Ngày Đặt: <?php echo $row['DH_NGAYDAT'];?>
                        <div style="text-align:left; margin-left:20px">
                            <label class="col-form-label font-weight-bold">
                                    Người gửi
                                </label> 
                                <br> 
                                    Tên: Beauty Hanna
                                    <br>
                                    Số điện thoại: 0909 999 999
                                <br>
                                Địa chỉ gửi: Số 123 Đường 3/2, Xuân Khánh, Ninh Kiều, TP.Cần Thơ                                    
                                    <div style="width:460px;border-bottom: 2px solid gray"></div>
                       </div>
                    <br>
                       <div style="text-align:left; margin-left:20px">
                        <label class="col-form-label font-weight-bold">
                                Người nhận
                            </label> 
                            <br> 
                                Tên: <?php echo $row['DCNH_TEN'];?>
                                <br>
                                Số điện thoại: <?php echo $row['DCNH_SDT'];?>
                            <br>
                            Địa chỉ nhận hàng: 
                                <?php echo $row['DCNH_DIACHI'];?>,
                                <?php echo $row['DCNH_XA'];?>, 
                                <?php echo $row['DCNH_HUYEN'];?>,
                                <?php echo $row['DCNH_TINH'];?> 
                                
                                <div style="width:460px;border-bottom: 2px solid gray;margin-bottom:20px"></div>
                       </div>
                            

                        <div class="form-group" style="text-align:left;margin-left:20px;">
                            <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "MYPHAM";

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                // Check connection
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }
                                $DH_MA1 = $_GET['DH_MA'];
                                $sql1 = " SELECT *
                                    FROM chitietdonhang a , sanpham b
                                        WHERE a.SP_MA = b.SP_MA
                                        AND a.DH_MA = '$DH_MA1'";
                                
                                $result1 = mysqli_query($conn, $sql1);

                                $data1= [];
                            $rowNum = 1;
                            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                                $data1[] = array(
                                    'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                                    'DH_MA' => $row1['DH_MA'],
                                    'ID' => $row1['ID'],
                                    'SP_MA' => $row1['SP_MA'],
                                    'SP_TEN' => $row1['SP_TEN'],
                                    'SP_HINH'  => $row1['SP_HINH'],
                                    'SP_GIABAN'  => $row1['SP_GIABAN'],
                                    'SOLUONG'  => $row1['SOLUONG'],
                                    'SP_SOLUONGTON'  => $row1['SP_SOLUONGTON'],
                                );
                                $rowNum++;
                            }
                                ?>
                                <?php foreach ($data1 as $row1) : ?>
                                    
                                    <img src="../image/addsp/<?php echo $row1['SP_HINH']; ?>" alt="" width="60" height="60" style="margin-right:20px">
                                    
                                    <?php echo $row1['SP_TEN']; ?>
                                    <br>
                                    <?php echo number_format($row1['SP_GIABAN']); ?>
                                    x <?php echo $row1['SOLUONG']; ?>
                                    <BR>
                                    <?php endforeach; ?>
                                    <div style="width:460px; border-bottom: 2px solid gray;margin-bottom:20px"></div>
                                    
             <label class="font-weight-bold">Ghi Chú: <?php echo $row['DH_GHICHU']; ?></label><br>
             <label class="font-weight-bold">Tổng Tiền Hàng: <?php echo number_format($row['DH_TONGTIENHANG']); ?></label><br>
            <label class="font-weight-bold">Tổng Giảm Giá: <?php echo '- ' . number_format($row['DH_GIAMGIA']); ?></label><br>
            <label class="font-weight-bold">Tổng Tiền Vận Chuyển: <?php echo number_format($row['DH_TONGTIENVANCHUYEN']); ?></label><br>
            <label class="font-weight-bold">Phương Thức Thanh Toán: <?php echo $row['PTTT_TEN']; ?></label><br>
            <label class="font-weight-bold" style="font-size:20px;">Tổng Thanh Toán: <?php echo number_format($row['DH_TONGTHANHTOAN']); ?> VND</label><br>

            
             <input style="width:460px" type="submit" value="TRỞ VỀ" name="tro_ve" class="btn btn-success btn-block">
            <input style="width:460px" type="button" value="IN HÓA ĐƠN" name="in_hoa_don" class="btn btn-success btn-block">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Xử lý sự kiện khi nút "IN HÓA ĐƠN" được bấm , 
            
            $('input[name="in_hoa_don"]').click(function () {//
                // Ẩn các nút "TRỞ VỀ" và "IN HÓA ĐƠN"ẩn nó đi khi in ra
                $('input[name="tro_ve"]').hide();
                $('input[name="in_hoa_don"]').hide();

                // Sử dụng cửa sổ in trình duyệt để in trang web
                window.print();
            });
            
            // Xử lý sự kiện sau khi in xong trang web
            window.addEventListener("afterprint", function(event) {
                // Hiển thị lại các nút "TRỞ VỀ" và "IN HÓA ĐƠN"
                $('input[name="tro_ve"]').show();
                $('input[name="in_hoa_don"]').show();
            });
        });
    </script>    
                         </div>                                  
                </form>
                       
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