<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Superb
 * @since Superb 1.0
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			
			<?php if ( !is_single() && !is_search() ) { ?>
                        <?php if('' != get_the_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
					<?php the_post_thumbnail( 'post_feature_full_width' ); ?>
                                    
				</a>
                                
                                <span class="post-meta-header">
                                        <?php  $categories_list = get_the_category_list( esc_html__( 'ID' ) ); 
                                        echo $categories_list; ?>
                                    </span>
			<?php }
                        }
                        else { 
                            the_post_thumbnail( 'post_feature_full_width' ); 
                       } ?>
                    
                    <?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php }
			else { ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			<?php } // is_single() ?>
                                
                        <p class="post-meta">
                            <span><?php the_time(esc_html('d M Y','superb')); ?> </span> by <small class="posted-by"><?php the_author_posts_link(); ?></small>
                        </p>
                        
                        <span class="comment-count"><?php $comments = get_comments_number( 'ID' );
                        echo $comments;  ?> Comment</span> 
			
		</header> <!-- /.entry-header -->

		<?php if ( is_search() || is_home() || is_archive()) { // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div> <!-- /.entry-summary -->
		<?php }
		else { ?>
			<div class="entry-content">
				<?php the_content( wp_kses( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'superb' ), array( 'span' => array( 
					'class' => array() ) ) )
					); ?>
				<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'superb' ),
					'after' => '</div>',
					'link_before' => '<span class="page-numbers">',
					'link_after' => '</span>'
				) ); ?>
			</div> <!-- /.entry-content -->
		<?php } ?>

		<footer class="entry-meta">
			<?php if ( is_singular() ) {
				// Only show the tags on the Single Post page
				superb_entry_meta();
			} ?>
			
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) {
				// If a user has filled out their description and this is a multi-author blog, show their bio
				get_template_part( 'author-bio' );
			} ?>
		</footer> <!-- /.entry-meta -->
	</article> <!-- /#post -->
