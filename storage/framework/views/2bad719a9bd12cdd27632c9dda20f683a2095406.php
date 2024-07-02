<?php $__env->startSection('title', 'Selamat Datang'); ?>
<?php $__env->startSection('content'); ?>
		<header class="default-header">
			<div class="sticky-header">
				<div class="container">
					<div class="header-content d-flex justify-content-between align-items-center">
						<div class="logo">
							<a href="#top" class="smooth"><h1 class="brand brand-name text-white"> <i class="fa fa-users"></i> <i style="color:black">SIM</i>PEG</h1></a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header Area -->
		<!-- Start Banner Area -->
		<section class="banner-area relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-lg-8">
						<div class="banner-content text-center">
							<p class="text-uppercase text-white">UAS Pemrograman Framework, Septia Salbuanda</p>
							<h1 class="text-uppercase text-white">Sistem informasi <span style="color:black">kepegawaian</span></h1>
                            <a href="<?php echo e(route('login')); ?>" class="primary-btn banner-btn" >Masuk</a>
                            <a href="<?php echo e(route('register')); ?>" class="primary-btn banner-btn">Daftar</a>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('luar.induk', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Simpeg\resources\views/welcome.blade.php ENDPATH**/ ?>