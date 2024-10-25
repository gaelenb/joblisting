<?php 

	$controller = new Controllers\JobPostController();
	$view_data = $controller->index();

	get_header();
?>

	<section class="job-bg page job-list-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="<?= get_home_url(); ?>">Home</a></li>
					<li>Technical</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Engineers & Architects</h2>
			</div>

			<div id="app">
				<job-listing
					:queried_job_posts='<?= json_vue_prop($view_data['job_posts']); ?>'
                    :queried_job_locations='<?= json_vue_prop($view_data['job_locations']); ?>'
                    :queried_job_categories='<?= json_vue_prop($view_data['job_categories']); ?>'
				></job-listing>
			</div>
		</div><!-- container -->
	</section><!-- main -->
	
	
<?php get_footer(); ?>
