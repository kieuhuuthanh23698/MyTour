<script type="text/javascript">
    //ĐỊNH DẠNG TIỀN
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return  n2.split('').reverse().join('');
    }
</script>
<!--************************************************* MAIN ********************************************-->
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
                                    <input type="checkbox" name="price" value="2"> Từ 1 - 3 triệu
                                </li>
                                <li>
                                    <input type="checkbox" name="price" value="3"> Trên 3 triệu
                                </li>
                                
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input id="orderBy1" type="radio" class="form-check-input" name="optradio" value="0">Giá tăng dần
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input id="orderBy2" type="radio" class="form-check-input" name="optradio" value="1">Giá giảm dần
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
                                <?php foreach ($convenienceDes as $i) {?>
                                <li><input type="checkbox" name="convenience" value="<?php echo($i['id_convenDes']);?>"> <?php echo($i['name_convenDes']);?></li>
                                <?php }?>
                            </ul>
                        </div>

                        <div class="filter">
                            <h1 class="h2 text-center"> Tiện nghi khách sạn</h1>
                            <ul>
                                <?php foreach ($serviceExtra as $i) {?>
                                <li><input type="checkbox" name="service" value="<?php echo($i['id_serviceExtra']);?>"> <?php echo($i['serviceExtraName']);?></li>
                                <?php }?>
                            </ul>
                        </div>

                        <?php if(isset($district)){?>
                        <div class="filter">
                            <h1 class="h2 text-center"> Huyện</h1>
                            <ul>
                            <?php foreach ($district as $i) {?>
                                <li><input type="checkbox" name="district" value="<?php echo($i['ID'])?>"> <?php echo($i['Title']);?></li>
                            <?php }?>
                            </ul>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="col-md-9 dest-page">

                <div class="dest-page-heading">
                        <h1>Kết quả tìm kiếm với : <?php echo $search_box;?></h1>
                        <p>Có Tất cả <?php echo $count;?> khách sạn</p>
                        <a href="#">Xem bản đồ</a>
                        <hr/>
                </div>

                <div class="dest-page-content">
                <?php if($count > 0 ){ foreach ($destination as $i) {?>
                    <br>
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
                            <a href="#"><?php echo $i['destinationAddress']." - ".$i['city']?></a>
                            <p><b style="color: #fd7e14"><?php echo $i['destinationName']?></b> có đội ngũ nhân viên thân thiện và phục vụ nhiệt tình, trang thiết bị hiện đại cùng nội thất bài trí rất bắt mắt. Khách sạn nằm ở trung tâm nên thuận tiện đi lại và tham quan.</p>
                            <p  style="color:#17a2b8"><script type="text/javascript"> document.write(formatCurrency(<?php echo $i['price']?> + ''));</script> đ</p>
                            <a class="button" href="<?php echo base_url().'handling/destinationDetail?idDes='.$i['id_dest'].'&dateFrom='.$dateFrom.'&dateTo='.$dateTo;?>">Xem Phòng</a>
                        </div>
                    </div>
                <?php }}?>
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

    function arrChecked(nameCheckBox)
    {
        var checkboxes = document.getElementsByName(nameCheckBox);
        var arrChecked = [];
        for (var i = 0; i < checkboxes.length; i++){
            if (checkboxes[i].checked === true){
                arrChecked.push(checkboxes[i].value);
            }
        }
        return arrChecked;
    }

    function valChecked(nameRadioButton)
    {
        debugger;
        var radioButtons = document.getElementsByName(nameRadioButton);
        var valChecked = 0;
        for (var i = 0; i < radioButtons.length; i++){
            if (radioButtons[i].checked === true){
                valChecked = radioButtons[i].value;
            }
        }
        //alert('radio val : ' + valChecked);
        return valChecked;
    }


    function filter(PAGE)
    {

        //alert("vào hàm filter");
        //alert("city : " + $('#autocomplete').val());
        $('.dest-page-content').text('');
        //gửi các array sang ulr fillter
        $.ajax({
        type    : 'POST',
        url     : '<?php echo base_url();?>handling/filter',
        dataType: 'json',
        data    : {
                    page : PAGE,
                    city : $('#autocomplete').val(),
                    timeCheckIn : $('#timeCheckIn').val(),
                    timeCheckOut : $('#timeCheckOut').val(),
                    numRoom : $('#numRoom').val(),
                    typeDes : JSON.stringify(arrChecked('typeDes')),              
                    price : JSON.stringify(arrChecked('price')),
                    orderBy : valChecked('optradio'),
                    star : JSON.stringify(arrChecked('star')),              
                    service : JSON.stringify(arrChecked('service')),              
                    convenience : JSON.stringify(arrChecked('convenience')),              
                    district : JSON.stringify(arrChecked('district')),
                  },
        success: function(data){
        //alert(data.query);
        $('.dest-page-heading h1').text('Kết quả tìm kiếm với : ' + data.search_box);
        $('.dest-page-heading p').text('Có tất cả ' + data.count + ' khách sạn.');
        renderPages(data.count);
        for (var i = 0; i < data.destination.length; i++) {
                //tạo khối html sản phẩm
                var item = '<div class="dest-item">' +
                        '<div class="img">' +
                            '<img width="100%" src="<?php echo base_url()?>public/images/dedicate/1.png"/>' +
                        '</div>' +
                        '<div class="content">'+
                            '<h1 style="color: #19d3af">' + data.destination[i].destinationName + '</h1>'+
                            '<p>';
                            for(var j = 0; j < data.destination[i].star; j++){
                                    item += '<i class="fas fa-star"></i>';
                            }
                            item += '</p>' +
                            '<a href="#">' + data.destination[i].destinationName + " - " + data.destination[i].city +'</a>' +
                            '<p><b style="color: #fd7e14"></b> có đội ngũ nhân viên thân thiện và phục vụ nhiệt tình, trang thiết bị hiện đại cùng nội thất bài trí rất bắt mắt. Khách sạn nằm ở trung tâm nên thuận tiện đi lại và tham quan.</p>' +
                            '<p style="color:#17a2b8">' + formatCurrency(data.destination[i].MinPrice) + ' đ</p><a class="button" href="<?php echo base_url()?>handling/destinationDetail/' + data.destination[i].id_destination + '/' + $('#timeCheckIn').val() +'/' + $('#timeCheckOut').val() +'">Xem Phòng</a></div></div>';
                $('.dest-page-content').append(item);
            }
        },
        });
    }


    //MỖI LẦN CLICK VÀO CÁC FILTER THÌ XÓA PAGES, FILTER VỀ RESULT VÀ VẼ LẠI PAGES
    $('.filter li').on('click', function(){
        //$(".product-page .row").children().remove();
        $(this).children('input').prop('checked',!$(this).children('input').prop('checked'));
        //alert('click filter id 1');
        filter(1);
    });


    $('#orderBy1').on('click', function(){
        $(this).prop('checked',!$(this).children('input').prop('checked'));
        //alert('click filter id 1');
        filter(1);
    });


    $('#orderBy2').on('click', function(){
        $(this).prop('checked',!$(this).children('input').prop('checked'));
        //alert('click filter id 2');
        filter(1);
    });


    $('#timeCheckIn').on('change', function(){
        filter(1);
    })

    $('#timeCheckOut').on('change', function(){
        filter(1);
    })

    //chưa cần sử dụng
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
        //alert("show " + $i);
        $(".product-page .page-item").each(function(index){
            $(this).removeClass("activepage");
        })
        $(".product-page .page-item:nth-child("+$i+")").addClass("activepage");
        filter($i);
    }

    function renderPages(n){
        //alert("Render page " + n);
        $(".product-page .pagination li").remove();
        var quantumProduct = 5;
        var quantumPage = Math.ceil( n / quantumProduct);
        for(var i=1; i<= quantumPage; i++){
            $item = $('<li class="page-item page-link" onclick="show('+i+')">'+i+'</li>');
            $(".product-page .pagination").append($item);
        }
        $(".product-page .pagination li:first-child").addClass("activepage");
    }

    $(document).ready(function(){
        //NẾU RESET PAGE THÌ LÀM RỖNG SESSION
        if(document.referrer == '' || document.referrer == '<?php echo base_url()?>handling/search')
        {
            localStorage.setItem("city", '');
            localStorage.setItem("numRoom",'1');
        }
        //TẠO PAGES
        renderPages(<?php echo $count?>);
    })

</script>