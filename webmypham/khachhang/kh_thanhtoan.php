<?php
include 'inc/header_chitiet.php';
?>
    <div class="main">
        <div class="grid wide">
            <div class="row">
                                      
                
                <div class="col l-10 m-12 s-12">
                <div class="pay-information">
                       
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
                            $kh_ma = $_COOKIE["kh_ma"];

                        $sqldc = "select  COUNT(dcnh_ma) as so,dcnh_ten,dcnh_sdt, dcnh_diachi, dcnh_ma,dcnh_huyen,dcnh_xa,dcnh_tinh
                         from diachinhanhang where KH_MA = '$kh_ma'";
                        
                        
                            $resultdc = mysqli_query($conn, $sqldc);
                            $rowdc = mysqli_fetch_array($resultdc, MYSQLI_ASSOC);
                            
                    ?>
                     <form action="kh_donhangluu.php" method="post">
                        <div class="diachitieu"> 
                        <input type="hidden" id="DCNH_MA" name="DCNH_MA"  value="<?php echo $rowdc['dcnh_ma']; ?>">
                         <a href="kh_diachi.php"> THÊM ĐỊA CHỈ MỚI  <i class="fa fa-plus"></i> </a>
                        </div>
                         <div class="diachi">
                         <?php 
                                     if($rowdc['so']>=1){
                                        echo ' <div>
                                        <br>'.$rowdc['dcnh_ten'].'/'.$rowdc['dcnh_sdt'].
                                        '</div>    <br>     
                                        <div>'.$rowdc['dcnh_diachi'].','.$rowdc['dcnh_xa'].','.$rowdc['dcnh_huyen'].','.$rowdc['dcnh_tinh']

                                       ;
                                    }
                            ?>
                             
                        </div>



                    <div class="pay-order">
                        <div class="pay__heading"></div>
                      
                        </div>
                       
                          <!--Danh sách sản phẩm đơn hàng -->

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
                                $a = $_COOKIE["kh_email"];
                                $sql = " SELECT *
                                    FROM chitietgiohang a , sanpham b , giohang c
                                        WHERE a.SP_MA = b.SP_MA
                                        AND a.GH_MA = c.GH_MA
                                        AND a.GH_MA = '$a'";
                                
                                $result = mysqli_query($conn, $sql);

                                $data = [];
                            $rowNum = 1;
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $data[] = array(
                                    'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                                    'GH_MA' => $row['GH_MA'],
                                    'TIENHANG' => $row['TIENHANG'],
                                    'GIAMGIA' => $row['GIAMGIA'],
                                    
                                    'THANHTOAN' => $row['THANHTOAN'],
                                    'SP_MA' => $row['SP_MA'],
                                    'SP_TEN' => $row['SP_TEN'],
                                    'SP_HINH'  => $row['SP_HINH'],
                                    'SP_GIABAN'  => $row['SP_GIABAN'],
                                    'SOLUONG'  => $row['SOLUONG'],
                                    'SP_SOLUONGTON'  => $row['SP_SOLUONGTON'],

                                );
                                $rowNum++;
                            }
                                ?>
           
                             <?php foreach ($data as $row) : ?>
                          <div class="pay-info">
                          <input type="hidden" id="SP_MA" name="SP_MA"  value="<?php echo $row['SP_MA']; ?>">
                          <input type="hidden" id="SOLUONG" name="SOLUONG"  value="<?php echo $row['SOLUONG']; ?>">
                            <div class="main__pay-text"> <img src="../image/addsp/<?php echo $row['SP_HINH']; ?>" alt=""  width="60" height="60" >
                                 </div>
                                 <div class="main__pay-text l-4 m-2 s-2"> <?php echo $row['SP_TEN']; ?>
                                 </div>
                                 <div class="main__pay-amount l-2 m-2 s-2">
                                 <?php echo $row['SOLUONG']; ?>
                            </div>
                           
                          
                            
                            <div class="main__pay-price">
                            <?php echo number_format($tong=(($row['SP_GIABAN'] * $row['SOLUONG'])) ); ?>
                            </div>

                         </div>
                         <?php global $Tien;
                                    number_format($Tien += $tong);
                                ?>
                         <?php endforeach; ?>



                        <div class="pay-info">
                            <div class="main__pay-text">
                                Phương Thức Vận Chuyển </div>
                           
                            <div class="main__pay-price">
                            
                             
                                        <img  src="../image/dv_vanchuyen/GHN.PNG" width="150" height="100">
                                        
                                        </div>
                                    </div>
                        <div class="pay-info">
                            <div class="main__pay-text">
                               Phương Thức Thanh Toán
                               
                             </div>
                            <div class="main__pay-price">
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
                                $sqlPTTT = "select * from PHUONGTHUCTHANHTOAN";
                                $resultPTTT = mysqli_query($conn, $sqlPTTT);
                                while ($rowPTTT = mysqli_fetch_array($resultPTTT, MYSQLI_ASSOC)) {
                                    $dataPTTT[] = array(
                                        'PTTT_MA' => $rowPTTT['PTTT_MA'],
                                    'PTTT_TEN' => $rowPTTT['PTTT_TEN'],
                                
                                    );
                                }
                            ?> 
         
                        <select name="PTTT" id="PTTT" class="form-control" style="font-size:15px ; width : 225px">
                                <option value="">--Chọn--</option>
                        <?php foreach ($dataPTTT as $rowPTTT) : ?>
                        
                                <option name="PTTT_MA" value="<?php echo $rowPTTT['PTTT_MA'];?>">
                                <?php echo $rowPTTT['PTTT_TEN']; ?>
                            </option>
                                <?php endforeach; ?>
                                    </select>
                                        </div>
                                    </div>

                                    <div class="pay-info">
                            <div class="main__pay-text special">
                                Ghi Chú</div>
                            <div class="main__pay-price">
                            <input style="font-size:15px ; width : 225px" id="DH_GHICHU" name="DH_GHICHU" type="text" class="form-control" >
                            </div>
                        </div><br>     

                                    <!--Tổng Tiền Hàng -->
                
                            
                        <div class="pay-info">
                            <div class="main__pay-text special" >
                                Tổng Tiền Hàng
                            </div>
                            <div class="main__pay-price" name ="DH_TONGTIENHANG">
                            <input style="font-size:15px ; width : 225px" id="TONGTIENHANG" name="TONGTIENHANG" type="hidden" 
                            class="form-control" value="<?php echo''.$row['TIENHANG']; ?>">   
                            <?php

                            echo ''.number_format($row['TIENHANG']); ?>                        
                            </div>

                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text special" >
                                Tổng Giảm Giá
                            </div>
                            <div class="main__pay-price">
                            <input style="font-size:15px ; width : 225px" id="GIAMGIA" name="GIAMGIA" type="hidden" 
                            class="form-control" value=" <?php $giam= $row['GIAMGIA']; echo ''.$giam ?>
                            ">
                            <?php 
                            $giamgia = $row['GIAMGIA'];
                            echo '-'.number_format($row['GIAMGIA']); ?>
                            </div>

                        </div>
                                      <!--Tổng Tiền Hàng -->
                
                                      <div class="pay-info">
                            <div class="main__pay-text special">
                                Tổng Tiền Vận Chuyển
                            </div>
                            <div class="main__pay-price">
                            <input style="font-size:15px ; width : 225px" id="TIENVANCHUYEN" name="TIENVANCHUYEN" type="hidden"
                             class="form-control" value="
                             <?php
                             
                             if($rowdc['dcnh_tinh'] == 'Thành phố Cần Thơ'){
                             echo'20000';}
                             else{
                                $vanchuyen = number_format(30000);
                                echo '30000';
                             }
                             ?>
                             ">

                              <?php
                             if($rowdc['dcnh_tinh'] == 'Thành phố Cần Thơ'){
                                $vanchuyen = number_format(20000);
                             echo''.$vanchuyen;}
                             else{
                                $vanchuyen = number_format(30000);
                                echo ''.$vanchuyen;
                             }
                             ?>
                        </div>

                        </div>
                            <!--Tổng Thanh Toán -->
                        <div class="pay-info">
                            <div class="main__pay-text special">
                                Tổng Thanh Toán</div>
                            <div class="main__pay-price">
                            <input style="font-size:15px ; width : 225px" id="TONGTHANHTOAN" name="TONGTHANHTOAN" type="hidden" 
                            class="form-control" value="
                            <?PHP
                            if($rowdc['dcnh_tinh'] == 'Thành phố Cần Thơ'){
                              
                                $f = (20000 + $row['THANHTOAN']);
                               
                             echo''.$f;}
                             else{
                                $f = ((float)30000 + $row['THANHTOAN']);
                          
                             echo''.$f;}
                               ?>
                            ">

                            <?PHP
                            if($rowdc['dcnh_tinh'] == 'Thành phố Cần Thơ'){
                            
                                $h = ((INT)20000 + $row['THANHTOAN']);
                             echo''.number_format($h);}
                             else{
                               
                                $h = ((INT)30000 + $row['THANHTOAN']);
                                echo''.number_format($h);}
                               ?>
                            </div>
                        </div>

                                                           
                        <input type="submit" value="ĐẶT HÀNG" name="bntUpDate" class="btn btn-success btn-block btn--default">
                        
              </from>
                </div>
                </div>
        </div>
            </div>
        </div>
 <?php
include 'inc/footer.php';

?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./assets/js/thanhtoan.js"></script>