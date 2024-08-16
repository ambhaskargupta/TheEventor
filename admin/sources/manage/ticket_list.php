<?php
if($logSts != "IN"){
    exit();
}
else{
    $list = array();
    $grpSql = "SELECT * FROM $bookingTable";
    $grpRs = $function->fetch_data($grpSql);
    foreach ($grpRs as $echlist) {
        $list[$echlist['id']] = $echlist['event_name'];
    }
?>
<form action="javascript:void(0)" method="GET">
<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Ticket No.</th>
            <th>Mob</th>
            <th>Event Name</th>
            <th>Option</th>          
        </tr>
        <?php
        $venueSql = "SELECT * FROM $ticketTable";
        $venueListRs = $function->fetch_data($venueSql);
        $sl=1;
        foreach($venueListRs as $echbooking){
            ?>
        <tr>
            <td><?php echo $sl; ?></td>
            <td><?php echo $echbooking['name']; ?></td>
            <td><?php echo $echbooking['ticket_id']; ?></td>
            <td><?php echo $echbooking['mob']; ?></td>
            <td><?php echo @$list[$echbooking['bookingvenueid']]; ?></td>
            <td>
                <div class="menu-wrap">
                    <ul class="menu">
                        <li class="menu-item">
                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                            <ul class="drop-menu">
                                <li class="drop-menu-item">
                                <a href="index.php?sub=manage&page=ticket_add&id=<?php echo $echbooking['id']; ?>" class="">Edit</a>
                                </li>
                                <li class="drop-menu-item">
                                <a href="javascript:void(0)" class="" onclick="confirm_process('<?php echo $echbooking['id']; ?>')">Delete</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        <?php
        $sl++;
        }
        ?>
    </table>
</div>
</form>
<script type="text/javascript">
function booking_details(id) {
    $.dialog({
        theme: 'material',
        title: false,
        content: 'url:ajax.php?sub=manage&page=ticket_view&id='+id,
        animation: 'zoom',
        columnClass: 'medium',
        closeAnimation: 'scale',
        backgroundDismiss: false
    });
}

function booking_aprove(bkngId) {
    $('#'+bkngId+'_aprbtn').addClass('disabled');
    $.ajax({
        type: 'GET',
        url:'ajax.php?sub=manage&page=booking_more',
        data:'case=aprove&id='+bkngId,
        success:function(){
            loadList();
        }
    });
}
function booking_cancel(cancelId) {
    $('#'+cancelId+'_cnclbtn').addClass('disabled');
    $.ajax({
        type: 'GET',
        url:'ajax.php?sub=manage&page=booking_more',
        data:'case=cancel&id='+cancelId,
        success:function(){
            loadList();
        }
    });
}
</script>
<?php
}
?>