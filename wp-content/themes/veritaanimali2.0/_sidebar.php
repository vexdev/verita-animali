<div id="sidebar">
  <ul id="pagenav">
   <?php  login_with_ajax(); ?><?php

	// determino il numero delle eventuali pagine padre della pagina corrente
	$antenati = sizeof($post->ancestors);
	
	// determino il padre pi� anziano (super-padre) della pagina
	$padre = ($antenati) ? $post->ancestors[$antenati-1] : $post->ID;
	
	// estraggo le pagine di primo livello
	$pagineTOP = wp_list_pages('title_li=&depth=1&echo=0');
	// genero un array con ogni singola pagina
	$pagineTOP = ($pagineTOP!='') ? explode('</li>', $pagineTOP) : array();
	
	// estraggo tutte le eventuali sotto-pagine
	$pagineSUB = wp_list_pages("title_li=&child_of=".$padre."&echo=0");
	
	// stampo la struttura facendo in modo che venga espanso il ramo sul quale � posizionata la pagina corrente
	foreach($pagineTOP as $k=>$v)
	{
		if (trim($v)=='') continue;
		
		echo $v;
		
		if (!empty($pagineSUB))
		{
			if ( strpos($v, 'page-item-'.$padre.'"')!==FALSE || strpos($v, 'page-item-'.$padre.' ')!==FALSE )
			{
				echo '<ul>'.$pagineSUB.'</ul>';
			}
		}
		
		echo '</li>';
	}
	
	
	?>

    

<span style="font-family:Tahoma, Times, serif; color:#000; font-weight:bold; font-size:12px; margin:35px 0 5px 4px; line-height:52px;">Condividi su</span>
  
  
  
  
  
  
  
  
  <!-- AddThis Button BEGIN QUESTO E' IL BOTTONE WEETTER -->
<div class="addthis_toolbox addthis_default_style" style="margin-top:-35px;margin-left:85px;">

    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>

</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f4ceab8678c4653"></script>
<!-- AddThis Button END -->
 
  
  </ul>
  
  <div class="fb-like-box" data-href="http://www.facebook.com/pages/Verit%C3%A0-Animali/300688509950793" data-width="200" data-show-faces="true" data-stream="false" data-header="false" border-color="#c1b165"></div>
  
  
<?php //dynamic_sidebar( 'sidebar-1' ); ?> 

<? //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Get Post List With Thumbnails')) : endif; ?></div>  

 