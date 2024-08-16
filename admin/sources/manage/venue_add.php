<?php
if($logSts != "IN"){
    exit();
}
else{
$msg = '';
$venuename = '';
$venuetype = '';
$status = '';
$formButton = 'Add';
$action = '';
$rate = 0;
$photo = '';
$address = '';
$formshow = true;

if (!empty($_POST)) {
    #Add Menu Item
    if (empty($_POST['venue'])) {
        $msg = $lang['fill_all_details'];
    } else {
        $venuename = $_POST['venue'];
        $venuetype = $_POST['type'];
        $rate = $_POST['rate'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        if (!empty($_POST['hid'])) {
            $hid = $_POST['hid'];
            $action = 'Update';
        }
        
        #Duplicate
        $dupSql = "SELECT * FROM $venueTable WHERE venue = '$venuename'";
        if ($action == 'Update') {
            $dupSql .= " AND id != $hid";
        }
        #echo $dupSql;
        $dupSqlRs = $function->sql_query($dupSql);
        if ($dupSqlRs->rowCount() > 0) {
            $msg = $lang['duplicate_found'];
        } else {
            if($action != 'Update') {
                $venueSql = "INSERT INTO $venueTable(venue, type, address, rate, status) VALUES('$venuename', '$venuetype', '$address', '$rate', '$status')";
            } 
            else{
                $venueSql = "UPDATE $venueTable SET venue = '$venuename', type = '$venuetype', address = '$address', rate = '$rate', status = '$status' WHERE id = $hid";
            }
        }
        if (!empty($venueSql)) {
            $venueEx = $function->sql_query($venueSql);
            if ($venueEx) {
                if ($action != 'Update') {
                    $msg = $lang['add_success'];
                } else {
                    $msg = $lang['update_success'];
                    $id = $hid;
                    $formButton = 'Update';
                    $venueSql = "SELECT * FROM $venueTable WHERE id = $id";
                    $venueSqlRs = $function->fetch_data($venueSql);
                    foreach ($venueSqlRs as $eahM) {
                        $venuename = $eahM['venue'];
                        $venuetype = $eahM['type'];
                        $rate = $eahM['rate'];
                        $address = $eahM['address'];
                        $photo = $eahM['photo'];
                        $status = $eahM['status'];
                        $hidden = true;
                    }
                }
            }
        }
        //Image Upload
        if(isset($_FILES['file']['name']) AND !empty($_FILES['file']['name'])){
            $profilephoto=$_FILES['file'];
            
            $filename=$profilephoto['name'];
            $filetmp=$profilephoto['tmp_name'];
            $filesize=$profilephoto['size'];
            $fileerror=$profilephoto['error'];

            $fileex=explode('.',$filename);
            $exlower=strtolower(end($fileex));
            
            if(in_array($exlower,$acceptex)){
                $newfilename=uniqid('venue',true).'.'.$exlower;
                $destfile = $upload_path.'venue/'.$newfilename;
                move_uploaded_file($filetmp,$destfile);
                  
                $insertquery="UPDATE $venueTable SET photo = '$newfilename' WHERE";
                if($action != 'Update') {
                        $lastId = $function->single_value("SELECT MAX(id) FROM $venueTable");
                        $insertquery .=" id = $lastId";
                    } 
                    else{
                        $insertquery .=" id = $hid";
                    }
                $mquery = $function->sql_query($insertquery);
                if($mquery){
                    if($action != 'Update') {
                        $msg = $lang['add_success'];
                    } 
                    else{
                        $msg .= $lang['update_success'];
                    }
                }
                else{
                    $msg = 'Error Query';
                }
            }
            else{
                echo "you cannot upload this type of file";
            }
        }
    } 
}
else {
    #Update Menu Item
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $formButton = 'Update';
        $venueSql = "SELECT * FROM $venueTable WHERE id = $id";
        $venueSqlRs = $function->fetch_data($venueSql);
        foreach ($venueSqlRs as $eahM) {
            $venuename = $eahM['venue'];
            $venuetype = $eahM['type'];
            $rate = $eahM['rate'];
            $address = $eahM['address'];
            $photo = $eahM['photo'];
            $status = $eahM['status'];
            $hidden = true;
        }
    }
    #Delete Menu Item
    if (!empty($_GET['delid'])) {
        $delid = $_GET['delid'];
        $delSql = "DELETE FROM $venueTable WHERE id = $delid";
        $delSqlRs = $function->sql_query($delSql);
        if ($delSqlRs) {
            $msg .= $lang['delete_success'];
            $formshow = false;
        }
    }
}
?>
<div class="container" style="width:auto;">
        <?php
        echo $msg;
        if ($formshow != false) {
        ?>
        <div class="card">
            <div class="card-header"><h3><?php echo $formButton; ?> Venue</h3></div>
            <div class="card-body">
                <div class="msg"></div>
                <form action="javascript:void(0)" method="post"  name="FrmEntry" id="formdata" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Type</span>
                        <select class="form-control" aria-label="type" name="type">
                            <?php
                            foreach ($venue_arr as $key => $value) {
                                ?>
                                <option value="<?php echo $key; ?>"
                                <?php
                                if($formButton == 'Update'){
                                    if(isset($venuetype)) {
                                        if ($venuetype == $key) {
                                            echo 'selected';
                                        }
                                    }
                                }else{
                                    if ($key == 1) {
                                            echo 'selected';
                                        }
                                }
                                ?>>
                                <?php echo $value; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="venue" name="venue" value="<?php echo $venuename; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-flag"></i>&nbsp;Status</span>
                        <select class="form-control" aria-label="Default select example" name="status">
                            <?php
                            foreach ($status_arr as $key => $value) {
                                ?>
                                <option value="<?php echo $key; ?>"
                                <?php
                                if($formButton == 'Update'){
                                    if(isset($status)) {
                                        if ($status == $key) {
                                            echo 'selected';
                                        }
                                    }
                                }else{
                                    if ($key == 1) {
                                            echo 'selected';
                                        }
                                }
                                ?>>
                                <?php echo $value; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rate</span>
                        <input type="text" class="form-control" placeholder="rate" aria-label="rate" name="rate" value="<?php echo $rate; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Address</span>
                        <input type="text" class="form-control" placeholder="address" aria-label="address" name="address" value="<?php echo $address; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Photo</span>
                        <input type="file" class="form-control" name="file" placeholder="<?php echo $photo; ?>">
                    </div>
                    <div class="btn-toolbar">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <?php
                            if (isset($hidden) && $hidden == true) {
                                echo '<input type="hidden" name="hid" value="' . $id . '">';
                            }
                            ?>
                            <input class="btn btn-primary btn-sm btn-block" type="submit" id="submit" onclick="addEdit();" value="<?php echo $formButton; ?> Venue">
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <input class="btn btn-warning btn-sm btn-block" type="reset" value="Reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php
}
?>
</div>
<script>
  function addEdit() {
        $("#formdata").on('submit',(function(e) {
        e.preventDefault();
        var FrmEntry = new FormData(this);
        $.ajax({
            type: "POST",
            cache: false,
            url: "ajax.php?sub=manage&page=venue_add",
            contentType: false,
            processData:false,
            data: FrmEntry,
            beforeSend: function () {
                $('#submit').attr('disabled', 'disabled');
            },
            success: function (data) {
                $.colorbox({html:data});
                $('#submit').removeAttr('disabled', 'disabled');
                //loadList();
            }
        });
        }));
    }  
</script>
<?php
}
?>

