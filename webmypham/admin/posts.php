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
                    <?php           
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "mypham";
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            $sql = " SELECT * FROM baiviet";    
                            $result = mysqli_query($conn, $sql);
                            $data = [];
                            $rowNum = 1;
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $data[] = array(
                                    'BV_MA' => $row['BV_MA'],
                                    'BV_TEN' => $row['BV_TEN'],
                                    'BV_MOTANGAN' => $row['BV_MOTANGAN'],
                                    'BV_NOIDUNG' => $row['BV_NOIDUNG'],
                                    'BV_HINH' => $row['BV_HINH'],
                                    'BV_NGAYDANG' => $row['BV_NGAYDANG'],
                                  
                                );
                                $rowNum++;
                            }
                ?>
            
                    <div class="row mb-3"></div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row float-left" style="font-size: 20px;">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-primary" href="Dashboard.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Quản lý bài viết</li>
                                    </ol>
                                </nav>
                            </div>

                            
                            <div class="row float-right bg-success mr-3 mt-2">
                                <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                                        class="fa fa-plus"></i> Thêm</button>

                                <!-- Modal thêm -->

                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                    aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="addModalLabel">Thêm Bài Viết</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="postadd.php" method="post">
                                                    <div class="form-group">
                                                        <label class="col-form-label font-weight-bold">Tiêu đề<span class="text-danger"> (*)</span></label>
                                                        <input id="BV_TEN" name="BV_TEN" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label font-weight-bold">Mô tả ngắn<span class="text-danger"> (*)</span></label>
                                                        <textarea id="BV_MOTANGAN" name="BV_MOTANGAN" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label font-weight-bold">Nội dung<span class="text-danger"> (*)</span></label>
                                                        <textarea id="BV_NOIDUNG" name="BV_NOIDUNG" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label font-weight-bold">Hình ảnh<span class="text-danger"> (*)</span></label>
                                                        <input id="BV_HINH" name="BV_HINH" type="file" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-success">Thêm</button>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>

                                <!-- End modal thêm -->

                            </div>
                            <!-- Search bar -->

                            <div class="navbar-nav col-3 float-right">
                                <div id="custom-search" class="top-search-bar">
                                    <input class="form-control" type="text" placeholder="Search..">

                                </div>
                            </div>

                            <!-- End search bar -->
                        </div>
                        <!-- <div class="table table-reponsive"> -->
                        <div class="card-body">
                            <div class="row table-responsive mx-auto" style="font-size: 16px">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tiêu đề</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php foreach ($data as $row) : ?>
                                        <tr>
                                        <td><?php echo $row['BV_MA']; ?></td>
                                        <td><?php echo $row['BV_TEN']; ?></td>
                                        <td><?php echo $row['BV_MOTANGAN']; ?></td> 
                                        <td><img  src="../image/post/<?php echo $row['BV_HINH']; ?>" width="100" height="100"></td> 
                                        <td><?php echo $row['BV_NGAYDANG']; ?></td> 
                                            <td>
                                            <span data-toggle="modal" data-target="#editModal">
                                                    <a href="postsua.php?BV_MA=<?php echo $row['BV_MA'] ?> " class="text-success"
                                                        data-placement="left" title="Sửa"><i
                                                            class="fa fa-edit fa-lg"></i></a>
                                                </span>
                                                <span data-toggle="modal" data-target="#deleteModal">
                                                    <a href="postdelete.php?BV_MA=<?php echo $row['BV_MA'] ?> " class="text-danger ml-3" data-toggle="tooltip"
                                                        data-placement="right" data-html="true" title="Xóa"><i
                                                            class="fa fa-trash-alt fa-lg"></i></a>
                                                </span>
                                     <?php endforeach; ?>
                                               
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- </div> -->
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