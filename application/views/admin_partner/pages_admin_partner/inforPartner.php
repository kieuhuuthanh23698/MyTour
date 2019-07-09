<form method="POST">
    <h2 class="title-page"><b>Quản lý tài khoản</b></h2>
    <div class="row">
        <div class="col-xs-12">
            <hr class="dark header">
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h4>Thông tin tài khoản</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-8 col-info-basic">
                    <div class="form-horizontal mg-l-20 mg-t-20">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Họ và tên:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nameEdit" value="<?php echo $partner['destinationName'];?>">
                                <p class="help-block red"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="use_email" value="<?php echo $partner['destinationEmail'];?>" disabled="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Số điện thoại:</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" name="phoneEdit" value="<?php echo $partner['destinationPhone'];?>">
                                <p class="help-block red"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Địa chỉ:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="addressEdit" value="<?php echo $partner['destinationAddress'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tỉnh/Thành phố:</label>
                            <div class="col-sm-5 select-df">
                                <select class="form-control select2-hidden-accessible" name="cityEdit" tabindex="-1" aria-hidden="true">
                                    <option value="3" selected="selected">Hồ Chí Minh</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="border-top-gray">
        <div class="mg-t-20 pd-l-0 col-sm-8">
            <div class="form-horizontal mg-t-20 mg-l-20">
                <div class="form-group">
                    <div class="col-sm-8 pull-right">
                        <button type="submit" class="btn change-info">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>