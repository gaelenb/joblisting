
<?php 

	$controller = new Controllers\JobPostController();
	$view_data = $controller->show();

	get_header();
?>

<section class="job-bg page job-details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <ol class="breadcrumb">
                <li><a href="<?= get_home_url(); ?>">Home</a></li>
                <li><a href="#">Techinical</a></li>
            </ol><!-- breadcrumb -->
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-8"><h2 class="title">
                        <?= esc_html( $view_data['job_post']->category ); ?>
                    </h2></div>
                <div class="col-xs-6 col-md-4">
                        <!--using home url for now since that takes you back to the search page.-->
                    <a href="<?= get_home_url(); ?>" class="btn btn-info pull-right">
                        <!--for now I'm using inline styles. I would need to import utility classes that were implemented in later
                            versions of bootstrap like mr-3 to mantain sanity in this project lol-->
                        <i style="margin-right: 10px;" class="fa fa-backward" aria-hidden="true"></i>Back
                    </a>
                </div>
            </div>


        </div><!-- breadcrumb -->
        <div class="job-details">
            <div class="section job-ad-item">
                <div class="item-info">
                    <div class="item-image-box">
                        <div class="item-image">
                            <img src="images/job/4.png" alt="Image" class="img-responsive">
                        </div><!-- item-image -->
                    </div>

                    <div class="ad-info">
                        <span><?= esc_html( $view_data['job_post']->title ); ?></span>
                        <div class="ad-meta">
                            <ul>
                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><?= esc_html( $view_data['job_post']->location ); ?></a></li>
                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?= esc_html( $view_data['job_post']->employment_type ); ?></a></li>
                                <li><i class="fa fa-money" aria-hidden="true"></i>$<?= esc_html( number_format( $view_data['job_post']->salary, 2 ) ); ?></li>
                                <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i><?= esc_html( $view_data['job_post']->experience_level ); ?></a></li>
                            </ul>
                        </div><!-- ad-meta -->									
                    </div><!-- ad-info -->
                </div><!-- item-info -->
                <div class="social-media">
                    <div class="button">
                        <a href="#" class="btn btn-primary"><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>
                        <a href="#" class="btn btn-primary bookmark"><i class="fa fa-bookmark-o" aria-hidden="true"></i>Bookmark</a>
                    </div>
                </div>					
            </div><!-- job-ad-item -->
            
            <div class="job-details-info">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="section job-description">
                            <div class="description-info">
                                <h1>Description</h1>
                                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni।</p>
                            </div>						
                        </div>							
                    </div>
                    <div class="col-sm-4">
                        <div class="section job-short-info">
                            <h1>Short Info</h1>
                            <ul>
                                <li><span class="icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>Posted: <?= esc_html( $view_data['job_post']->date_created ); ?></li>
                            </ul>
                        </div>
                        <div class="section company-info">
                            <h1>Company Info</h1>
                            <ul>
                                <li>Compnay Name: <a href="#"><?= esc_html( $view_data['job_post']->company ); ?></a></li>
                            </ul>								
                        </div>
                    </div>
                </div><!-- row -->					
            </div><!-- job-details-info -->				
        </div><!-- job-details -->
    </div><!-- container -->
</section>
	
	
<?php get_footer(); ?>