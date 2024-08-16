<?php
if($logSts != "IN"){
    exit();
}
else{
?>
<script>
    $(document).ready(function () {
        $(".ajax").colorbox({
            innerWidth:640,
            innerHeight:390
        });
    });

    function loadList() {
        var formdata=$('#filter').serializeArray();
        $.ajax({
            type: "GET",
            cache: false,
            url: "ajax.php?sub=manage&page=ticket_list",
            data:formdata,
            success: function (res) {
                $('#loadList').html(res);
                $(".ajax").colorbox();
                
            }
        });
    }

    
    
    function confirm_process(delid) {
        var a = confirm("Are You Sure to continue ?");
        if(a==true){
            process(delid);
        }else{
         alert('Canceled');   
        }
    }
    
    function process(delid) {
        $.ajax({
            type: "GET",
            cache: false,
            url: "ajax.php?sub=manage&page=ticket_add&delid="+delid,
            success: function (data) {
                $.colorbox({html:data});
                loadList();
            }
        });
    }
    
</script>
<section class="section">
          <div class="section-header">
            <div class="col-10">
                <h1>Bookings</h1>
            </div>
            <div class="col-2">
                <!--<a href="index.php?sub=manage&page=booking_add" class="btn btn-info btn-sm">Add Ticket</a>-->
            </div>
          </div>
          <div class="section-body">
              <div class="col-12">
                <div class="card">
                  <div id="loadList" class="card-body p-0"></div>
                </div>
              </div>
            </div>
</section>
<script>loadList();</script>
<?php
}
?>