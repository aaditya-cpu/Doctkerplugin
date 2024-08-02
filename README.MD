WP Doctor Directory Plugin

This plugin allows you to import doctors from a CSV file, manage them as custom post types, and display them with search functionality.

Features:

    Creates a custom post type for "Doctors"
    Imports doctors from a CSV file
    Allows searching doctors by name, specialization, or keywords
    Displays doctors in a table with details like name, specialization, office address, available time, and contact details
    Provides a shortcode to display the doctor search form anywhere on your site
    Provides a shortcode to display a list of all doctors

Installation:

    Upload the entire plugin folder to your WordPress plugins directory.
    Activate the plugin from the WordPress admin panel.
    Create a new page and add the shortcode [doctor_search] to enable doctor search functionality.
    Create another page and add the shortcode [list_all_doctors] to display a list of all doctors.

CSV Import:

    Go to Doctors > Import CSV.
    Upload your CSV file containing doctor information.
    The CSV file should have headers like "First Name", "Last Name", "Specialization", "Office Address", "Available Time", and "Contact Details".
    Click "Import CSV" to import the doctors.

Theme Template:

The plugin includes a basic template for displaying a single doctor page (single-doctors.php). You can customize this template to match your theme's style.

Search Template:

The plugin uses a custom template (search-doctors.php) for displaying search results. You can customize this template to modify the search layout or add additional functionalities.

Requirements:

    WordPress 5.0 or later
    PHP 5.6 or later

Author:
Aaditya Uzumaki

Version:

2.0

License:

GPLv2 or later