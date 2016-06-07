<?php
/*
  Plugin Name: Sunset Services
  Plugin URI: http://www.sunsetcoders.com/wordpress-plugins/SunsetServices
  Description: Company Services Display.
  Version: 1.0
  Author: Sunsetcoders
  Author URI: http://www.sunsetcoders.com/wordpress-plugins/SunsetServices
 */


add_action('wp_enqueue_scripts', 'services_register');

function services_register() {
    wp_register_style('sunset-services', plugin_dir_url(__FILE__) . 'sunset-services.css');
    wp_enqueue_style('sunset-services');
}

add_action('admin_menu', 'services_register_menu');

function services_register_menu() {
    add_menu_page('Show-Services', 'SunsetServices', 'administrator', 'my-services-settings', 'showServicesArea', 'dashicons-admin-generic');
}

function showServicesArea() {

    global $wpdb;
    $x = 0;

    $result = $wpdb->get_results("SELECT * FROM wp_company_services ");

    echo '<br><table width=90% border=1 cellspacing=0 cellpadding=10>';
    echo '<tr><td valign=top width=60%>';

    echo '<table width=100% border=1>';
    echo '<tr><td bgcolor=blue colspan=2><font color=white>Slider Images</td></tr>';
    foreach ($result as $row) {

        echo '<tr><td>' . $row->serviceName . '</td><td>EDIT DELETE </td></tr>';
        $x++;
    }
    echo '</table>';
    if ($x < 5) {
        ?>    
        <form id="featured_upload" method="post" action="<?php uploadFile(); ?>" enctype="multipart/form-data">
            <input type="file" name="file" id="my_image_upload"  multiple="false" />
            <input type="hidden" name="post_id" id="post_id" value="55" />
            <input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" />
        </form>
        <?php
    }
}

function uploadServiceImage() {

    global $wpdb;

    $setPostID = filter_input(INPUT_POST, 'post_id');

    if (!function_exists('wp_handle_upload')) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

    if ($setPostID) {
        $uploadedfile = $_FILES['file'];

        $upload_overrides = array('test_form' => false);

        $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

        $tempValue = explode('uploads/', $movefile[url]);
        $getFileName = $tempValue[1];

        if ($movefile && !isset($movefile['error'])) {
            echo "File is valid, and was successfully uploaded.\n";

            $table = 'wp_sunsetImageSlider';
            $data = array(
                'sliderName' => 'ImageSlider',
                'imageName' => $getFileName,
                'imageHyperlink' => "NoIdea.com"
            );
            if ($wpdb->insert($table, $data, $format)) :
                echo '<meta http-equiv="refresh" content="0;url=' . showAdminArea() . '">';
            endif;
        } else {
            /**
             * Error generated by _wp_handle_upload()
             * @see _wp_handle_upload() in wp-admin/includes/file.php
             */
            echo $movefile['error'];
            $charset_collate = $wpdb->get_charset_collate();
            $table_name = $wpdb->prefix . "liveshoutbox";

            $sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  name tinytext NOT NULL,
  text text NOT NULL,
  url varchar(55) DEFAULT '' NOT NULL,
  UNIQUE KEY id (id)
) $charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
    }
}

add_shortcode('SunsetServices', 'sunsetCompanyServices');

function sunsetCompanyServices() {

    global $wpdb;

    $result = $wpdb->get_results("SELECT * FROM wp_company_services");
    ?>
    <div id="ServiceBox">
        <div class="body-content">

    <?php
    foreach ($result as $row) {
        ?>
                <div class="serviceCell" onclick="window.open('index.php/<?php echo $row->serviceHyperlink; ?>','_self',false);"><?php echo '<img src="wp-content/uploads/2016/06/' . $row->serviceImage . '" width=150 height=150><br><br>' . $row->serviceName . '</center><br>' . $row->serviceDescription; ?></div>
                <?php
            }
            ?>

        </div>
    </div>

    <?php
}