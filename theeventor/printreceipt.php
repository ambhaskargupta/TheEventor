<?php
if(!empty($razorpay_payment_id)){
    $venue = $function->fetch_data_single("SELECT * FROM $bookingTable WHERE unique_id = '$shopping_order_id'");
    ?>
    <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Print Ticket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container" id="receipt">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order ID : <?php echo $shopping_order_id; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $venue['name']; ?><br>
    					<?php echo $venue['address']; ?><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<?php
                                    $venue_arry = array();
                                    $venue_price = array();
                                    $grspSql = "SELECT * FROM $venueTable";
                                    $grpsRs = $function->fetch_data($grspSql);
                                    foreach ($grpsRs as $easchgrp) {
                                      $venue_arry[$easchgrp['id']] = $easchgrp['venue'];
                                      $venue_price[$easchgrp['id']] = $easchgrp['rate'];
                                    }
                                ?>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Onlline<br>
    					Treansaction ID : <?php echo $razorpay_payment_id; ?><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo $venue['payment_date']; ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Booking Details</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td class="text-center"><strong>Event Name</strong></td>
                                        <td class="text-center"><strong>Venue</strong></td>
                                        <td class="text-center"><strong>Date From</strong></td>
                                        <td class="text-center"><strong>Date To</strong></td>
                                        <td class="text-right"><strong>Amount</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><?php echo $venue['event_name']; ?></td>
                                        <td class="text-center"><?php echo $venue_arry[$venue['venue_id']]; ?></td>
                                        <td class="text-center"><?php echo $venue['date_time_from']; ?></td>
                                        <td class="text-center"><?php echo $venue['date_time_to']; ?></td>
                                        <td class="text-right"><?php echo $venue_price[$venue['venue_id']]; ?></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>
<script>
    var qrcode = new QRCode("qrcode","<?php echo $qrcode; ?>");
</script>
<button class="" onclick="printDiv('receipt')">Print Ticket</button>
<script type="text/javascript">
function printDiv(a) {
            var divContents = document.getElementById(a).innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html><head><title></title>');
            a.document.write('</head><body>');
            a.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>');
            a.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">');
            a.document.write('<link href="../admin/assets/ticket_script/style.css" rel="stylesheet" type="text/css"/>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
</script>
</body>
</html>
<?php
}
?>

