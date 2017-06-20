<?php get_header(); ?>

	<!-- Services -->
	<?php $services = get_custom_post_type("services");
	if($services) : ?>
		<div class="grid-index section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<h1 class="text-center">Services</h1>
					</div>
				</div>
				<div class="row no-gutter">
					<?php foreach ($services as $service) : ?>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<a href="<?php echo the_permalink($service);?>" class="item imgReplace" title="<?php echo $service->post_title;?>">
								<div class="caption">
									<h3><?php echo $service->post_title;?></h3>
									<i class="fa fa-chevron-circle-right"></i>
								</div>
								<div class="image imgReplaceThis" data-replace-image="<?php echo get_featured_image($service, 'medium', 0);?>"></div>
								<div class="overlay"></div>
							</a>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	<?php endif;?>

<?php get_footer(); ?>
