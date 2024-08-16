<?php
if($logSts != "IN"){
    exit();
}
else{
?>
<form action="javascript:void(0)" method="GET">
<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mob</th>
            <th>Event Name</th>
            <th>Details</th>
            <th>Pending/Aprove</th> 
            <th>Option</th>          
        </tr>
        <?php
        $venueSql = "SELECT * FROM $bookingTable";
        $venueListRs = $function->fetch_data($venueSql);
        $sl=1;
        foreach($venueListRs as $echbooking){
            ?>
        <tr>
            <td><?php echo $sl; ?></td>
            <td><?php echo $echbooking['name']; ?></td>
            <td><?php echo $echbooking['email']; ?></td>
            <td><?php echo $echbooking['mob']; ?></td>
            <td><?php echo $echbooking['event_name']; ?></td>
            <td><button onclick="booking_details('<?php echo $echbooking['id']; ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</button></td>
            <td>
                <?php
                if($echbooking['approve']==0 && $echbooking['cancel']==0){
                ?>
                    <a href="javascript:void(0)" onclick="booking_aprove('<?php echo $echbooking['id']; ?>')" id="<?php echo $echbooking['id']; ?>_aprbtn" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                    <a href="javascript:void(0)" onclick="booking_cancel('<?php echo $echbooking['id']; ?>')" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
               <?php
                }
                if($echbooking['approve']==1){
                ?>
                    <a href="javascript:void(0)" class="btn btn-success btn-sm disabled"><i class="fas fa-check"></i> Approved</a>
                    <a href="javascript:void(0)" onclick="booking_cancel('<?php echo $echbooking['id']; ?>')" id="<?php echo $echbooking['id']; ?>_cnclbtn" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Cancel</a>
                <?php
                }
                if($echbooking['cancel']==1){
                ?>
                    <a href="javascript:void(0)" onclick="booking_aprove('<?php echo $echbooking['id']; ?>');" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Canceled</a>
                <?php
                }
                if($echbooking['pending']==1){
                ?>
                    <button class="btn btn-warning btn-sm"><i class="fas fa-exclamation-triangle"> Pending</i></button>
                <?php
                }
                ?>
            </td>
            <td>
                <div class="menu-wrap">
                    <ul class="menu">
                        <li class="menu-item">
                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                            <ul class="drop-menu">
                                <li class="drop-menu-item">
                                <a href="index.php?sub=manage&page=booking_add&id=<?php echo $echbooking['id']; ?>" class="">Edit</a>
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
        content: 'url:ajax.php?sub=manage&page=booking_view&id='+id,
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