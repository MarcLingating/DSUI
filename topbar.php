<!-- Navbar -->
<div id="content">

<div class="top-navbar">
		     <div class="xd-topbar">
			     <div class="row">
				     <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					    <div class="xp-menubar">
						    <span class="material-icons text-white">signal_cellular_alt</span>
						</div>
					 </div>
					 
					 <div class="col-md-5 col-lg-3 order-3 order-md-2">
					 </div>
					  
           <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
					     <div class="xp-profilebar text-right">
						    <nav class="navbar p-0">
							   <ul class="nav navbar-nav flex-row ml-auto">
							     <a class="nav-link" href="#" data-toggle="dropdown">
		
							   
</li>

<li class="dropdown nav-item">
  <a class="nav-link" href="#" data-toggle="dropdown">
    <?php if(empty($_SESSION['login_avatar'])): ?>
    <img src="img/user.jpg" style="width: 40px; border-radius: 50%;" />
    <?php else: ?>
    <span class="image">
      <img src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" style="width: 40px; height: 40px; border-radius: 50%;" alt="User Image">
    </span>
    <?php endif; ?>
	<span class="brand-text font-weight-light"><?php echo ucwords($_SESSION['login_firstname'].' '.$_SESSION['login_lastname']) ?></span>
  </a>
  <ul class="dropdown-menu small-menu">
    <li>
      <a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['login_id'] ?>">
        <span class="material-icons">person</span>
        Manage Account
      </a>
    </li>

    <li>
      <a class="dropdown-item" href="ajax.php?action=logout">
        <span class="material-icons">logout</span>
        Logout
      </a>
    </li>
  </ul>
</li>

							   
							   
							   </ul>
							</nav>
						 </div>
					 </div>
					 
				 </div>

         <div class="xp-breadcrumbbar text-center">
				    <h4 class="page-title">Dashboard</h4>
					<ol class="breadcrumb ">
					  <li class="breadcrumb-item"><a href="./">SOCMOBNET</a></li>
					  <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
					</ol>
				 </div>
				 
				 
			 </div>
		  </div>
  <!-- /.navbar -->
