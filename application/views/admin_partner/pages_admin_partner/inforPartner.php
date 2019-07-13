<form method="POST" action="<?php echo base_url()?>/admin_partner/inforPartner/update">
    <h2 class="title-page"><b>Quản lý khách sạn</b></h2>
    <div class="row">
        <div class="col-xs-12">
            <hr class="dark header">
        </div>
    </div>
    <style type="text/css">
        .form-control{
            height: 34px !important;
        }
        .title-page{
            margin-top: 125px;
        }
    </style>

    <div class="box">
        <div class="box-header" style="text-align: center;">
            <h3>Thông tin khách sạn</h4>
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
                                <input type="email" class="form-control" name="use_email" value="<?php echo $partner['destinationEmail'];?>">
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

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Quận/Huyện:</label>
                            <div class="col-sm-5 select-df">
                                <select class="form-control select2-hidden-accessible" name="ditrictEdit" tabindex="-1" aria-hidden="true">
                                    <option value="3" selected="selected">Hóc Môn</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Xã/Phường:</label>
                            <div class="col-sm-5 select-df">
                                <select class="form-control select2-hidden-accessible" name="wardEdit" tabindex="-1" aria-hidden="true">
                                    <option value="3" selected="selected">Đông Thạnh</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Hạng sao:</label>
                            <div class="col-sm-5 select-df">
                                <ul class="list-unstyled">
                                    <li>
                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="1" id-convenience="10" filter="filter">
                                            <i class="icon-checkbox"></i> 1
                                            <span class="star">
                                                <span class="star-1"></span>
                                            </span>
                                        </label>

                                    </li>
                                    <li>

                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="2" id-convenience="11" filter="filter">
                                            <i class="icon-checkbox"></i> 2
                                            <span class="star">
                                                <span class="star-2"></span>
                                            </span>
                                        </label>

                                    </li>
                                    <li>

                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="3" id-convenience="12" filter="filter">
                                            <i class="icon-checkbox"></i> 3
                                            <span class="star">
                                                <span class="star-3"></span>
                                            </span>
                                        </label>

                                    </li>
                                    <li>

                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="4" id-convenience="13" filter="filter">
                                            <i class="icon-checkbox"></i> 4
                                            <span class="star">
                                                <span class="star-4"></span>
                                            </span>
                                        </label>

                                    </li>
                                    <li>

                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="5" id-convenience="14" filter="filter">
                                            <i class="icon-checkbox"></i> 5
                                            <span class="star">
                                                <span class="star-5"></span>
                                            </span>
                                        </label>

                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Thời gian hủy đặt phòng:</label>
                            <div class="col-sm-8">
                                <div class="date">
                                    <input type="number" min="1"  name="cancelTime"value="1">
                                    <label>Ngày</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-info-basic">
                    <div class="form-horizontal mg-l-20 mg-t-20">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Username : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="usename" value="<?php echo $partner['destinationUser'];?>">
                                <p class="help-block red"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Password : </label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" value="<?php echo $partner['destinationPassword'];?>">
                                <p class="help-block red"></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .date{
            border: 1px solid #ccc;
            border-radius: 3px;
            padding: 3px;
            display: flex;
            justify-content: space-between;

        }
        .date input{
            border: 0;
            padding: 3px;
            width: 250px;
        }
    </style>

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