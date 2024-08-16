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
            <th>Venue</th>
            <th>Address</th>
            <th>Rate</th>
            <th>Image</th>
            <th>Status</th>
            <th>Option</th>
        </tr>
        <?php
        $venueSql = "SELECT * FROM $venueTable";
        $venueListRs = $function->fetch_data($venueSql);
        $sl=1;
        foreach($venueListRs as $echvenue){
            ?>
        <tr class="menu-item">
            <td><?php echo $sl; ?></td>
            <td class="align-middle"><?php echo $echvenue['venue']; ?></td>
            <td><?php echo $echvenue['address']; ?></td>
            <td><?php echo $echvenue['rate'].' ₹'; ?></td>
            <td><a href="javascript:void(0)" onclick="img_view('<?php echo $echvenue['venue']; ?>','<?php echo $echvenue['photo']; ?>');" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a></td>
            <td><?php echo $sts_icon[$echvenue['status']]; ?></td>
            <td>
                <div class="menu-wrap">
                    <ul class="menu">
                        <li class="menu-item">
                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                            <ul class="drop-menu">
                                <li class="drop-menu-item">
                                <a href="index.php?sub=manage&page=venue_add&id=<?php echo $echvenue['id']; ?>" class="">Edit</a>
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
<script type="text/javascript">
function img_view(title,img){
    $.dialog({
        theme: 'material',
        title: title,
        content: '<img src="image/venue/'+ img +'">',
        animation: 'zoom',
        columnClass: 'medium',
        closeAnimation: 'scale',
        backgroundDismiss: false
    });
}
</script>
<?php
}
?>