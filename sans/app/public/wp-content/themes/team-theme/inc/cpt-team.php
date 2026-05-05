<?php
function create_team_post_type() {
   register_post_type('team',
       array(
           'labels' => array(
               'name' => 'Team',
               'singular_name' => 'Team Member',
               'add_new' => 'Add New Member',
               'add_new_item' => 'Add New Team Member',
               'edit_item' => 'Edit Team Member',
               'new_item' => 'New Team Member',
               'view_item' => 'View Team Member',
               'search_items' => 'Search Team Members',
               'not_found' => 'No Team Members found',
           ),
           'public' => true,
           'has_archive' => true,
           'menu_icon' => 'dashicons-groups',
           'supports' => array('title', 'editor', 'thumbnail'),
       )
   );
}
add_action('init', 'create_team_post_type');