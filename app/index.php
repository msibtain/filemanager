<?php
session_start();
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 ?>
<?php include('header.php') ?>
<?php include('left-side-bar.php'); ?>
<!-- start page content -->
<div class="page-content-wrapper">
  <div class="page-content">
    <?php include('breadcrumb.php') ?>

    <?php
      $page = isset($_GET['page']) ? $_GET['page'] :'home';
        include $page.'.php';
     ?>
    <!-- end new student list -->
  </div>
</div>
<!-- end page content -->

<?php include('modals.php') ?>
<script type="text/javascript" src="assets/js/main.js"></script>
<?php include('footer.php')?>