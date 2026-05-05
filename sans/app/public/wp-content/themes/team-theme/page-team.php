<?php
/*
Template Name: Team Page
*/


get_header();
?>
<div class="team-page-wrapper">
 <h1 class="team-title">Our Team</h1>


 <!-- TABS -->
 <div class="tabs">
   <?php
   $terms = get_terms([
     'taxonomy' => 'department',
     'hide_empty' => true,
   ]);


   if (!empty($terms) && !is_wp_error($terms)) {


     foreach ($terms as $index => $term) {


       $active = $index === 0 ? 'active' : '';


       echo '<button class="tab-btn ' . $active . '" data-term="' . $term->slug . '">'
             . $term->name .
            '</button>';
     }
   }
   ?>
 </div>


 <!-- TEAM MEMBERS -->
 <div class="team-container">
   <?php
   if (!empty($terms) && !is_wp_error($terms)) {
     foreach ($terms as $index => $term) {
       $display = $index === 0 ? 'block' : 'none';
       $args = [
         'post_type' => 'team',
         'posts_per_page' => -1,
         'tax_query' => [
           [
             'taxonomy' => 'department',
             'field' => 'slug',
             'terms' => $term->slug
           ]
         ]
       ];


       $query = new WP_Query($args);


       echo '<div class="team-group" id="' . $term->slug . '" style="display:' . $display . ';">';
       echo '<h2 class="dept-title">' . $term->name . '</h2>';
       echo '<div class="grid">';


       if ($query->have_posts()) {
         while ($query->have_posts()) {
           $query->the_post();
           $position = get_post_meta(get_the_ID(), '_position', true);
           $experience = get_post_meta(get_the_ID(), '_experience', true);
           $address = get_post_meta(get_the_ID(), '_address', true);
           $contact = get_post_meta(get_the_ID(), '_contact', true);
           ?>


           <div class="card">
             <h3><?php the_title(); ?></h3>
             <p class="role"><?php echo esc_html($position); ?></p>
             <p>Experience: <?php echo esc_html($experience); ?></p>
             <p><?php echo esc_html($address); ?></p>
             <p><?php echo esc_html($contact); ?></p>
           </div>


           <?php
         }


       } else {
         echo '<p>No team members found.</p>';
       }
       echo '</div></div>';
       wp_reset_postdata();
     }
   }
   ?>
 </div>
</div>
<?php get_footer(); ?>
