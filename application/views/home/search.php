<form id="formSearch" method="GET" action="<?php echo(base_url())?>handling/search">
<div class="searchDest max-width">
        <div class="container text-center">
            <div id="prefetch">
                <i class="fas fa-bed"></i>
                <input name="search_box" id="autocomplete" autocomplete="off" class="typeahead" style="width: 250px;" type="search" placeholder="Nhập tên thành phố">
            </div>
            <div class="room-time">
                <i class="far fa-calendar"></i>
                <input type="text" id="timeCheckIn" name="timeCheckIn" readonly="readonly" />
                <i class="far fa-calendar"></i>
                <input type="text" id="timeCheckOut" name="timeCheckOut" readonly="readonly" />
            </div>
            <div>
                <input id="numRoom" name="numRoom" type="number" required value="1" min="1" max="10" />
                <span>Phòng</span>
            </div>
            <div id="search">
                <a>Search</a>
            </div>
        </div>
</div>
<style type="text/css">
    .dropdown-menu a:hover{
        color: #67DDE8;
    }
    #addRoom .room-time input{
        width: 50%;
    }
    .ui-datepicker table {
        background: white;
    }
    .searchDest{
        background-color: #2d3d4e;
        height: 100px;
        
    }
    .searchDest>div{
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .searchDest>div>div{
        background-color: #fff;
        padding: 5px 20px;
        margin-right: 10px;
        border-radius: 2px;
    }
    .searchDest>div>div i{
        font-size: 22px;
        
    }
    .searchDest>div>div input{
        padding: 6px;
        border: 0;
    }
    .searchDest>div>div:last-child{
        border: 1px solid green;
        padding: 10px 25px;
        background-color: #19d3af;
    }
    .searchDest>div>div:last-child a{
        color: #ffffff;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<script type="text/javascript">

//ĐƯA DỮ LIỆU VÀO LOCAL STORAGE
$('#search').on('click',function(){
    if($('#autocomplete').val() == '')
        alert("Bạn chưa nhập tên thành phố !");
    else
    {
        localStorage.setItem("city", $('#autocomplete').val());
        localStorage.setItem("timeCheckIn", $('#timeCheckIn').val());
        localStorage.setItem("timeCheckOut", $('#timeCheckOut').val());
        localStorage.setItem("numRoom", $('#numRoom').val());
        $('#formSearch').submit();
    }
});


//SET VALUE CHO DATE PICKER
$(function(){
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    $('#timeCheckIn').val(now.getDate() + '/' + (now.getMonth() + 1) + '/' +  now.getFullYear());
    $('#timeCheckOut').val((now.getDate() + 1) + '/' + (now.getMonth() + 1) + '/' +  now.getFullYear());
    $('#timeCheckIn').datepicker({
        dateFormat: "dd/mm/yy",
        minDate: new Date(),
        onSelect: function(date) {
            $( "#timeCheckOut" ).datepicker("option", "minDate", date );
        }
    });
    $('#timeCheckOut').datepicker({
        dateFormat: "dd/mm/yy",
        minDate: new Date(),
    });


})

//LOAD DỮ LIỆU CHO TYPE HEAD, SEARCH BAR
var result = Array();

window.onload = function(){
    //GET JSON ALL CITIES
    var URL = 'https://thongtindoanhnghiep.co/api/city';
    $.ajax({
        dataType: 'json',
        url: '<?php echo(base_url());?>admin_partner/inforPartner/getAPI',
        data: {url :URL},
        type: 'GET',
        success : success,
    });
    //SET VALUE CHO SEARCH
    if(localStorage.getItem("city") != " ")
        $('#autocomplete').val(localStorage.getItem("city"));
    if(localStorage.getItem("timeCheckIn") != "")
        $('#timeCheckIn').val(localStorage.getItem("timeCheckIn"));
    if(localStorage.getItem("timeCheckOut") != "")
        $('#timeCheckOut').val(localStorage.getItem("timeCheckOut"));
    if(localStorage.getItem("numRoom") != "")
        $('#numRoom').val(localStorage.getItem("numRoom"));


    $('.dedicate-content a').each(function(){
           $(this).attr('href', $(this).attr('href') + '&dateFrom=' + $('#timeCheckIn').val() +'&dateTo=' + $('#timeCheckOut').val()); 
        });
}

function success(a){
//ADD ALL CITIES INTO ARRAY RESULT
    for (var i = 0; i < a.LtsItem.length - 1; i++) {
        //result.push({title: a.LtsItem[i]['Title'], type: "City"}) 
        result.push(a.LtsItem[i]['Title'])  
        $('.abc').append("<a href='<?php echo base_url()?>handling/search?search_box=" + a.LtsItem[i]['Title'] + "'>" + a.LtsItem[i]['Title'] + "</a>");
        $('.abc a:last-child').bind('click',function(){
            //alert($(this).text());
            localStorage.setItem("city", $(this).text());
        });
        if(i < a.LtsItem.length - 2)
            $('.abc').append(", ");

    }
    $.ajax({
        dataType: 'json',
        url: '<?php echo(base_url());?>handling/hotels',
        data: {},
        type: 'GET',
        success : function(data){
            for (var i = 0; i < data.length; i++) {
                //result.push({title: a.LtsItem[i]['Title'], type: "City"}) 
                result.push(data[i]['destinationName']);
            }
        },
    });       
}

$("#autocomplete").typeahead({  
    source:result,
    //items: 5,
    highlight: false,
    menu: '<ul class="typeahead dropdown-menu" role="listbox"></ul>',
    item: '<li style="width:500px; background-color:#17a2b!important; margin-top:10px;"><a class="dropdown-item" style=":hover:rgba(0, 123, 255, 0.25) 2px solid; width:150px; float: left;" href="#" role="option"></a><div style="float: right;float: right;margin-right: 10px;background-color: aliceblue;border-radius: 5px;padding: 2px 2px 2px 2px;width: 104px;height: 29px;text-align: center;color: black;font-weight: 100;">Thành phố</div></li>',
    //headerHtml: '<li class="dropdown-header"></li>',
    //headerDivider: '<li class="divider" role="separator"></li>',
    //itemContentSelector:'span',
    // minLength: 1,
    // scrollHeight: 0,
    // autoSelect: true,
    // afterSelect: $.noop,
    // afterEmptySelect: $.noop,
    // addItem: false,
    delay: 2,
});

$('#numRoom').on('change',function(e){
    if (e.target.value == '' && e.target.value == '0') {
      e.target.value = 1;
    }
  });

</script>