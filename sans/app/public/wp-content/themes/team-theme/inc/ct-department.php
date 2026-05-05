<?php
function create_department_taxonomy() {
   register_taxonomy(
       'department',
       'team',
       array(
           'labels' => array(
               'name' => 'Departments',
               'singular_name' => 'Department',
               'search_items' => 'Search Departments',
               'all_items' => 'All Departments',
               'edit_item' => 'Edit Department',
               'update_item' => 'Update Department',
               'add_new_item' => 'Add New Department',
               'new_item_name' => 'New Department Name',
               'menu_name' => 'Departments',
           ),
           'hierarchical' => true, // like categories
           'public' => true,
           'show_admin_column' => true,
       )
   );
}
add_action('init', 'create_department_taxonomy');

function add_team_metabox() {
   add_meta_box(
       'team_details',
       'Team Details',
       'team_metabox_callback',
       'team',
       'normal',
       'high'
   );
}
add_action('add_meta_boxes', 'add_team_metabox');

function team_metabox_callback($post) {
   $position = get_post_meta($post->ID, '_position', true);
   $experience = get_post_meta($post->ID, '_experience', true);
   $address = get_post_meta($post->ID, '_address', true);
   $contact = get_post_meta($post->ID, '_contact', true);
   ?>
   <label>Position:</label><br>
   <input type="text" name="position" value="<?php echo esc_attr($position); ?>" style="width:100%;"><br><br>
   <label>Years of Experience:</label><br>
   <input type="text" name="experience" value="<?php echo esc_attr($experience); ?>" style="width:100%;"><br><br>
   <label>Address:</label><br>
   <input type="text" name="address" value="<?php echo esc_attr($address); ?>" style="width:100%;"><br><br>
   <label>Contact Number:</label><br>
   <input type="text" name="contact" value="<?php echo esc_attr($contact); ?>" style="width:100%;"><br><br>
   <?php
}

function save_team_metabox_data($post_id) {
   if (array_key_exists('position', $_POST)) {
       update_post_meta($post_id, '_position', $_POST['position']);
   }
   if (array_key_exists('experience', $_POST)) {
       update_post_meta($post_id, '_experience', $_POST['experience']);
   }
   if (array_key_exists('address', $_POST)) {
       update_post_meta($post_id, '_address', $_POST['address']);
   }
   if (array_key_exists('contact', $_POST)) {
       update_post_meta($post_id, '_contact', $_POST['contact']);
   }
}
add_action('save_post', 'save_team_metabox_data');
