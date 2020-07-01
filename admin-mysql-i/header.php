<?php 
include_once("main.class.php");
ob_start();
session_start();
if(!isset($_SESSION['user_email']))
{
?>
<script type="text/javascript">
window.location='index';
</script>
<?php } 
$singlEmpDtls=$object->singelEmployeeDetls($_SESSION['user_email']);
$empName=$singlEmpDtls['emp_name'];
if($singlEmpDtls['emp_img']!='')
{
  $empImage=$singlEmpDtls['emp_img'];
}
if($singlEmpDtls['emp_img']=='')
{
  $empImage='default.png';
}
?>
<header class="main-header">

        <!-- Logo -->
        <a href="dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AG</b>PN</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>AGPN</b> & ER </span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../common/employee/emp_img/<?= $empImage;?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= $empName;?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../common/employee/emp_img/<?= $empImage;?>" class="img-circle" alt="User Image">
                    <p>
                      <?= $empName;?>  
                      <small><?= $singlEmpDtls['contact_number'];?> </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Activities</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Progress</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>