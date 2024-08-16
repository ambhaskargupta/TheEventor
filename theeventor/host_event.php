<?php
$msg = '';
$show = 1;
$name = '';
$email = '';
$primary_mob = '';
$secondary_mob = '';
$address = '';
$service_type = '';
$event_name = '';
$type = '';
$venue_id = '';
$ticket_stock = '';
$ticket_price = '';
$addtional_message = '';
$aprove = 0;
$pending = 1;
$cancel = 0;


if(!empty($_POST)){
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['primary_mob']) || empty($_POST['address']) || empty($_POST['event_name']) || !isset($_POST['type']) || empty($_POST['venue'])){
        $msg = $lang['fill_all_details'];
    }
    else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $primary_mob = $_POST['primary_mob'];
        $secondary_mob = $_POST['secondary_mob'];
        $address = $_POST['address'];
        $service_type = $_POST['service_type'];
        $event_name = $_POST['event_name'];
        $date_time_from = $_POST['date_time_from'].':00';
        $date_time_to = $_POST['date_time_to'].':00';
        $type = $_POST['type'];
        $venue_id = $_POST['venue'];
        $ticket_stock = $_POST['ticket_stock'];
        $ticket_price = $_POST['ticket_price'];
        $addtional_message = $_POST['addtional_message'];
        
        $dupSql = "SELECT * FROM bookings WHERE date_time_from <= '$date_time_from' AND date_time_to >= '$date_time_to' AND venue_id = '$venue_id' and approve = 1";
        $dupSqlRs = $function->sql_query($dupSql);
        if ($dupSqlRs->rowCount() > 0) {
            $msg = '<div class="alert alert-danger mt-3"><i class="fa fa-danger" style="font-size:24px"></i><strong>The Time Slot already Booked !</strong></div>';
        }
        else {
            $addBooking = "INSERT INTO $bookingTable(name, email, mob, mob2, address, service_type, event_name, date_time_from, date_time_to, type, venue_id, ticket_stock, ticket_price, addtional_message, approve, pending, cancel)
                VALUES('$name', '$email', '$primary_mob', '$secondary_mob', '$address', '$service_type', '$event_name', '$date_time_from', '$date_time_to', '$type', '$venue_id', '$ticket_stock', '$ticket_price', '$addtional_message', '$aprove', '$pending', '$cancel')";
            $bookingEx = $function->sql_query($addBooking);
            if($bookingEx){
                $show = 0;
                $rateSql = "SELECT rate FROM $venueTable WHERE id = $venue_id";
                $rateRs = $function->single_value($rateSql);
                if($rateRs > 0){
                    $lastId = $function->single_value("SELECT MAX(id) FROM $bookingTable");
                    $unique_id = $function->unique_number(7);
                    while(count($function->fetch_data("SELECT unique_id FROM $bookingTable WHERE unique_id = '".$unique_id."'")) > 0) { 
                        $unique_id = $function->unique_number(7);
                     }
                    if($function->sql_query("UPDATE $bookingTable SET unique_id = '$unique_id' WHERE id = $lastId")){
                        $msg = '<br><center><i class="fa fa-spinner fa-spin" style="font-size:50px"></i></center><br><h3>Processing to Payment Portal</h3>';
                        $msg .= '<center><h5>Do not Close or refresh the page</h5></center>';
                        $msg .= '<form action="../payment/pay.php" method="post" name="payform">
                                    <input type="hidden" name="orederId" value="'.$unique_id.'">
                                    <input type="hidden" name="price" value="'.$rateRs.'">
                                    <input type="hidden" name="customername" value="'.$name.'">
                                    <input type="hidden" name="email" value="'.$email.'">
                                    <input type="hidden" name="phone" value="'.$primary_mob.'">
                                </form>
                                <script>$("form[name=\'payform\']").submit();</script>';
                    }
                }
                else{
                    echo 'Your Booking Successful';
                }
            }
        }
    }    
}
echo $msg;
if($show == 1){
?>
<div class="col-md-12">
<form class="custom-form ticket-form mb-5 mb-lg-0" action="javascript:void(0)" method="post" id="host_form" style="width:auto;">
    <h2 class="text-center mb-4">Host Event</h2>
    <div class="ticket-form-body">
        <div class="row">
            <h6>Your Details</h6>
            <div class="col-lg-6 col-md-6 col-12">
                <input type="text" name="name" id="ticket-form-name" class="form-control" placeholder="Full name">
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <input type="email" name="email" id="ticket-form-email" class="form-control" placeholder="Email address">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <input type="text" class="form-control" name="primary_mob" placeholder="Primary Mobile">
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <input type="text" class="form-control" name="secondary_mob" placeholder="Secondary Mobile">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <input type="text" name="address" id="ticket-form-email"  class="form-control" placeholder="Your Address">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-7">
            <h6>Event Details</h6>
        </div>
        <div class="col-lg-5 col-md-5 col-5">
            <input class="" type="radio" name="service_type" id="free_paid" value="0" checked="checked"> Free Event
            &nbsp;&nbsp;&nbsp;
            <input class="" type="radio" name="service_type" id="free_paid" value="1"> Paid Event
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <input type="text" name="event_name" id="ticket-form-name" class="form-control" placeholder="Event Name">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
                <input type="text" class="form-control" id='date_time_from' name="date_time_from" placeholder="From" autocomplete="off"/>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <input type="text" name="date_time_to" id="date_time_to" class="form-control" placeholder="To" autocomplete="off">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
                <select class="form-select form-control" name="type"  id="type" onchange="loadVenue();">
                    <option value="" selected>Select Type</option>
                    <?php
                    foreach ($venue_arr as $key => $value) {
                    ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <select class="form-select form-control" name="venue" id="venue" onchange="ratechk();">
                    <option value="" selected>Select Type First</option>
                </select>
            </div>
        </div>
        <div class="row" id="paid_service">
            <div class="col-lg-6 col-md-6 col-6">
                <input type="number" name="ticket_stock" id="ticket_stock" class="form-control" placeholder="No. of Stock Tickets">
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <input type="number" name="ticket_price" id="ticket_price" class="form-control" placeholder="Ticket Price">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <textarea name="addtional_message" rows="3" class="form-control" id="ticket-form-message" placeholder="Additional Request"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-md-10 col-8 mx-auto" id="btns">
            <button type="submit" name="submit" id="submit" onclick="hostEvent();" class="form-control">Host Event</button>
        </div>
</form>
</div>
<script>
$(document).ready(function(){
    $('#paid_service').hide();
    $("input[name='service_type']").click(function() {
        var test = $(this).val();
        if(test == '1'){
            $('#paid_service').slideDown();
        }
        else{
            $('#paid_service').slideUp();
        }
    });
    $('#date_time_from,#date_time_to').datetimepicker();
});

function loadVenue(){
    var a = $('#type').val();
        $.ajax({
           type:'GET',
           url:'index_ajax.php?page=form_data_load&case=venue',
           data:'type='+a,
           success: function(data){
               $('#venue').html(data);
           }
        });
}

function ratechk(){
    var venueId = $('#venue').val();
    $.ajax({
       type:'GET',
       url:'index_ajax.php?page=form_data_load&case=ratechk',
       data:'venueId='+venueId,
       success: function(data){
                if(data > 0){
                    $('#submit').html('Host Event & Pay');
                }
                else{
                     $('#submit').html('Host Event');
                }
            }
        });
}


</script>
<?php
}
?>