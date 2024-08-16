<?php
$msg = '';

$name = '';
$email = '';
$primary_mob = '';
$secondary_mob = '';
$address = '';
$type = 'free';
$bookingvenueid = '';
$show = 1;

if(!empty($_POST)){
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['primary_mob']) || empty($_POST['address']) || empty($_POST['bookingvenueid'])){
        $msg = $lang['fill_all_details'];
    }
    else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $primary_mob = $_POST['primary_mob'];
        $secondary_mob = $_POST['secondary_mob'];
        $address = $_POST['address'];
        $bookingvenueid = $_POST['bookingvenueid'];
        
        $ticketPrice = $function->single_value("SELECT ticket_price FROM $bookingTable WHERE id = $bookingvenueid");
        if($ticketPrice > 0){
            $type = 'paid';
        }
        $ticket_id = 'TCKT'.$function->unique_number(7);
        while(count($function->fetch_data("SELECT ticket_id FROM $ticketTable WHERE ticket_id = '".$ticket_id."'")) > 0) { 
                    $ticket_id = 'TCKT'.$function->unique_number(7);
                 }
        $addTicket = "INSERT INTO $ticketTable(name, email, mob, mob2, address, bookingvenueid, type, ticket_id, booking_date)
            VALUES('$name', '$email', '$primary_mob', '$secondary_mob', '$address', '$bookingvenueid', '$type', '$ticket_id', '$currentDateTime')";
        $tcktbookingEx = $function->sql_query($addTicket);
        if($tcktbookingEx){
            $show = 0;
            if($type == 'paid'){
                $msg = '<br><center><i class="fa fa-spinner fa-spin" style="font-size:50px"></i></center><br><h3>Processing to Payment Portal</h3>';
                $msg .= '<center><h5>Do not Close or refresh the page</h5></center>';
                $msg .= '<form action="../payment/pay.php" method="post" name="tcktpayform">
                        <input type="hidden" name="orederId" value="'.$ticket_id.'">
                        <input type="hidden" name="price" value="'.$ticketPrice.'">
                        <input type="hidden" name="customername" value="'.$name.'">
                        <input type="hidden" name="email" value="'.$email.'">
                        <input type="hidden" name="phone" value="'.$primary_mob.'">
                        <input type="hidden" name="type" value="ticket">
                    </form>
                    <script>$("form[name=\'tcktpayform\']").submit();</script>';
            }
            else{
                $msg = 'Please Visit the respestive venue';
                
            }
        }    
    }
}
echo $msg;
if($show == 1){
?>
<form class="custom-form ticket-form mb-5 mb-lg-0" action="javascript:void(0)" method="post" role="form" id="buyTicketForm">
    <h2 class="text-center mb-4">Buy Ticket</h2>
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
                <input type="tel" class="form-control" name="primary_mob" placeholder="Primary Mobile">
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <input type="tel" class="form-control" name="secondary_mob" placeholder="Secondary Mobile">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <input type="text" name="address" id="ticket-form-email"  class="form-control" placeholder="Your Address">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
                <select class="form-select form-control" name="bookingvenueid" id="venue" onchange="ticketprice();">
                    <option value="" selected>Select Type First</option>
                    <?php
                    $venue_arry = array();
                    $grspSql = "SELECT * FROM $venueTable";
                    $grpsRs = $function->fetch_data($grspSql);
                    foreach ($grpsRs as $easchgrp) {
                      $venue_arry[$easchgrp['id']] = $easchgrp['venue'];
                    }
                    
                    $list = array();
                    $grpSql = "SELECT * FROM $bookingTable WHERE approve = 1";
                    $grpRs = $function->fetch_data($grpSql);
                    foreach ($grpRs as $echlist) {
                        $list[$echlist['id']] = $echlist['event_name'].'('.$venue_arry[$echlist['venue_id']].')';
                    }
                    
                    foreach ($list as $key => $value) {
                    ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <input type="text" name="price" id="price" class="form-control" placeholder="Price Shows Here" disabled="disabled">
            </div>
        </div>
    </div>
    <div class="ticket-form-body">
        <div class="col-lg-4 col-md-10 col-8 mx-auto">
            <button type="submit" name="submit" id="submit" onclick="buyTicket();" class="form-control">Get Ticket</button>
        </div>
    </div>
</form>
<script>
function ticketprice(){
    var ticketvenueId = $('#venue').val();
        $.ajax({
           type:'GET',
           url:'index_ajax.php?page=form_data_load&case=ticketprice',
           data:'ticketvenueId='+ticketvenueId,
           success: function(data){
                        $('#price').val(data);
                }
            });
        }
</script>
<?php
}
?>