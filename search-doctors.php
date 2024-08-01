<?php
/**
 * Template for displaying doctor search results.
 */
get_header();
?>

<style>
:root {
    --red-pantone: #e63946ff;
    --honeydew: #f1faeeff;
    --non-photo-blue: #a8dadcff;
    --cerulean: #457b9dff;
    --berkeley-blue: #1d3557ff;
}

#searchtablemain {
    width: 100%;
    background: linear-gradient(90deg, #FF5D5D, #E78448) !important;
}

</style>

<div id="searchtablemain" class="content-area table-bg">
  <main id="searchtable" class="site-main">
    <h1>Your Search Results</h1>

<?php

// Get the search term
$search_term = sanitize_text_field($_GET['doctor_search']);

// Query for doctors
$args = array(
    'post_type' => 'doctors',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'first_name',
            'value' => $search_term,
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'last_name',
            'value' => $search_term,
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'specialization',
            'value' => $search_term,
            'compare' => 'LIKE'
        ),
    ),
);

$query = new WP_Query($args);

// Output the results
if ($query->have_posts()) {
    echo '<div class="searchholder" style="display: flex; justify-content: center; align-items: center; height: auto;">
  <table id="search-results" class="table table-hover table-striped search-table" style="color: var(--honeydew); border-radius: 10px; margin: auto;">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Specialization</th>
        <th scope="col">Office Address</th>
        <th scope="col">Available Time</th>
        <th scope="col">Contact Details</th>
      </tr>
    </thead>
    <tbody>';


    while ($query->have_posts()) {
        $query->the_post();

        // Get post meta
        $specialization = get_post_meta(get_the_ID(), 'specialization', true);
        $office_address = get_post_meta(get_the_ID(), 'office_address', true);
        $available_time = get_post_meta(get_the_ID(), 'available_time', true);
        $contact_details = get_post_meta(get_the_ID(), 'contact_details', true);

        echo '<tr>
                <td><a href="' . get_permalink() . '" style="color: var(--red-pantone);">' . get_the_title() . '</a></td>
                <td>' . $specialization . '</td>
                <td>' . $office_address . '</td>
                <td>' . $available_time . '</td>
                <td>' . $contact_details . '</td>
              </tr>';
    }
    echo '</tbody></table></div>';
} else {
    echo 'No doctors found.';
}

wp_reset_postdata();

echo '</main></div>';

get_sidebar();
get_footer();
?>

<?php
function custom_page_title($title) {
    if (isset($_GET['doctor_search'])) {
        $title = 'Your Search Results';
    }
    return $title;
}
add_filter('wp_title', 'custom_page_title');
?>
