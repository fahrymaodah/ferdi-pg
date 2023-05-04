<html lang="en" class="light">
	<head>
		<meta charset="utf-8">
		<link href="<?php echo base_url('assets/img/logo.svg') ?>" rel="shortcut icon">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="LEFT4CODE">
		<title>DUNIA CODING STORE</title>

		<!-- BEGIN: CSS Assets-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">

		<!-- BEGIN: JS Assets-->
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.6.4.min.js') ?>"></script>
	</head>

	<body class="main">
		<!-- BEGIN: Mobile Menu -->
	    <div class="mobile-menu md:hidden">
	        <div class="mobile-menu-bar">
	            <a href="" class="flex mr-auto">
	                <img alt="Midone - HTML Admin Template" class="w-6" src="<?php echo base_url('assets/img/logo.svg') ?>">
	            </a>
	            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
	        </div>
	        <div class="scrollable">
	            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
	            <ul class="scrollable__content py-2">
	                <li>
	                    <a href="javascript:;.html" class="menu menu--active">
	                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
	                        <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon transform rotate-180"></i> </div>
	                    </a>
	                    <ul class="menu__sub-open">
	                        <li>
	                            <a href="side-menu-light-dashboard-overview-1.html" class="menu">
	                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
	                                <div class="menu__title"> Overview 1 </div>
	                            </a>
	                        </li>
	                    </ul>
	                </li>
	                <li>
	                    <a href="side-menu-light-inbox.html" class="menu">
	                        <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
	                        <div class="menu__title"> Inbox </div>
	                    </a>
	                </li>
	                <li class="menu__devider my-6"></li>
	                <li>
	                    <a href="javascript:;" class="menu">
	                        <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
	                        <div class="menu__title"> Components <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
	                    </a>
	                    <ul class="">
	                    	<li>
	                            <a href="javascript:;" class="menu">
	                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
	                                <div class="menu__title"> Overlay <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
	                            </a>
	                            <ul class="">
	                                <li>
	                                    <a href="side-menu-light-modal.html" class="menu">
	                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
	                                        <div class="menu__title">Modal</div>
	                                    </a>
	                                </li>
	                                <li>
	                                    <a href="side-menu-light-slide-over.html" class="menu">
	                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
	                                        <div class="menu__title">Slide Over</div>
	                                    </a>
	                                </li>
	                                <li>
	                                    <a href="side-menu-light-notification.html" class="menu">
	                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
	                                        <div class="menu__title">Notification</div>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
	        </div>
	    </div>
	    <!-- END: Mobile Menu -->

	    <!-- BEGIN: Top Bar -->
	    <div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
	        <div class="h-full flex items-center">
	            <!-- BEGIN: Logo -->
	            <a href="" class="-intro-x hidden md:flex">
	                <img alt="Midone - HTML Admin Template" class="w-6" src="<?php echo base_url('assets/img/logo.svg') ?>">
	                <span class="text-white text-lg ml-3"> DC Store </span>
	            </a>
	            <!-- END: Logo -->
	            <!-- BEGIN: Breadcrumb -->
	            <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
	                <?php echo $breadcrumbs ?>
	            </nav>
	            <!-- END: Breadcrumb -->

	            <!-- BEGIN: Notifications -->
	            <div class="intro-x dropdown mr-4 sm:mr-6">
		            <?php if ($this->session->userdata('admin')): ?>
		            <?php elseif ($this->session->userdata('member')): ?>
		                <a href="<?php echo base_url('cart') ?>" class="dropdown-toggle notification notification--bullet cursor-pointer">
		                	<i data-lucide="shopping-cart" class="notification__icon dark:text-slate-500"></i>
		                </a>
		            <?php else: ?>
		            	<a href="<?php echo base_url('login') ?>" class="dropdown-toggle notification cursor-pointer">
		                	<i data-lucide="log-in" class="notification__icon dark:text-slate-500"></i>
		                </a>
		            <?php endif ?>
	            </div>
	            <!-- END: Notifications -->

	            <?php if ($this->session->userdata('admin') || $this->session->userdata('member')): ?>
		            <!-- BEGIN: Account Menu -->
		            <?php $user		= $this->session->userdata('admin') ? $this->session->userdata('admin') : $this->session->userdata('member') ?>
		            <?php $prefix	= $this->session->userdata('admin') ? 'administrator_' : 'member_' ?>
		            <?php $url		= $this->session->userdata('admin') ? 'admin/' : '' ?>
		            <div class="intro-x dropdown w-8 h-8">
		                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 bg-white" role="button" aria-expanded="false" data-tw-toggle="dropdown">
		                    <img src="<?php echo base_url('assets/img/user.png') ?>">
		                </div>
		                <div class="dropdown-menu w-56">
		                    <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
		                        <li class="p-2">
		                            <div class="font-medium"><?php echo $user[$prefix.'name'] ?></div>
		                            <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500"><?php echo $user[$prefix.'email'] ?></div>
		                        </li>
		                        <li>
		                            <hr class="dropdown-divider border-white/[0.08]">
		                        </li>
		                        <li>
		                            <a href="<?php echo base_url($url.'profile') ?>" class="dropdown-item hover:bg-white/5">
		                            	<i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile
		                            </a>
		                        </li>
		                        <li>
		                            <a href="<?php echo base_url($url.'password') ?>" class="dropdown-item hover:bg-white/5">
		                            	<i data-lucide="lock" class="w-4 h-4 mr-2"></i> Password
		                            </a>
		                        </li>
		                        <li>
		                            <hr class="dropdown-divider border-white/[0.08]">
		                        </li>
		                        <li>
		                            <a href="<?php echo base_url($url.'logout') ?>" class="dropdown-item hover:bg-white/5">
		                            	<i data-lucide="power" class="w-4 h-4 mr-2"></i> Sign Out
		                            </a>
		                        </li>
		                    </ul>
		                </div>
		            </div>
		            <!-- END: Account Menu -->
	            <?php endif ?>
	        </div>
	    </div>
	    <!-- END: Top Bar -->

	    <div class="wrapper">
	        <div class="wrapper-box">
	            <!-- BEGIN: Side Menu -->
	            <?php if ($this->session->userdata('admin')): ?>
	            	<?php include('admin.php'); ?>
	            <?php elseif ($this->session->userdata('member')): ?>
	            	<?php include('member.php'); ?>
	            <?php else: ?>
	            	<?php include('visitor.php'); ?>
	            <?php endif ?>

	            <!-- BEGIN: Content -->
	            <div class="content">