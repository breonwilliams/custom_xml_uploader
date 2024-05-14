<?php
/**
 * Plugin Name: Custom XML Uploader
 * Description: A plugin to upload a WordPress XML file and remove the content of pages while keeping other elements intact, including the page hierarchy.
 * Version: 1.1
 * Author: Breon Williams
 * Author URI: https://breonwilliams.com
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add the custom admin menu
add_action('admin_menu', 'custom_xml_upload_menu');

function custom_xml_upload_menu() {
    add_menu_page('XML Upload', 'XML Upload', 'manage_options', 'xml-upload', 'custom_xml_upload_form');
}

// Display the form and handle the file upload
function custom_xml_upload_form() {
    ?>
    <div class="wrap">
        <h2>Upload XML File</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="xml_file" accept=".xml" required>
            <input type="submit" name="submit" class="button button-primary" value="Upload XML">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            handle_xml_upload();
        }
        ?>
    </div>
    <?php
}

// Handle the XML file upload
function handle_xml_upload() {
    if (isset($_FILES['xml_file']) && $_FILES['xml_file']['error'] == UPLOAD_ERR_OK) {
        $xml_file = $_FILES['xml_file']['tmp_name'];
        $xml = simplexml_load_file($xml_file);

        if ($xml === false) {
            echo '<div class="error"><p>Invalid XML file.</p></div>';
            return;
        }

        // Process the XML
        $modified_xml = process_xml($xml);

        // Save and provide download link
        $upload_dir = wp_upload_dir();
        $file_path = $upload_dir['path'] . '/modified_pages.xml';
        $modified_xml->asXML($file_path);

        echo '<div class="updated"><p><a href="' . $upload_dir['url'] . '/modified_pages.xml">Download Modified XML</a></p></div>';
    } else {
        echo '<div class="error"><p>File upload error.</p></div>';
    }
}

// Process the XML to remove page content
function process_xml($xml) {
    foreach ($xml->channel->item as $item) {
        if ($item->children('wp', true)->post_type == 'page') {
            $item->children('content', true)->encoded = ''; // Clear the content
        }
    }
    return $xml;
}
