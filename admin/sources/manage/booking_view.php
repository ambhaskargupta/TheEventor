<?php
if($logSts != "IN"){
    exit();
}
else{
    if(!empty($_GET['id'])){
    ?>
    <div class="table-responsive" style="width:auto">
        <?php
        $venueSql = "SELECT * FROM $bookingTable WHERE id  = $_GET[id]";
        $venueListRs = $function->fetch_data($venueSql);
        $sl=1;
        foreach($venueListRs as $echbooking){
            ?>
        Name<?php echo $echbooking['name']; ?>
        Email<?php echo $echbooking['email']; ?>
        Mob<?php echo $echbooking['mob']; ?>
        Address<?php echo $echbooking['mob']; ?>
        Service Type<?php echo $service_arr[$echbooking['service_type']]; ?>
        Event Name<?php echo $echbooking['event_name']; ?>
        From Date<?php echo $echbooking['date_time_from']; ?>
        To Date<?php echo $echbooking['date_time_to']; ?>
        Type<?php echo $venue_arr[$echbooking['type']]; ?>
        Venue<?php echo $venue_arr[$echbooking['venue_id']]; ?>
        Ticket Stock<?php echo $echbooking['ticket_stock']; ?>
        Ticket Price<?php echo $echbooking['ticket_price']; ?>
        Addtional Message<?php echo $echbooking['addtional_message']; ?>
        <?php
        }
        ?>
    </div>
    <?php
    }
}
?>