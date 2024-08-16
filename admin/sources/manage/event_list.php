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
            <th>Address</th>
            <th>Rate</th>
            <th class="text-center">Approve / Cancel / Pending</th>
            <th>Option</th>
        </tr>
        <?php
        $eventSql = "SELECT * FROM $bookingTable WHERE approve = 1";
        $eventListRs = $function->fetch_data($eventSql);
        $sl=1;
        foreach($eventListRs as $echvenue){
            ?>
        <tr class="menu-item">
            <td><?php echo $sl; ?></td>
            <td class="align-middle"><?php echo $echvenue['name']; ?></td>
            <td><?php echo $echvenue['address']; ?></td>
            <td><?php echo $echvenue['ticket_price'].' ₹'; ?></td>
            <td class="text-center"><?php if($echvenue['approve']==1){echo 'Approved';} ?></td>
            <td>
                <div class="menu-wrap">
                    <ul class="menu">
                        <li class="menu-item">
                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                            <ul class="drop-menu">
                                <li class="drop-menu-item">
                                <a href="index.php?sub=manage&page=event_add&id=<?php echo $echvenue['id']; ?>" class="">Edit</a>
                                </li>
                                <li class="drop-menu-item">
                                <a href="javascript:void(0)" class="" onclick="confirm_process('<?php echo $echvenue['id']; ?>')">Delete</a>
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
<?php
}
?>