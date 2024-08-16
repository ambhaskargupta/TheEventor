<?php
if($logSts != "IN"){
    exit();
}
else{
    if(!empty($_GET['case']) || !empty($_GET['id'])){
        $case = $_GET['case'];
        $id = $_GET['id'];
        switch($case){
            case 'aprove':
                $dupSql = "UPDATE $bookingTable SET approve = 1, pending = 0, cancel = 0 WHERE id = $id";
                $dupSqlRs = $function->sql_query($dupSql);
                $email = $function->single_value("SELECT email FROM $bookingTable WHERE id = $id");
                if($dupSqlRs){
                $db->send_email($email,'Your Event Hosting is Approved','<b>Approve</b>');
                #$db->send_sms('8617865255','Your Event Hosting is Approved');
                }
                break;
            case 'cancel':
                $dupSql = "UPDATE $bookingTable SET approve = 0, pending = 0, cancel = 1  WHERE id = $id";
                $dupSqlRs = $function->sql_query($dupSql);
                $email = $function->single_value("SELECT email FROM $bookingTable WHERE id = $id");
                if($dupSqlRs){
                    $db->send_email($email,'Your Event Hosting is Canceled','<b>Canceled</b>');
                    #$db->send_sms('8617865255','Your Event Hosting is Canceled');
                }
                break;
        }
    }
}
?>
