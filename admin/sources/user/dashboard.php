<?php
if($logSts != "IN"){
    exit();
}
else{
?>
<section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Admin</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $function->single_value("SELECT COUNT(1) FROM USERS");?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Events</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $function->single_value("SELECT COUNT(0) FROM bookings");?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Ticket Amount Collection</h4>
                  </div>
                  <div class="card-body">
                    <?php
                    $total = 0;
                    $SQsL = $function->fetch_data("SELECT bookingvenueid FROM ticket_booking WHERE payment_status = 1");
                    foreach ($SQsL as $ecah){     
                        $amount = $function->single_value("SELECT ticket_price FROM bookings WHERE id = $ecah[bookingvenueid]");
                        $total += abs((int) $amount);
                    }
                    echo $total;
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Ticket Sold</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $function->single_value("SELECT COUNT(1) FROM ticket_booking WHERE bookingvenueid IS NOT NULL");?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Running Events</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $function->single_value("SELECT COUNT(1) FROM bookings WHERE payment_status = 1 AND date_time_from <= '$currentDateTime' AND date_time_to>= '$currentDateTime'");?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Venue Booking</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $function->single_value("SELECT COUNT(1) FROM bookings WHERE approve = 1");?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
<?php
}
?>