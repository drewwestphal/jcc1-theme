<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<?php if ( !is_front_page() ) : ?><h2 class="entry-title"><?php the_title() ?></h2><?php endif ?>
				<div class="entry-content">
<?php the_content() ?>

<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>

<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->

<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key+value of "comments" to enable comments on this page ?>

			<?php if ( is_front_page() ) : ?>
				<h2 id="news">Latest News</h2>

<p><a href="http://feeds.feedburner.com/JocoCruiseCrazy" rel="alternate" type="application/rss+xml"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="" style="vertical-align:middle;border:0"/></a>&nbsp;<a href="http://feeds.feedburner.com/JocoCruiseCrazy" rel="alternate" type="application/rss+xml">Subscribe</a></p>

				<?php
					$current_page = $post;
					$sticky = get_option('sticky_posts');

					
					query_posts(array(
						'post_type' => 'post',
						'posts_per_page' => 2, 
					));
					while ( have_posts() ) : the_post()
				?>
				<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
					<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'sandbox'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
					<div class="entry-date">Posted <?php unset($previousday); printf( __( '%1$s at %2$s', 'sandbox' ), the_date( '', '', '', false ), get_the_time() ) ?></div>
					<div class="entry-content">
	<?php the_content( __( 'Read More <span class="meta-nav">&raquo;</span>', 'sandbox' ) ) ?>

					<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
					</div>
					<!--
					<div class="entry-meta">
						<span class="author vcard"><?php printf( __( 'By %s', 'sandbox' ), '<a class="url fn n" href="' . get_author_link( false, $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( __( 'View all posts by %s', 'sandbox' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></span>
						<span class="meta-sep">|</span>
	<?php edit_post_link( __( 'Edit', 'sandbox' ), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
						<span class="comments-link"><?php comments_popup_link( __( 'Comments (0)', 'sandbox' ), __( 'Comments (1)', 'sandbox' ), __( 'Comments (%)', 'sandbox' ) ) ?></span>
					</div>
					-->
				</div><!-- .post -->
				<?php //
					endwhile;
				
									query_posts(array(
						'page_id' => $current_page->ID,
						'posts_per_page' => 1, 
						'post_type' => 'page'
					));

					the_post();
					//$post = $current_page; 
				?>
				<a href="/news/">More News...</a>
			<?php endif ?>
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>