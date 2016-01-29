<?php
/*
Template Name: pagina news
*/
?><?php get_header(); ?>
<div id="center">
  <?php get_sidebar(); ?>
<div id="contenuto">

<? echo getPostList('news',5); ?> 
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