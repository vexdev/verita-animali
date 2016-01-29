<?php get_header(); ?>
<div id="center">
  <?php get_sidebar(); ?>
<div id="contenuto">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <h1><?php the_title(); ?></h1>
  <div id="music"></div>
  <div class="entry">
    <?php the_content('<p>leggi il seguito... &raquo;</p>'); ?>
   
<div style="font-size:18px; color:#000">

<?php //echo get_post_meta($post->ID, 'ora', true); ?></div>
<?php //the_meta(); ?>

    <?php wp_link_pages(array('before' => '<p><strong>' . __('Pagine:', 'kubrick') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  <?php endwhile; endif; ?>


<aside id="archives" class="widget">
					<h3 class="widget-title"><?php //_e( 'Archives', 'twentyeleven' ); ?></h3>
					<ul>
						<?php //wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>


</div>  
</div>
<div class="clearall"></div>
</div>
<div id="partners">
<!-- Begin zooplus Partner Program Code -->
<a href="http://www.zooplus.it/shop/partner/zap143909"><img src="http://www.zooplus.it/affiliate/material/zap143909" alt="TUTTI GLI ANIMALI" width="468" height="60" border="0"/></a>
<!-- End zooplus Partner Program Code -->

<a href="http://laverabestia.org" target="_blank"><img src="http://laverabestia.org/images/banner/banneroriz.png" alt="Laverabestia.org - Animal Video Community" width="468" height="60" border="0" /></a></div>
<div class="clearall"></div>





<?php get_footer(); ?>