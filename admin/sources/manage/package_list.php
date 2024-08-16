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
            <th>Description</th>
            <th>Price</th>
            <th>On Offer</th>
            <th>Facilities</th>
            <th>Option</th>          
        </tr>
        <?php
        $venueSql = "SELECT * FROM membershipplan";
        $venueListRs = $function->fetch_data($venueSql);
        $sl=1;
        foreach($venueListRs as $echbooking){
            ?>
        <tr>
            <td><?php echo $sl; ?></td>
            <td><?php echo $echbooking['name']; ?></td>
            <td><?php echo $echbooking['description']; ?></td>
            <td><?php echo $echbooking['price']; ?></td>
            <td><?php echo $echbooking['offer']; ?></td>
            <td><?php echo $echbooking['facilities']; ?></td>
            <td>
                <div class="menu-wrap">
                    <ul class="menu">
                        <li class="menu-item">
                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                            <ul class="drop-menu">
                                <li class="drop-menu-item">
                                <a href="index.php?sub=manage&page=package_add&id=<?php echo $echbooking['id']; ?>" class="">Edit</a>
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
<?php
}
?>