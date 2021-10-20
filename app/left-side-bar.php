<!-- start sidebar menu -->
      <div class="sidebar-container">
        <div class="sidemenu-container navbar-collapse collapse fixed-menu">
	        <div id="remove-scroll" class="left-sidemenu">
	            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
	              data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
					<li class="sidebar-toggler-wrapper hide">
						<div class="sidebar-toggler">
							<span></span>
						</div>
					</li>
					<li class="sidebar-user-panel">
						<div class="user-panel">
							<!-- <div class="pull-left image">
								<img src="../assets/img/dp.jpg" class="img-circle user-img-circle"
									alt="User Image" />
							</div> -->
							<div class="pull-left info">
								<p><?php echo ucwords($_SESSION['login_name']) ?></p>
								<a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
										Online</span></a>
							</div>
						</div>
					</li>
					<li class="nav-item nav-home">
						<a href="index.php?page=home" class="nav-link nav-toggle"> <i class="fa fa-home"></i>
							<span class="title">Home</span>
						</a>
					</li>
					<li class="nav-files">
						<a href="index.php?page=files" class="nav-link nav-toggle"><i class="fa fa-file"></i>
							<span class="title">Files</span>
						</a>
					</li>
					<li class="nav-users">
						<a href="index.php?page=users" class="nav-link nav-toggle"><i class="fa fa-users"></i>
							<span class="title">Users</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end sidebar menu -->
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>