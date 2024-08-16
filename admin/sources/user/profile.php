<?php
if($logSts != "IN"){
    exit();
}
else{
?>
<section class="section">
    <div class="section-header">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Home</a></div>
            <div class="breadcrumb-item">My Account</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab"><i class="fa fa-id-card"></i> Basic Info</a>
                          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab"><i class="fa fa-phone" style="transform: rotate(98deg);"></i> Contact info</a>
                          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab"><i class="fa fa-location-arrow"></i> Addresses</a>
                          <!--<a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab"><i class="fa fa-lock"></i> Security</a>-->
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <?php
                            $rs = $function->fetch_data_Single("SELECT * FROM users WHERE id = $_SESSION[u_id]");
                            ?>
                              <h2>Name : <?php echo $rs['name']; ?></h2>
                          </div>
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <h2>Email : <?php echo $rs['username']; ?></h2>
                          </div>
                          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                            <h2>Address : </h2>
                          </div>
<!--                          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                            Lorem ipsum culpa in ad velit dolore anim labore incididunt do aliqua sit veniam commodo elit dolore do labore occaecat laborum sed quis proident fugiat sunt pariatur. Cupidatat ut fugiat anim ut dolore excepteur ut voluptate dolore excepteur mollit commodo. 
                          </div>-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
         </div>
    </div>
</section>
<?php
}
?>