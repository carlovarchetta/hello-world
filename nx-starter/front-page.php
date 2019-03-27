<?php get_header(); ?>
<div class="main-content">


    <!-- Slider -->
    <section id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

        <?php

        $nx_counter = 0;

        // La Query
        $nx_the_query = new WP_Query( 'category_name=in-evidenza&posts_per_page=3' );

        // Il Loop
        while ( $nx_the_query->have_posts() ) :
        	$nx_the_query->the_post(); ?>


          <?php $nx_counter++; ?>

            <?php $nx_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'nx_big');?>

            <div class="carousel-item <?php if($nx_counter == 1){ echo 'active'; } ?>" style="background: linear-gradient(rgba(0,0,0, 0.3), rgba(0,0,0, 0.7)), url(<?php echo $nx_image_attributes[0]; ?>); background-size: cover; background-position: center center">
              <div class="carousel-caption">
                <h3 class="display-3"><?php the_title(); ?></h3>
                <p> <?php the_time('j M Y'); ?> - <?php the_category(', ');?></p>
                <div class="lead d-none d-lg-block">  <?php the_excerpt(); ?> </div>
              </div>
            </div>



        <?php endwhile;

        // Ripristina Query & Post Data originali
        wp_reset_query();
        wp_reset_postdata(); ?>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </section>



    <?php

    /* 2 Column Section
    -------------------------------------------*/

    // La Query
    $nx_the_query = new WP_Query( 'page_id=69' );

    // Il Loop
    while ( $nx_the_query->have_posts() ) :
      $nx_the_query->the_post(); ?>

        <!-- 2 column -->
        <section class="container">
          <div class="row mt-5">
            <div class="col-sm-6">
              <blockquote class="blockquote">
                <p class="mr-5 h2">  <?php the_title(); ?></p>
                <footer class="blockquote-footer"><?php esc_html_e('Author: ', 'nx')?> <cite title="Source Title"><?php the_author(); ?> </cite></footer>
              </blockquote>
            </div>
            <div class="col-sm-6">
              <?php the_excerpt(); ?>
            </div>
          </div>
        </section>

    <?php endwhile;

    // Ripristina Query & Post Data originali
    wp_reset_query();
    wp_reset_postdata(); ?>





  <!-- card -->
  <section class="container">
    <div class="card-deck mt-5">

      <?php

      /* Card Section
      -------------------------------------------*/

      // La Query
      $nx_the_query = new WP_Query( 'category_name=focus&posts_per_page=3' );

      // Il Loop
      while ( $nx_the_query->have_posts() ) :
        $nx_the_query->the_post(); ?>

        <div class="card">

          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('nx_single', array( 'class' => 'img-fluid mb-2', 'alt' => get_the_title() ))?>
          </a>

          <div class="card-body">
            <h4 class="card-title">  <?php the_title(); ?></h4>
            <div class="card-text"> <?php the_excerpt(); ?> </div>
            <p class="card-text"><small class="text-muted"> <?php the_time('j M Y'); ?> - <?php the_category(', ');?></small></p>
          </div>
        </div>

      <?php endwhile;

      // Ripristina Query & Post Data originali
      wp_reset_query();
      wp_reset_postdata(); ?>

    </div>
  </section>




  <?php

  /* Panel Jumbtron
  -------------------------------------------*/

  // La Query
  $nx_the_query = new WP_Query( 'page_id=79' );

  // Il Loop
  while ( $nx_the_query->have_posts() ) :
    $nx_the_query->the_post(); ?>


    <?php $nx_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'nx_big');?>

    <section class="jumbotron jumbotron-fluid mt-5 text-white" style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.7)), url(  <?php echo $nx_image_attributes[0]; ?>); background-size: cover; background-position: center center">
      <div class="container">
        <h1 class="display-3">  <?php the_title(); ?></h1>
        <div class="lead"><?php the_excerpt(); ?></div>
        <p> <?php esc_html_e('Author: ', 'nx')?>  <?php the_author(); ?></p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="<?php the_permalink();?>" role="button"><?php esc_html_e('Read more...','nx'); ?></a>
        </p>
      </div>
    </section>

  <?php endwhile;

  // Ripristina Query & Post Data originali
  wp_reset_query();
  wp_reset_postdata(); ?>






</div>




<?php get_footer(); ?>
