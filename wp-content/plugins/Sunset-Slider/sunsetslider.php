<?php
/*
  Plugin Name: Sunset Slider
  Plugin URI: http://www.sunsetcoders.com/wordpress-plugins/SunsetSlider
  Description: 5 Image slider.
  Version: 1.0
  Author: Unknown
  Author URI: http://www.sunsetcoders.com/wordpress-plugins/SunsetSlider
 */

add_action( 'wp_enqueue_scripts', 'myplugin_scripts' );

function myplugin_scripts() {
    wp_register_style( 'sunsetslider',  plugin_dir_url( __FILE__ ) . 'sunsetslider.css' );
    wp_enqueue_style( 'sunsetslider' );
}


add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
    add_menu_page('Show-Slider', 'SunsetSlider', 'administrator', 'my-plugin-settings', 'showAdminArea', 'dashicons-admin-generic');
}

function showAdminArea() {

    global $wpdb;
    $x = 0;
    $upload_dir = wp_upload_dir();
    $result = $wpdb->get_results("SELECT * FROM wp_sunsetImageSlider ");

    echo '<br><table width=90% border=1 cellspacing=0 cellpadding=10>';
    echo '<tr><td bgcolor=blue><font color=white>Image</td><td bgcolor=blue></td></tr>';
    foreach ($result as $row) {

        echo '<tr><td><img src="' . $upload_dir['baseurl'] . '/' . $row->imageName . '" height=70></td><td>Values</td></tr>';
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

function uploadFile() {

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

add_shortcode( 'SunsetImage', 'sunsetImageSlider' );

function sunsetImageSlider() {

    $upload_dir = wp_upload_dir();

    global $wpdb;

    $result = $wpdb->get_results("SELECT * FROM wp_sunsetImageSlider ");
    ?>
    <div id="faderTable">
        <div id="slider">

            <?php
            foreach ($result as $row) {
                ?>
                <figure><img class="sliderImageSize" src="<?php echo $upload_dir['baseurl'] . '/' . $row->imageName; ?>" ></figure>
                <?php
            }
            ?>

        </div>
    </div>

    <?php
}
 /*#<img src="<?php header_image(); ?>" height="100%"  alt="" />