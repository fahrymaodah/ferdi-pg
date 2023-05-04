<!DOCTYPE html>
<html lang="en" class="light">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="<?php echo base_url('assets/img/logo.svg') ?>" rel="shortcut icon">
	<title>Administrator Login | DC Store</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">

</head>
<body class="login">
	<div class="container sm:px-10">
		<div class="block xl:grid grid-cols-2 gap-4">
			<!-- BEGIN: Login Info -->
			<div class="hidden xl:flex flex-col min-h-screen">
				<a href="" class="-intro-x flex items-center pt-5">
					<img alt="Midone - HTML Admin Template" class="w-6" src="<?php echo base_url('assets/img/logo.svg') ?>">
					<span class="text-white text-lg ml-3"> Dunia Coding Store </span>
				</a>
				<div class="my-auto">
					<img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="<?php echo base_url('assets/img/illustration.svg') ?>">
					<div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
						A few more clicks to
						<br>
						sign in to your account.
					</div>
					<div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
						Manage all your e-commerce accounts in one place
					</div>
				</div>
			</div>
			<!-- END: Login Info -->

			<!-- BEGIN: Login Form -->
			<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
				<div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
					<h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
						Sign In
					</h2>
					<div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
					<form method="post">
						<div class="intro-x mt-8">
							<input type="text" class="intro-x login__input form-control py-3 px-4 block" name="email" placeholder="Email">
							<div class="text-danger small ml-2 mt-1"><?php echo form_error('email') ?></div>

							<input type="password" class="intro-x login__input form-control py-3 px-4 block mt-3" name="password" placeholder="Password">
							<div class="text-danger small ml-2 mt-1"><?php echo form_error('password') ?></div>
						</div>
						<div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
							<button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
							<?php if ($this->uri->segment(1) == 'admin'): ?>
								<a href="<?php echo base_url('admin/register') ?>" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</a>
							<?php else: ?>
								<a href="<?php echo base_url('register') ?>" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</a>
							<?php endif ?>
						</div>
					</form>
				</div>
			</div>
			<!-- END: Login Form -->
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
	<script src="<?php echo base_url('assets/js/app.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>

	<script>
		var pesan = '<?php echo $this->session->flashdata('pesan') ?>';
		if (pesan != '') { notif(pesan); }
	</script>
</body>
</html>