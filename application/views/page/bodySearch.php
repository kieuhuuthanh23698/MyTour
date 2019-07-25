<!--************************************************* MAIN ********************************************-->
<script type="text/javascript">
    //ĐỊNH DẠNG TIỀN
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return  n2.split('').reverse().join('');
    }

    $(document).ready(function(){
    renderPages(<?php echo $count?>);
    $(".product-page .pagination li:first-child").addClass("activepage");
    })

</script>
<div class="dest-main padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-12">

                        <div class="filter">
                            <h1 class="h2 text-center"> Loại Hình</h1>
                            <ul>
                                <li>
                                    <input type="checkbox" name="typeDes" value="1"> Khách sạn
                                </li>
                                <li><input type="checkbox" name="typeDes" value="2"> Resort</li>
                            </ul>
                        </div>

                        <div class="filter">
                            <h1 class="h2 text-center">Mức giá</h1>
                            <ul>
                                <li>
                                    <input type="checkbox" name="price" value="1"> Dưới 1 triệu
                                </li>
                                <li>
                                    <input type="checkbox" name="price" value="2"> Từ 1 - 2 triệu
                                </li>
                                <li>
                                    <input type="checkbox" name="price" value="2"> Từ 2 - 3 triệu
                                </li>
                                
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio">Giá tăng dần
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio">Giá giảm dần
                                  </label>
                                </div>

                            </ul>
                        </div>

                        <div class="filter">
                            <h1 class="h2 text-center">Hạng Sao</h1>
                            <ul>
                                <li>
                                    <input type="checkbox" name="star" value="1">
                                    <i class="fas fa-star"></i>
                                
                                </li>
                                <li><input type="checkbox" name="star" value="2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><input type="checkbox" name="star" value="3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><input type="checkbox" name="star" value="4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><input type="checkbox" name="star" value="5">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                            </ul>
                        </div>

                        <div class="filter">
                            <h1 class="h2 text-center"> Dịch vụ đi kèm</h1>
                            <ul>
                                <li><input type="checkbox" name="servive" value="1"> Bữa sáng miễn phí</li>
                                <li><input type="checkbox" name="servive" value="2"> 3 bữa ăn miễn phí</li>
                                <li><input type="checkbox" name="servive" value="3"> Thêm giường phụ</li>
                            </ul>
                        </div>

                        <div class="filter">
                            <h1 class="h2 text-center"> Tiện nghi khách sạn</h1>
                            <ul>
                                <li><input type="checkbox" name="convenience" value="1"> Hồ bơi</li>
                                <li><input type="checkbox" name="convenience" value="2"> Massage/Spa </li>
                                <li><input type="checkbox" name="convenience" value="3"> Wifi miễn phí</li>
                                <li><input type="checkbox" name="convenience" value="4"> Bãi đỗ xe</li>
                                <li><input type="checkbox" name="convenience" value="5"> Cho thuê xe máy</li>
                            </ul>
                        </div>

                        <div class="filter">
                            <h1 class="h2 text-center"> Huyện</h1>
                            <ul>
                                <li><input type="checkbox" name="district" value="1"> Hội An</li>
                                <li><input type="checkbox" name="district" value="2"> Tam kỳ</li>
                                <li><input type="checkbox" name="district" value="3"> Phú Ninh</li>
                                <li><input type="checkbox" name="district" value="4"> Núi Thành</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-9 dest-page">

                <div class="dest-page-heading">
                        <h1>Khách sạn <?php echo $destination[0]['city']?></h1>
                        <p>Có Tất cả <?php echo $count?> khách sạn</p>
                        <a href="#">Xem bản đồ</a>
                        <hr/>
                </div>

                <div class="dest-page-content">
                <?php foreach ($destination as $i) {?>
                    <div class="dest-item">
                        <div class="img">
                            <img width="100%" src="<?php echo base_url()?>public/images/dedicate/1.png"/>
                        </div>
                        <div class="content">
                            <h1 style="color: #19d3af"><?php echo $i['destinationName']?></h1>
                            <p>
                                <?php for($j = 0; $j < $i['star']; $j++){?>
                                <i class="fas fa-star"></i>
                                <?php }?>
                            </p>
                            <a href="#"><?php echo $i['destinationAddress']." ".$i['city']?></a>
                            <p><b style="color: #fd7e14"><?php echo $i['destinationName']?></b> có đội ngũ nhân viên thân thiện và phục vụ nhiệt tình, trang thiết bị hiện đại cùng nội thất bài trí rất bắt mắt. Khách sạn nằm ở trung tâm nên thuận tiện đi lại và tham quan.</p>
                            <p><script type="text/javascript"> document.write(formatCurrency(<?php echo $i['MinPrice']?> + ''));</script> đ</p>
                            <a class="button" href="#">Xem Phòng</a>
                        </div>
                    </div>
                <?php }?>
                </div>

                <br>

                <div class="product-page">
                    <div class="container">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    .product-page .pagination{
        display: flex;
        justify-content: center;
    }
    .activepage{
        color: red !important;
        font-weight: 500;
        font-size: 18px;
    }
</style>
<style>
    .filter{
        box-shadow: 3px 3px 10px gray;
    }
    .filter h1{
        color: #ffffff;
        background-color: #19d3af;
        padding-top: 5px;
        padding-bottom: 5px;
        font-size: 30px;
    }
    .filter ul{
        list-style: none;
        padding: 10px;
        font-size: 18px;
    }
    .filter ul li span{
        margin-left: 10px;
    }
    .filter ul li input{
        padding: 20px;
        cursor: pointer;
    }
    .dest-page{
        padding-left: 40px;
        padding-right: 40px;
    }
    .dest-page-heading{
        width: 100%;
    }
    .dest-item{
        display: flex;
        padding: 10px;
        box-shadow: 0px 3px 5px #ccc;
    }
    .dest-item .img{
        width: 30%;
    }
    .dest-item .content{
        width: 70%;
        padding-left: 20px;
    }
    .dest-item .content h1{
        font-size: 30px;
        text-transform: capitalize;
    }
    .dest-item .content .button{
        color: #ffffff;
        background-color: #19d3af;
        text-decoration: none;
        padding: 16px 25px;
        margin-bottom: 10px;
        display: inline-block;
    }
    .fa-star:before {
    color: yellow;
    }
    
</style>
<script type="text/javascript">
    // window.onload = function(){
    //     alert('page ready 2');
    // }

    function arrChecked(nameCheckBox)
    {
        var checkbox = document.getElementsByName(nameCheckBox);
        var arrChecked = [];
        for (var i = 0; i < checkbox.length; i++){
            if (checkbox[i].checked === true){
                arrChecked.push(checkbox[i].value);
            }
        }
        return arrChecked;
    }

    function filter()
    {
        // $('#listSanPham').children().remove();
        //gửi các array sang ulr fillter
        // $.ajax({
        // type    : 'POST',
        // url     : '<?php echo base_url();?>handling/fillter',
        // dataType: 'json',
        // data    : {
        //             city : $('#autocomplete').val(),
        //             timeCheckIn : $('#timeCheckIn').val(),
        //             timeCheckOut : $('#timeCheckOut').val(),
        //             numRoom : $('#numRoom').val(),
        //             typeDes : JSON.stringify(arrChecked('typeDes')),              
        //             price : JSON.stringify(arrChecked('price')),              
        //             star : JSON.stringify(arrChecked('star')),              
        //             servive : JSON.stringify(arrChecked('servive')),              
        //             convenience : JSON.stringify(arrChecked('convenience')),              
        //             district : JSON.stringify(arrChecked('district')),
        //           }
        // });
        // .done(function(data){
        // debugger;
        // console.log(data);
        // for (var i = 0; i < data.length; i++) {
        //         //tạo khối html sản phẩm
        //         var item = '<div class="col-md-4 col-sm-6 ctsp">' +
        //                     '<div class="thumbnail">' +
        //                         '<img src="<?php echo base_url();?>images/' + data[i].image + '">' +
        //                         '<div class="caption">' +
        //                             '<h3>' + data[i].ten_sanpham + '</h3>' +
        //                             '<p class="httt">Giá: ' + data[i].price + '</p>' +
        //                             '<p>' +
        //                                 '<a href="<?php echo base_url()?>controlpage/dathang/' + data[i].id_sanpham + '" class="btn btn-primary" role="button" data-toggle="tooltip" title="Đặt hàng" data-placement="bottom">Đặt hàng</a>' +
        //                                 '<a href="#" class="btn btn-default" role="button">Chi Tiết</a>' +
        //                             '</p>' +
        //                         '</div>' +
        //                     '</div>' +
        //                 '</div>';
        //         //add vào html
        //         if(document.getElementById("listSanPham").innerHTML != null)
        //             document.getElementById("listSanPham").innerHTML += item;
        //         else
        //             document.getElementById("listSanPham").innerHTML = item;
        //     }
        // });
    }


    //
    $('.filter li').on('click', function(){
        $(this).children('input').prop('checked',!$(this).children('input').prop('checked'));
        filter();
    });


    function action2(){
        var page = "1";
        $(".product-page .page-item").each(function(index){
            if($(this).hasClass("activepage")) {
                page = $(this).text();
            }
        });
              
        $(".product-page .row").children().remove();
        var search = $("#search-text").val();
        var portfolios = [];
            
        $(".filter-list input").each(function(index){
            if($(this).prop("checked") == true){
                var id = $(this).val();
                portfolios.push(id);
            }
        });
            
        var price = $(".fitler-price select").val();
        $.ajax({
            url: '<?php echo base_url() ?>Handling/filter',
            type: 'POST',
            dataType: 'json',
            data: {
                portfolios: JSON.stringify(portfolios),
                price: price,
                search: search,
                page: page,
            }
        })
            .done(function(data){
            for (var product of data.limit) {
                renderProduct(product);
            }
            
            
        })      
    }

    function show($i){
        deleteActive();
        $(".product-page .page-item:nth-child("+$i+")").addClass("activepage");
        $(".product-page .row").children().remove();
        action2();
    }

    function renderProduct(product){
        $item = "";
        if(product.quantumDiscount != null){
            var sellprice = product.price * (1 - product.quantumDiscount/100);
            sellprice = sellprice.toString();
            $item = $('<div class="col-md-4">'+
                  '<div class="product-dec">'+
                      '<a href="<?php echo base_url()?>Handling/chitietsanpham/'+product.id+'">'+
                        '<div class="product-page-item">'+
                            '<div class="img">'+
                                '<img width="100%" src="<?php echo base_url() ?>public/images/products/'+product.image+'"/>'+
                            '</div>'+
                            
                            '<div class="content text-center">'+
                                '<h1 class="h5">'+product.name+'</h1>'+
                                '<span class="pricesell">'+formatCurrency(sellprice)+' đ</span>'+
                                '<span class="price line">'+formatCurrency(product.price)+' đ</span>'+
                            '</div>'+
                            '<div class="discount-ribbon">'+
                                '<div class="discount-ribbon-inner">-'+product.quantumDiscount+'%</div>'+
                            '</div>'+
                        '</div>'+
                        '</a>'+
                        '<div class="icon">'+
                            '<span><i class="fas fa-heart"></i></span>'+
                            '<span><i class="fas fa-cart-plus"></i></span>'+
                            '<span><button onclick="order('+product.id+')"><i class="fas fa-cart-plus"></button></i></span>'+
                        '</div>'+
                    '</div>'+
                    '</div>');
            
        }else{
            var rrp = product.rrp;
            if(rrp == 0){
                rrp = "";
            }
            else{
                rrp = formatCurrency(rrp.toString());
                rrp += "đ";
            }
            $item = $('<div class="col-md-4">'+
                  '<div class="product-dec">'+
                      '<a href="<?php echo base_url()?>Handling/chitietsanpham/'+product.id+'">'+
                        '<div class="product-page-item">'+
                            '<div class="img">'+
                                '<img width="100%" src="<?php echo base_url() ?>public/images/products/'+product.image+'"/>'+
                            '</div>'+
                            
                            '<div class="content text-center">'+
                                '<h1 class="h5">'+product.name+'</h1>'+
                                '<span class="price">'+formatCurrency(product.price)+' đ</span>'+
                                '<span class="rrp line">'+rrp+'</span>'+
                            '</div>'+
                        '</div>'+
                        '</a>'+
                        '<div class="icon">'+
                            '<span><i class="fas fa-heart"></i></span>'+
                            '<span><i class="fas fa-cart-plus"></i></span>'+
                            '<span><button onclick="order('+product.id+')"><i class="fas fa-cart-plus"></button></i></span>'+
                        '</div>'+
                    '</div>'+
                    '</div>');
            
        }
        $a = $(".product-page .row");
        $a.append($item);
        
        }

    function deleteActive(){
        $(".product-page .page-item").each(function(index){
            $(this).removeClass("activepage");
        })
    }

</script>