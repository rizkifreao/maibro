<section class="content-header">
	<h1>
	500 Error Page
	</h1>
	<ol class="breadcrumb">
	<li><a href="<?= base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">500 error</li>
	</ol>
</section>

    <!-- Main content -->
<section class="content">
	<div class="error-page">
	<h2 class="headline text-red">500</h2>

	<div class="error-content">
		<h3><i class="fa fa-warning text-red"></i> An Error Was Encountered</h3>

		<p>
		<?php echo $error; ?>
		</p>
		<p>
			Return to <a href="<?= base_url('dashboard'); ?>">dashboard</a>
		</p>

		<form class="search-form">
		<div class="input-group">
			<input type="text" name="search" class="form-control" placeholder="Search">

			<div class="input-group-btn">
			<button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
			</button>
			</div>
		</div>
		<!-- /.input-group -->
		</form>
	</div>
	</div>
	<!-- /.error-page -->
</section>