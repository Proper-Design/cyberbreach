<?php
/**
 * Template Name: Styleguide
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
 get_header(); ?>

 <div class="site-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<main <?php post_class(); ?> id="page-<?php the_ID(); ?>">
			<?php the_title('<h1>', '</h1>'); ?>
      <?php the_content(); ?>
      

      <section class="sg-logo">
        <h2>Logo</h2>
        <img class="sg-logo-image" src="<?=get_field('sg_logo')['url']; ?>" alt="">
      </section>
      
      <section class="sg-colors">
        <h2>Colours</h2>
        <div class="sg-color-1"></div>
        <div class="sg-color-2"></div>
        <div class="sg-color-3"></div>
        <div class="sg-color-4"></div>
        <div class="sg-color-5"></div>
      </section>

      <section class="sg-accents">
      <?php if(have_rows('sg_accents')): while(have_rows('sg_accents')): the_row(); ?>
        <img class="sg-accent" src="<?=get_sub_field('sg_accent')['url']; ?>">
      <?php endwhile; endif; ?>
      </section>

      <section class="sg-words">
      <?php if(have_rows('sg_words')): while(have_rows('sg_words')): the_row(); ?>
        <span class="sg-word"><?=get_sub_field('sg_word'); ?></span>
      <?php endwhile; endif; ?>
      </section>

      <?php wp_link_pages(array('before' => __('Pages: ','properbear'), 'next_or_number' => 'number')); ?>
			<?php edit_post_link(__('Edit this entry','properbear'), '<p>', '</p>'); ?>
		</main>

		<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>