<?php

/**
 * Plugin Name: Project Panorama Frontend Upload
 * Plugin URI: http://www.projectpanorama.com
 * Description: Let your clients and project managers upload files from the front end
 * Version: 1.0
 * Author: 37 MEDIA
 * Author URI: http://www.projectpanorama.com
 * License: GPL2
 * Text Domain: psp_projects
 */


    function psp_upload_localize_init() {
        load_plugin_textdomain('psp_projects', false, dirname(plugin_basename(__FILE__)) . '/lang');
    }

    add_action('plugins_loaded', 'psp_upload_localize_init');

    function psp_add_upload_field() {

        global $post;

        $project_access = get_field('restrict_access_to_specific_users');
        $panorama_access = panorama_check_access($post->ID);
        if(($panorama_access == 1) && ($project_access)) :

        ?>

    <p class="pano-add-file-btn"><a href="#pano-modal-upload" class="pano-modal-btn pano-btn pano-btn-primary"><?php _e('Add Document','psp_projects'); ?></a></p>

    <div class="pano-modal" id="pano-modal-upload">

        <h2><?php _e('Add Document','psp_projects'); ?></h2>

        <form id="pano-upload-form" action="?" method="post" class="form" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="<?php echo $post->ID; ?>">
            <?php wp_nonce_field( 'upload_attachment', 'my_image_upload_nonce' ); ?>
            <ol class="psp-upload-form">
                <li><label for="file-name"><?php _e('Title','psp_projects'); ?></label> <input type="text" name="file-name" value="" id="file-name" required></li>
                <li><label for="file-name"><?php _e('Description','psp_projects'); ?></label> <input type="text" name="file-description" value="" id="file-description"></li>
                <li><label for="file-type"><?php _e('File Type','psp_projects'); ?></label> <input type="radio" value="upload" name="file-type" id="file-type-upload" checked> <?php _e('Upload','psp_projects'); ?> &nbsp;&nbsp; <input type="radio" name="file-type" id="file-type-web" value="web"> <?php _e('Web Address','psp_projects'); ?></li>
                <li class="psp-web-address-field"><label for="file_url"><?php _e('Web Address','psp_projects'); ?></label> <input type="text" name="file_url" value="http://"></li>
                <li class="psp-upload-file-field"><label for="upload_attachment"><?php _e('Upload File','psp_projects'); ?></label> <input type="file" name="upload_attachment" class="files" size="50"  /></li>
            </ol>
            <p class="pano-modal-add-btn"><input type="submit" value="<?php _e('Add Document','psp_projects'); ?>" class="pano-btn pano-btn-primary"> <a href="#" class="modal_close"><?php _e('Cancel','psp_projects'); ?></a></p>
        </form>
    </div>

    <?php

            endif;

        }

    add_action('psp_after_documents','psp_add_upload_field',99);

    add_action('psp_head', 'psp_process_attach_file');
    function psp_process_attach_file() {

        if($_POST['post_id']) {

            // Check to see if someone has uploaded

            $post_id = $_POST['post_id'];
            $file_name = $_POST['file-name'];
            $file_desc = $_POST['file-description'];
            $field_key = 'field_52a9e4634b147';

            if ($_POST['file-type'] == 'upload') {
                if ($_POST['file-name']) {

                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    require_once(ABSPATH . 'wp-admin/includes/file.php');
                    require_once(ABSPATH . 'wp-admin/includes/media.php');


                    $attachment = $_FILES['upload_attachment'];

                    $files = $_FILES['upload_attachment'];
                    $newFiles = array();

                    $file = array(
                        'name' => $files['name'],
                        'type' => $files['type'],
                        'tmp_name' => $files['tmp_name'],
                        'error' => $files['error'],
                        'size' => $files['size']
                    );

                    $upload_overrides = array('test_form' => false);
                    $upload = wp_handle_upload($file, $upload_overrides);

                    // $filename should be the path to a file in the upload directory.
                    $filename = $upload['file'];

                    // The ID of the post this attachment is for.
                    $parent_post_id = $post_id;

                    // Check the type of tile. We'll use this as the 'post_mime_type'.
                    $filetype = wp_check_filetype(basename($filename), null);

                    // Get the path to the upload directory.
                    $wp_upload_dir = wp_upload_dir();

                    // Prepare an array of post data for the attachment.
                    $attachment = array(
                        'guid' => $wp_upload_dir['url'] . '/' . basename($filename),
                        'post_mime_type' => $filetype['type'],
                        'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );

                    // Insert the attachment.
                    $attach_id = wp_insert_attachment($attachment, $filename, $parent_post_id);

                    // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
                    require_once(ABSPATH . 'wp-admin/includes/image.php');

                    // Generate the metadata for the attachment, and update the database record.
                    $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
                    wp_update_attachment_metadata($attach_id, $attach_data);

                    $file_url = NULL;

                }

            } else {

                $attach_id = NULL;
                $file_url = $_POST['file_url'];

            }

            $value = get_field($field_key, $post_id);
            $value[] = array(
                'title' => $file_name,
                'description' => $file_desc,
                'status' => 'In Review',
                'file' => $attach_id,
                'url' => $file_url
            );

            update_field($field_key, $value, $post_id);

        }
    }

    function psp_attach_uploads($uploads,$post_id = 0){
    $files = rearrange($uploads);
        if($files[0]['name']==''){
            return false;
        }
        foreach($files as $file){
            $upload_file = wp_handle_upload( $file, array('test_form' => false) );
            $attachment = array(
                'post_mime_type' => $upload_file['type'],
                'post_title' => preg_replace('/\.[^.]+$/', '', basename($upload_file['file'])),
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment( $attachment, $upload_file['file'], $post_id );
            $attach_array[] = $attach_id;
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata( $attach_id, $upload_file['file'] );
            wp_update_attachment_metadata( $attach_id, $attach_data );
        }
        return $attach_array;
    }

    add_action('psp_head','panorama_add_assets');

    function panorama_add_assets() { ?>
        <link rel="stylesheet" type="text/css" href="<?php echo plugins_url(); ?>/panorama-file-upload/assets/css/pano-upload.css">
        <script src="<?php echo plugins_url(); ?>/panorama-file-upload/assets/js/jquery.validation.min.js"></script>
        <script src="<?php echo plugins_url(); ?>/panorama-file-upload/assets/js/pano-upload.js"></script>
    <?php
    }