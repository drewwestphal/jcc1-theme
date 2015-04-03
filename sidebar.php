	<div id="primary" class="sidebar">



		<ul class="xoxo">
			<?php 
				if ( is_front_page() ) {
					dynamic_sidebar('Front Page');
				} elseif ( is_page() ) {
					dynamic_sidebar('Pages');
				} else {
					dynamic_sidebar('News');

?><p><a href="http://feeds.feedburner.com/JocoCruiseCrazy" rel="alternate" type="application/rss+xml"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="" style="vertical-align:middle;border:0"/></a>&nbsp;<a href="http://feeds.feedburner.com/JocoCruiseCrazy" rel="alternate" type="application/rss+xml">Subscribe</a></p>
<?php

				}
			?>
		</ul>
	</div><!-- #primary .sidebar -->
