<?php
include 'inc/header_chitiet.php';
$tinh = (isset($_POST['T_MA']))?$_POST['T_MA']:"";
$huyen = (isset($_POST['H_MA']))?$_POST['H_MA']:"";
$xa = (isset($_POST['X_MA']))?$_POST['X_MA']:"";
?>
    <div class="main">
        <div class="grid wide">
            <div class="row">
            <div class="col l-5 m-12 s-12">
                    <div class="pay-information">
                       
                        <form action="kh_diachiluu.php" method="post" class="form-login" >
                            <div class="pay__heading">Địa chỉ mới</div>
                            <div class="form-group">
                                <label for="DCNH_TEN" class="form-label">Họ Tên *</label>
                                <input id="DCNH_TEN" name="DCNH_TEN" type="text" class="form-control">
                            
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <label for="DCNH_SDT" class="form-label">Số điện thoại *</label>
                                <input id="DCNH_SDT" name="DCNH_SDT" type="text" class="form-control">
                            
                            </div><br>
                            
                            <!--Tỉnh -->
                            <div>
                                <div class="form-group">
                                    <label for="DCNH_TINH" class="form-label">Tỉnh/Thành phố *</label>
                                    <select class="form-control" id="city" name="DCNH_TINH" >
                                    
                                    <option class="form-control" value="DCNH_TINH" selected></option>    

                                    </select>
                                </div><br>

                                
                                <div class="form-group">
                                    <label for="DCNH_HUYEN" class="form-label">Quận/Huyện *</label>
                                    <select class="form-control" id="district" name="DCNH_HUYEN">                               
                                    <option class="form-control" value="DCNH_HUYEN" selected></option>    
                                    </select>
                                </div><br>

                                <div class="form-group">
                                    <label for="DCNH_XA" class="form-label">Phường/Xã *</label>
                                    <select class="form-control" id="ward" name="DCNH_XA" >                               
                                    <option class="form-control" value="DCNH_XA" selected></option>    
                                    </select>
                                </div><br>    
                            </div> 


                                <h2 id="result"></h2>


                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                                    <script>
                                    const host = "https://provinces.open-api.vn/api/";
                                var callAPI = (api) => {
                                    return axios.get(api)
                                        .then((response) => {
                                            renderData(response.data, "city");
                                        });
                                }
                                callAPI('https://provinces.open-api.vn/api/?depth=1');
                                var callApiDistrict = (api) => {
                                    return axios.get(api)
                                        .then((response) => {
                                            renderData(response.data.districts, "district");
                                        });
                                }
                                var callApiWard = (api) => {
                                    return axios.get(api)
                                        .then((response) => {
                                            renderData(response.data.wards, "ward");
                                        });
                                }

                                var renderData = (array, select) => {
                                    let row = ' <option disable value="">Chọn</option>';
                                    array.forEach(element => {
                                        row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
                                    });
                                    document.querySelector("#" + select).innerHTML = row
                                }

                                $("#city").change(() => {
                                    callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
                                    printResult();
                                });
                                $("#district").change(() => {
                                    callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
                                    printResult();
                                });
                                $("#ward").change(() => {
                                    printResult();
                                })

                                var printResult = () => {
                                    if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
                                        $("#ward").find(':selected').data('id') != "") {
                                        let result = $("#city option:selected").text() +
                                            " | " + $("#district option:selected").text() + " | " +
                                            $("#ward option:selected").text();
                                        $("#result").text(result)
                                    }

                                }
                                    </script>
                

                            <br>
                            <div class="form-group">
                                <label for="KH_DIACHI" class="form-label">Địa chỉ *</label>
                                <input id="DCNH_DIACHI" name="DCNH_DIACHI" type="text" class="form-control">
                                
                            </div>
                            <br>
                            
                            
                            <button class="btn btn--default" type="submit">Thêm địa chỉ mới</button>
                        </form>  
                    </div>
               
               
        </div>
      
                                        <br>

        
                                   
                
                <div class="col l-7 m-12 s-12">
                    <div class="pay-order">
                        <div class="pay__heading">Chọn địa chỉ nhận hàng</div>
                      
                                      <!--Tổng Tiền Hàng -->
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
                            $kh_ma = $_COOKIE['kh_ma'];
                            $sql = "select * from diachinhanhang where kh_ma = '$kh_ma'";
                        
                        
                            $result = mysqli_query($conn, $sql);
                        
                            $data = [];
                        $rowNum = 1;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $data[] = array(
                                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                                'DCNH_MA' => $row['DCNH_MA'],
                                'DCNH_TEN' => $row['DCNH_TEN'],
                                'DCNH_SDT' => $row['DCNH_SDT'],
                                'DCNH_DIACHI' => $row['DCNH_DIACHI'],
                                'DCNH_TINH' => $row['DCNH_TINH'],
                                'DCNH_HUYEN' => $row['DCNH_HUYEN'],
                                'DCNH_XA' => $row['DCNH_XA'],
                                'KH_MA' => $row['KH_MA'],
                            
                            );
                            $rowNum++;
                            
                        }

                    ?>
                       <?php foreach ($data as $row) : ?>
                            <div class="pay-info">
                            <DIV class="main__pay-text">
                           <b> <?php echo $row['DCNH_TEN']; ?>/<?php echo $row['DCNH_SDT']; ?><b><BR>
                            <?php echo $row['DCNH_DIACHI']; ?>, <?php echo $row['DCNH_XA']; ?>, <?php echo $row['DCNH_HUYEN']; ?>, 
                            <?php echo $row['DCNH_TINH']; ?>
                            <br>
                            <a href="kh_diachixoa.php?DCNH_MA=<?php echo $row['DCNH_MA'];?>">Xóa</a>/
                            <a href="kh_diachisua.php?DCNH_MA=<?php echo $row['DCNH_MA'];?>">Sửa</a>/
                            <a href="kh_thanhtoanchon.php?DCNH_MA=<?php echo $row['DCNH_MA'];?>">Chọn</a> 
                       </DIV>
                        </div>
                        <?php endforeach; ?>

            
                </div>
            </div>
        </div>
 <?php
include 'inc/footer.php';

?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./assets/js/thanhtoan.js"></script>