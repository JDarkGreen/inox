<li class="item format">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php $image = simplyread_catch_that_image(); if(!empty($image)): echo $image; endif; ?>
		<span class="fa fa-picture-o"></span>
	</a>
	<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
	<div class="date">
		<?php printf( __( '<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'simplyread' ), get_the_time('m-d-Y'), get_the_time(get_option('date_format'))); ?>
	</div>
	<div class="excerpt"><?php the_excerpt(); ?></div>
</li>