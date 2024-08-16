<?php
if(!empty($razorpay_payment_id)){
    $user = $function->fetch_data_single("SELECT * FROM $ticketTable WHERE ticket_id = '$shopping_order_id'");
    $venue = $function->fetch_data_single("SELECT * FROM $bookingTable WHERE id = $user[bookingvenueid]");
    ?>
    <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Print Ticket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link href="../admin/assets/ticket_script/style.css" rel="stylesheet" type="text/css"/>
<div class="ticket" id="ticket">
	<div class="left">
		<div class="image">
			<p class="admit-one">
				<span>ADMIT ONE</span>
				<span>ADMIT ONE</span>
				<span>ADMIT ONE</span>
			</p>
			<div class="ticket-number">
				<p><?php echo $shopping_order_id; ?></p>
			</div>
		</div>
		<div class="ticket-info">
			<p class="date">
                            <?php echo $razorpay_payment_id; ?>
			</p>
			<div class="show-name">
				<h1><?php echo $venue['event_name']; ?></h1>
				<span style="font-family: biki;font-size:15px;"><?php echo $razorpay_payment_id; ?></span>
			</div>
			<div class="time">
				<p><?php echo $venue['date_time_from']; ?></p>
				<p><span> TO </span></p>
				<p><?php echo $venue['date_time_to']; ?></p>
			</div>
			<p class="location"><span><?php echo $venue['address']; ?></span></p>
		</div>
	</div>
	<div class="right">
		<p class="admit-one">
			<span>ADMIT ONE</span>
			<span>ADMIT ONE</span>
			<span>ADMIT ONE</span>
		</p>
		<div class="right-info-container">
			<div class="show-name">
				<h1><?php echo $venue['event_name']; ?></h1>
			</div>
			<div class="time">
				<p><?php echo $venue['date_time_from']; ?></p>
				<p><span> TO </span></p>
				<p><?php echo $venue['date_time_to']; ?></p>
			</div>
                        <?php 
                            $qrcode = $user['name'].' | '.$user['mob'];
                        ?>
			<div class="barcode" id="qrcode"></div>
			<p class="ticket-number">
				<?php echo $shopping_order_id; ?>
			</p>
		</div>
	</div>
</div>
<script>
    var qrcode = new QRCode("qrcode","<?php echo $qrcode; ?>");
</script>
<button class="" onclick="printDiv('ticket')">Print Ticket</button>
<script src="../admin/assets/ticket_script/script.js" type="text/javascript"></script>
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

