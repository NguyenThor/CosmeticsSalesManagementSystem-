<?php
include 'inc/header.php';
?>
    <div class="main">
        <div class="grid wide">
            <div class="row">
                <div class="col l-7 m-12 s-12">
                    <div class="pay-information">
                        <div class="pay__heading">Thông tin thanh toán</div>
                        <div class="form-group">
                            <label for="account" class="form-label">Họ Tên *</label>
                            <input id="account" name="account" type="text" class="form-control">
                            <span class="form-message">Không hợp lệ !</span>
                        </div>
                        <div class="form-group">
                            <label for="account" class="form-label">Địa chỉ *</label>
                            <input id="account" name="account" type="text" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="account" class="form-label">Tỉnh / Thành phố *</label>
                            <input id="account" name="account" type="text" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="account" class="form-label">Email *</label>
                            <input id="account" name="account" type="text" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="account" class="form-label">Số điện thoại *</label>
                            <input id="account" name="account" type="text" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="account" class="form-label">Ghi chú cho đơn hàng</label>
                            <textarea class="form-control" name="" id="" cols="30" rows="20"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col l-5 m-12 s-12">
                    <div class="pay-order">
                        <div class="pay__heading">Đơn hàng của bạn</div>
                        <div class="pay-info">
                            <div class="main__pay-text">
                                Azrouel dress variable</div>
                            <div class="main__pay-price">
                                1,120,000 ₫
                            </div>
                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text">
                                Azrouel dress variable </div>
                            <div class="main__pay-amount">
                                3
                            </div>
                            <div class="main__pay-price">
                                1,120,000 ₫
                            </div>
                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text">
                                Azrouel dress variable </div>
                            <div class="main__pay-price">
                                1,120,000 ₫
                            </div>
                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text special">
                                Giao hàng
                            </div>
                            <div class="main__pay-text">
                                Giao hàng miễn phí
                            </div>

                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text special">
                                Tổng thành tiền</div>
                            <div class="main__pay-price">
                                1,120,000 ₫
                            </div>
                        </div>
                        <div class="btn btn--default">Đặt hàng</div>
                    </div>

                </div>
            </div>
        </div>
 <?php
include 'inc/footer.php';

?>