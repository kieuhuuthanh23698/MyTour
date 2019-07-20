<div class="searchDest">
        <div class="container text-center">
            <div id="prefetch">
                <i class="fas fa-bed"></i>
                <input name="search_box" id="autocomplete" class="typeahead" style="width: 250px;" type="search" placeholder="Nhập tên khách sạn, địa danh...">
            </div>
<style type="text/css">
    .dropdown-menu a:hover{
        color: #67DDE8;
    }
</style>
<script type="text/javascript">
var result = Array();

window.onload = function(){
    //GET JSON ALL CITIES
    var URL = 'https://thongtindoanhnghiep.co/api/city';
    $.ajax({
        dataType: 'json',
        url: 'http://localhost:8080/MyTour/admin_partner/inforPartner/getAPI',
        data: {url :URL},
        type: 'GET',
        success : success,
    });

}

function success(a){
    //ADD ALL CITIES INTO ARRAY RESULT
    for (var i = 0; i < a.LtsItem.length; i++) {
        //result.push({title: a.LtsItem[i]['Title'], type: "City"}) 
        result.push(a.LtsItem[i]['Title']) 
    }       
}

$("#autocomplete").typeahead({  
source:result,
//items: 5,
highlight: false,
menu: '<ul class="typeahead dropdown-menu" role="listbox"></ul>',
item: '<li style="width:300px; background-color:#17a2b!important; margin-top:10px;"><a class="dropdown-item" style=":hover:rgba(0, 123, 255, 0.25) 2px solid; width:150px; float: left;" href="#" role="option"></a><div style="float: right;float: right;margin-right: 10px;background-color: aliceblue;border-radius: 5px;padding: 2px 2px 2px 2px;width: 104px;height: 29px;text-align: center;color: black;font-weight: 100;">Thành phố</div></li>',
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


</script>
            <div class="room-time">
                <i class="far fa-calendar"></i>
                <input type="text" id="timeCheckIn"/>
                <i class="far fa-calendar"></i>
                <input type="text" id="timeCheckOut"/>
            </div>
            <div>
                <input id="numRoom" type="number" value="1" min="1" max="10" />
                <span>Phòng</span>
            </div>
            <div id="search">
                <a>Search</a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $('#search').on('click',function(){
        localStorage.setItem("city", $('#autocomplete').val());
        localStorage.setItem("timeCheckIn", $('#timeCheckIn').val());
        localStorage.setItem("timeCheckOut", $('#timeCheckOut').val());
        localStorage.setItem("numRoom", $('#numRoom').val());
        window.location.href = '<?php echo base_url()?>handling/search';
    });
</script>

<script>
    $(function(){
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        $('#timeCheckIn').val(now.getDate() + '/' + (now.getMonth() + 1) + '/' +  now.getFullYear());
        $('#timeCheckOut').val((now.getDate()) + '/' + (now.getMonth() + 1) + '/' +  now.getFullYear());
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
</script>
<style type="text/css">
     #addRoom .room-time input{
        width: 50%;
    }
    .ui-datepicker table {
        background: white;
    }


</style>
<style>
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
    }
</style>     