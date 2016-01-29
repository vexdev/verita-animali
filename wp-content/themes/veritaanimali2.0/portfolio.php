<?php

/*

Template Name: Portfolio template

*/



get_header(); ?>

<div id="center">
  <?php get_sidebar(); ?>
	<div id="contenuto">
  <div id="container">
      <div id="content">
    
        <h1>
          <?php if( $wp_query->query_vars["technologies"] ) {

					$term = get_term_by('slug', $wp_query->query_vars["technologies"], 'portfolio_technologies');

					echo __('Categoria', 'portfolio').": ".( $term->name );

				}

				else {

					the_title(); 

				} ?>
        </h1>
     
        <?php global $wp_query;

				$paged = ( $wp_query->query_vars['paged'] ) ? $wp_query->query_vars['paged'] : 1;

				$technologies = ( $wp_query->query_vars["technologies"] ) ? $wp_query->query_vars["technologies"] : "";

				if( $technologies != "" ) {

					$args = array(

						'post_type'					=> 'portfolio',

						'post_status'				=> 'publish',

						'orderby'						=> 'menu_order',

						'caller_get_posts'  => 1,

						'posts_per_page'		=> get_option('posts_per_page'),

						'paged'							=> $paged,

						'tax_query' => array(

								array(

									'taxonomy' => 'portfolio_technologies',

									'field' => 'slug',

									'terms' => $technologies

								)

							)

						);

				}

				else {

					$args = array(

						'post_type'					=> 'portfolio',

						'post_status'				=> 'publish',

						'orderby'						=> 'menu_order',

						'caller_get_posts'  => 1,

						'posts_per_page'		=> get_option('posts_per_page'),

						'paged'							=> $paged

						);

				}



				query_posts( $args );

				

				while ( have_posts() ) : the_post(); ?>
        <div id="portfolio_content">
          <div class="entry">
            <?php global $post;

							$meta_values				= get_post_custom($post->ID);

							$post_thumbnail_id	= get_post_thumbnail_id( $post->ID );

							if( empty ( $post_thumbnail_id ) ) {

								$args = array(

									'post_parent' => $post->ID,

									'post_type' => 'attachment',

									'post_mime_type' => 'image',

									'numberposts' => 1

								);

								$attachments				= get_children( $args );

								$post_thumbnail_id	= key($attachments);

							}

							$image						= wp_get_attachment_image_src( $post_thumbnail_id, 'portfolio-thumb' );

							$image_alt				= get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );

							$image_desc 			= get_post($post_thumbnail_id);

							$image_desc				= $image_desc->post_content;

							if( get_option( 'prtfl_postmeta_update' ) == '1' ) {

								$post_meta		= get_post_meta( $post->ID, 'prtfl_information', true);

								$date_compl		= $post_meta['_prtfl_date_compl'];

								$date_compl		= explode( "/", $date_compl );

								$date_compl		= date( get_option( 'date_format' ), strtotime( $date_compl[1]."-".$date_compl[0].'-'.$date_compl[2] ) );

								$link					= $post_meta['_prtfl_link'];

								$short_descr	= $post_meta['_prtfl_short_descr'];
								
								$prezzo			= $post_meta['_prtfl_prezzo'];
								
							//	$altro			= $post_meta['_prtfl_altro'];
					

							}

							else{

								$date_compl		= get_post_meta( $post->ID, '_prtfl_date_compl', true );

								$date_compl		= explode( "/", $date_compl );

								$date_compl		= date( get_option( 'date_format' ), strtotime( $date_compl[1]."-".$date_compl[0].'-'.$date_compl[2] ) );

								$link					= get_post_meta($post->ID, '_prtfl_link', true);

								$short_descr	= get_post_meta($post->ID, '_prtfl_short_descr', true); 
								
								$prezzo	= get_post_meta($post->ID, '_prtfl_prezzo', true);
								
							//	$altro	= get_post_meta($post->ID, '_prtfl_altro', true);
								
								$price	= get_post_meta($post->ID, '_prtfl_price', true); 

							} ?>
            <div class="portfolio_thumb"> <a class="lightbox" href="<?php the_permalink(); ?>" title="<?php echo $image_desc; ?>"> <img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" alt="<?php echo $image_alt; ?>" /> </a> </div>
            <div id="portfolio_short_content">
              <div class="item_title">
                <p> <a class="titolo" href="<?php echo get_permalink(); ?>" ><?php echo get_the_title(); ?></a> </p>
              </div>
              <!-- .item_title -->
              
              <!--<p> <span class="lable">
                <?php //_e( 'Data di inserimento', 'portfolio' ); ?>
                :</span> <?php //echo $date_compl; ?> </p>-->
             
              <p><span class="lable">
                <?php _e( 'Descrizione', 'portfolio' ); ?>
                :</span> <?php echo $short_descr; ?></p>
               <p><span class="lable">
                <?php _e( 'Prezzo', 'portfolio' ); ?>
                :</span> <?php echo $prezzo; ?></p>
                
                
                 <?php $user_id = get_current_user_id();

								if ( $user_id == 0 ) { ?>
              <p><span class="lable">
                <?php _e( 'Contatti', 'portfolio' ); ?>
                :</span> <?php echo $link; ?></p>
              <?php }

								else if( parse_url( $link ) !== false ) { ?>
              <p><span class="lable">
                <?php _e( 'Contatti', 'portfolio' ); ?>
                :</span> <?php echo $link; ?></p>
              <?php } else { ?>
              <p><span class="lable">
                <?php _e( 'Contatti', 'portfolio' ); ?>
                :</span> <?php echo $link; ?></p>
              <?php } ?>
                
                 <!--<p><span class="lable">
                <?php //_e( 'Altro', 'portfolio' ); ?>
                :</span> <?php //echo $altro; ?></p>-->
            </div>
            <!-- .portfolio_short_content --> 
            
          </div>
          <!-- .entry -->
          
          <div class="entry_footer">
            <div class="read_more"> <a href="<?php the_permalink(); ?>" rel="bookmark">
              <?php _e( 'Dettagli', 'portfolio' ); ?>
              </a> </div>
            <!-- .read_more -->
            
            <?php $terms = wp_get_object_terms( $post->ID, 'portfolio_technologies' ) ;			

							if ( is_array( $terms ) && count( $terms ) > 0) { ?>
            <div class="portfolio_terms">
                      
              <?php _e( 'Categoria', 'portfolio' ); ?>
              : 
              <?php $count = 0;

								foreach ( $terms as $term ) {

									if( $count > 0 ) 

										echo ', '; 

									echo '<a href="'. get_term_link( $term->slug, 'portfolio_technologies') . '" title="' . sprintf( __( "Guarda tutti gli oggetti in %s" ), $term->name ) . '" ' . '>' . $term->name.'</a>';

									$count++;

								} ?>
            </div>
            <?php } ?>
          </div>
          
          
         
         
          <!-- .entry_footer --> 
          
        </div>
        <!-- .portfolio_content -->
        
        <?php endwhile; 

			$portfolio_options = get_option( 'prtfl_options' ); ?>
        <script type="text/javascript">

					var $j = jQuery.noConflict();

					$j(document).ready(function(){

						$j("a[rel^='lightbox']").prettyPhoto({theme: '<?php echo $portfolio_options["prtfl_prettyPhoto_style"]; ?>'});

					});

				</script> 
    </div>  <div class="clearall"></div>
 <!-- #content -->
      <div id="portfolio_pagenation"><?php prtfl_pagination(); ?></div>
        <div class="entry">
		
		<?php  
		$my_postid = 154;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo $content;
; ?>
        
        </div> 
      <div class="clearall"></div>
    </div><!-- #container --> 
     
  			</div><!-- #contenuto --> 
<div class="clearall"></div>
	</div><!-- #center --> 
<div id="partners"><a href="http://www.zooplus.it/shop/partner/zap143909"><img src="http://www.zooplus.it/affiliate/material/zap143909" alt="TUTTI GLI ANIMALI" width="468" height="60" border="0"/></a> <a href="http://laverabestia.org" target="_blank"><img src="http://laverabestia.org/images/banner/banneroriz.png" alt="Laverabestia.org - Animal Video Community" border="0" /></a></div>
<div class="clearall"></div>
<?php get_footer(); ?>
