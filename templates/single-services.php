<?php get_header(); ?>

<!-- Intro Copy -->
<div class="container">
	<div class="row">

		<!-- Intro Copy -->
		<div id="intro" class="col-xs-12">
			<div class="section">
				<?php echo $post->post_content;?>
				<div class="clearfix"></div>
				<?php $intro_buttons = get_field('intro_buttons', $post->ID);
				if (!empty($intro_buttons)) :
					foreach ($intro_buttons as $key => $btn) :?>
						<a class="btn btn-primary" href="<?php echo $btn['link'];?>" title="<?php echo $btn['button_text'];?>">
							<?php echo $btn['button_text'];?> <i class="fa fa-angle-right"></i>
						</a>
					<?php endforeach;
				endif;?>
			</div>
		</div>

	</div>
</div>

<!-- Service Icons -->
<?php $stats = get_field('key_message_icons');?>
<?php if(!empty($stats)) : ?>
	<div class="stats">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-lg-offset-2 col-lg-8">
					<div class="row">
						<?php $i=1;?>
						<?php foreach($stats as $stat) : ?>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div id="stat<?php echo $i;?>" class="wrapper reveal">
									<div class="icon">
										<i class="fa <?php echo $stat['icon'];?>"></i>
									</div>
									<div class="stat-copy"><?php echo $stat['title'];?></div>
								</div>
							</div>
							<?php $i++;?>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>

<?php get_footer(); ?>