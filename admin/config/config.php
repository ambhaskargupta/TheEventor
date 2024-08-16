<?php
$title = 'The Eventor';
$upload_path = 'image/';
$acceptex=array('jpg','png','jpeg');
$footer = 'Copyright &copy; Eventor<br>Design By Eventor Group Ltd.';

$users = 'users';
$userGrpTable = 'user_group';
$menuTable = 'menu_master';
$venueTable = 'venues';
$bookingTable = 'bookings';
$membershipplantable = 'membershipplan';
$ticketTable = 'ticket_booking';
$membersgTable = 'members';

date_default_timezone_set('Asia/Kolkata');
$currentTime = date('H:i:s',time());       
$currentDate = date('Y-m-d',time());       
$currentDateTime = date('Y-m-d H:i:s',time());
$sts_icon = array(0 => 'Disabled', 1 => 'Active'); 
$status_arr = array('0' => 'Disable', '1' => 'Active'); 
$venue_arr = array('0' => 'Indoor', '1' => 'Outdoor'); 
$service_arr = array('0' => 'Free', '1' => 'Paid'); 
$show_hide = array('0' => '<div class="badge badge-danger"><i class="fas fa-eye-slash"></i></div>', '1' => '<div class="badge badge-success"><i class="fas fa-eye"></i></div>'); 
$icon = array(
    'default' => 'stream',
    'home' => 'home',
    'events' => 'calendar',
    'venues' => 'map',
    'users' => 'user',
    'bookings' => 'fire',
    'reports' => 'chart-line',
    'alerts' => 'bell',
    'settings' => 'wrench',
    'menus' => 'bars',
    'page' => 'link'
);
$month_arr = array('jan','feb');