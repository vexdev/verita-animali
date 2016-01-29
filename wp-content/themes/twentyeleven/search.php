<?php get_header(); ?>

<div id="center">

  <?php get_sidebar(); ?>

<div id="contenuto">
    <?php
        if (have_posts())
		{
		?>
    <p>Ho cercato per te: <strong>
    <?php the_search_query(); ?>
    </strong> <br />
    <br />
    La ricerca che hai richiesto ha prodotto i seguenti risultati:</p>
    <div class="entry">
      <ul>
        <?php while (have_posts()) : the_post(); ?>
        <li>
          <h3 id="post-<?php the_ID(); ?>" style="margin:0;"><a href="<?php the_permalink() ?>" rel="bookmark">
            <?php the_title(); ?>
            </a></h3>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <?php } else { ?>
    <h2 style="margin:100px 0; text-align:center;">Non ho trovato nulla... Tenta una nuova ricerca!</h2>
    <?php } ?>
  </div>

  <!-- END PAGINA -->
  <div class="clearall"></div>
</div>
<?php get_footer(); ?>
