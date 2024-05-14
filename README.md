# Custom XML Uploader

**Custom XML Uploader** is a WordPress plugin that allows you to upload a WordPress XML file and remove the content of pages while keeping other elements intact, including the page hierarchy.

## Description

This plugin provides a simple interface in the WordPress admin area to upload an XML file. It processes the XML file to clear the content of all pages while retaining their structure, metadata, and parent-child relationships. The modified XML file can then be downloaded for use in importing to another WordPress site.

## Features

- Upload a WordPress XML file.
- Remove content from all pages.
- Retain page structure, metadata, and parent-child relationships.
- Download the modified XML file.

## Installation

1. Download the plugin files and create a folder named `custom-xml-uploader` in the `wp-content/plugins` directory.
2. Upload the plugin files to the `custom-xml-uploader` folder.
3. Compress the `custom-xml-uploader` folder into a `.zip` file.
4. Go to the WordPress admin area and navigate to `Plugins` > `Add New`.
5. Click on `Upload Plugin` and select the `.zip` file you created.
6. Click `Install Now` and then `Activate`.

## Usage

1. After activation, a new menu item called `XML Upload` will appear in the WordPress admin menu.
2. Click on `XML Upload` to access the upload form.
3. Use the form to upload your WordPress XML file.
4. The plugin will process the file and remove the content from all pages while retaining other elements.
5. After processing, a download link for the modified XML file will be provided.

## Changelog

### 1.1
- Ensured that page hierarchy is maintained in the modified XML file.

### 1.0
- Initial release.

## Author

Breon Williams  
https://breonwilliams.com

## License

This plugin is licensed under the GPLv2 or later.
