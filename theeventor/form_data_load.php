<?php
if(!empty($_GET['case'])){
    $case = $_GET['case'];
    switch($case){
        case 'venue':
                if(isset($_GET['type'])){
                    $type = $_GET['type'];
                    $option = '<option value="0">Select One</option>';
                    $grpSql = "SELECT * FROM $venueTable WHERE type = $type AND status = 1";
                    $grpRs = $function->fetch_data($grpSql);
                    foreach ($grpRs as $eachgrp) {
                      $option .= '<option value="'.$eachgrp['id'].'">'.$eachgrp['venue'].'</option>';
                    }
                    echo $option;
                    }
                    break;
                    
        case 'ratechk':
                if(isset($_GET['venueId'])){
                    $venueId = $_GET['venueId'];
                    $rateSql = "SELECT rate FROM $venueTable WHERE id = $venueId";
                    $rateRs = $function->single_value($rateSql);
                        echo $rateRs;
                    }
                break;
        case 'ticketprice':
                if(!empty($_GET['ticketvenueId'])){
                    $ticketvenueId = $_GET['ticketvenueId'];
                    $ticketpricesql = "SELECT ticket_price FROM $bookingTable WHERE id = $ticketvenueId";
                        $ticket = $function->single_value($ticketpricesql);
                        if($ticket > 0){
                            echo $ticket;
                        }
                        else{
                            echo 'Free';
                        }
                    }
                    else {
                        echo '';
                    }
                break;
        case 'feedback':
                if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['feedback'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $feedback = $_POST['feedback'];
                    $fedSql = "INSERT INTO user_feedback(name, email, feedback, date_time) VALUES('$name', '$email', '$feedback', '$currentDateTime')";
                    $fedSqlRs = $function->sql_query($fedSql);  
                    if($fedSqlRs){
                        $error = false;
                        $msg = 'Submitted Successfully';
                    }
                }
                else{
                    $error = true;
                    $msg = 'Please Fill all the details';
                }
                echo json_encode(array('error'=> $error, 'msg' => $msg));
                break;
    }
}
?>

