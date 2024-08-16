<?php
session_start();
$dismis = 1;
if(!empty($_SESSION['name']) && !empty($_SESSION['u_name'])){
    $logSts = "IN";
    $dismis = 0;
}else{
    $logSts = "OUT";
}
$folder = 'sources';
if(empty($_GET['sub']) && empty($_GET['page'])){
    $section = 'default';
    $page = 'login';
}else{
    $section = strtolower(trim($_GET['sub']));
    $page = strtolower(trim($_GET['page']));
}
include 'config/db_con.php';
include 'config/config.php';
include 'config/functions.php';
include 'config/messages.php';

if(!empty($page)){
    $title = ucfirst($page).' | '.$title;
}
$venues = array();
    $venueSql = "SELECT * FROM $venueTable WHERE status = 1";
    $venueRs = $function->fetch_data($venueSql);
    foreach ($venueRs as $echvenue) {
      $venues[$echvenue['id']] = $echvenue['venue'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo str_replace('_',' ',$title); ?></title>
  <link rel="icon" type="image/x-icon" href="../admin/assets/img/logo.png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <script src="assets/jquery/jquery.1.11.0.js" type="text/javascript"></script>
  <link href="assets/css/mystyle.css" rel="stylesheet" type="text/css"/>

  <link href="assets/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css"/>
  <script src="assets/colorbox/jquery.colorbox.js" type="text/javascript"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js" integrity="sha512-hDFt+089A+EmzZS6n/urree+gmentY36d9flHQ5ChfiRjEJJKFSsl1HqyEOS5qz7jjbMZ0JU4u/x1qe211534g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body <?php if($logSts != "IN"){ ?>style="background:url(../theeventor/images/backgrounnd.png);"<?php } ?>>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
        <?php if($logSts == "IN"){ ?>
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form ation="javascript:void(0)" class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
<!--          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>-->
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Feedbacks
                <div class="float-right">
                  <!--<a href="#">Mark All As Read</a>-->
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                  <?php
                  $feedrs = $function->fetch_data("SELECT * FROM user_feedback");
                  foreach($feedrs as $echfeed){
                  ?>
                  <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                      <b><?php echo $echfeed['name']; ?> : <strong><?php echo $echfeed['feedback']; ?></strong></b>
                    <div class="time"><?php echo $echfeed['date_time']; ?></div>
                  </div>
                </a>
                  <?php
                  }
                  ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo '<strong>'.$_SESSION['name'].'</strong>'; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in
                  <span>
                <?php
                $start_date = new DateTime($currentDateTime);
                $since_start = $start_date->diff(new DateTime($_SESSION['last_login']));
                echo $since_start->i.' minutes<br>';
                ?>
                ago
               </span>
              </div>
              <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sub=user&page=profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">Eventor</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">EV</a>
          </div>
          <ul class="sidebar-menu">
            <?php
            $foldersql = "SELECT * FROM $menuTable WHERE status=1 and pid=0 group by folder order by id desc";
            $folderRs = $function->fetch_data($foldersql);
            foreach($folderRs as $echfol){
            ?>
            <li class="menu-header"><?php echo str_replace('_',' & ',strtoupper($echfol['folder'])); ?></li>
            <?php  
            $menusql = "SELECT * FROM $menuTable WHERE pid = 0 AND status = 1 AND folder = '$echfol[folder]'";
            $menuRs = $function->fetch_data($menusql);
            foreach($menuRs as $emenu){
                $link = $function->make_link(strtolower($emenu['folder']),strtolower($emenu['page']));
                $subMenusql = "SELECT * FROM $menuTable WHERE pid = $emenu[id] AND status = 1";
                $subMenuRs = $function->fetch_data($subMenusql);
                $count = count($subMenuRs);
            ?>
            <li class="dropdown 
            <?php
            if(!empty($_GET)){
            if(strtolower($emenu['folder'])==$_GET['sub']){
                $getPid = "SELECT * FROM menu_master WHERE status = 1 AND page = '$_GET[page]'";
                $getPidRs = $function->fetch_data_single($getPid);
                if(!empty($getPidRs['pid'])){
                    $getParent = "SELECT name FROM menu_master WHERE status = 1 AND id = '$getPidRs[pid]'";
                    $getParentRs = $function->single_value($getParent);
                    if(strtolower($emenu['name'])==strtolower($getParentRs)){
                        echo 'active';
                        } 
                    } 
                else {
                    if(strtolower($emenu['name'])==strtolower($getPidRs['name'])){
                        echo 'active';
                    } 
                }
            }
            else{
                $getPiad = "SELECT name FROM menu_master WHERE id = (SELECT pid FROM menu_master WHERE status = 1 AND page = '$_GET[page]')";
                $getPiadRs = $function->single_value($getPiad);
                if(strtolower($emenu['name'])==strtolower($getPiadRs)){
                        echo 'active';
                    } 
            }
          }
            ?>">
            <?php
              if(array_key_exists(strtolower($emenu['name']),$icon)){
                $icn = $icon[strtolower($emenu['name'])];
              }
              else{
                $icn = $icon['default'];
              }
            ?>
            <a href="<?php echo $link; ?>" class="nav-link <?php if($count > 0){echo 'has-dropdown';}?>"><i class="fas fa-<?php echo $icn; ?>"></i>
            <span><?php echo ucfirst($emenu['name']); ?></span></a>
            <?php
            if($count > 0){
            ?>
              <ul class="dropdown-menu">
                 <?php
                foreach($subMenuRs as $esubmenu){
                    $sublink = $function->make_link(strtolower($esubmenu['folder']),strtolower($esubmenu['page']));
                ?> 
                <li <?php if(!empty($_GET['page'])){if($esubmenu['page']==$_GET['page']){echo 'class=active';}}?>><a class="nav-link" href="<?php echo $sublink; ?>"><?php echo ucfirst($esubmenu['name']); ?></a></li>
                <?php } ?>
              </ul>
            <?php } ?>
            </li>
            <?php } ?>
            <?php } ?>
          </ul>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="logout.php" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </div>        
        </aside>
      </div>
        <?php } ?>
      <!-- Main Content -->
      <div class="main-content">
        <?php
        if(!is_readable("$folder/$section/$page.php")){
            include("no-page.php");
        }
        else{
            include("$folder/$section/$page.php");
        }
        ?>
      </div>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/eventor.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/jquery.sparkline.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/mycustom.js" type="text/javascript"></script>
</body>
</html>