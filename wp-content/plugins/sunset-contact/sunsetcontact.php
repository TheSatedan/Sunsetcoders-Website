
<?php
/*
  Plugin Name: Sunset Contact Form
  Plugin URI: http://www.sunsetcoders.com/wordpress-plugins/SunsetForm
  Description: Simple Contact Form
  Version: 1.0
  Author: Sunsetcoders Development Team
  Author URI: http://www.sunsetcoders.com/wordpress-plugins/SunsetForm
 */


add_action('wp_enqueue_scripts', 'sunsetform_scripts');

function sunsetform_scripts() {
    wp_register_style('sunsetcontact', plugin_dir_url(__FILE__) . 'sunsetcontact.css');
    wp_enqueue_style('sunsetcontact');
}

add_action('admin_menu', 'form_menu');

function form_menu() {
    add_menu_page('Sunset Contact Form', 'sunsetContact', 'administrator', 'sunset-contact-form', 'showContactForm', 'dashicons-admin-generic');
}

#Plugin First Screen for Wordpress Administrator

function showContactForm() {
 
    echo 'This is where the admin page is';
}

#Adding shortCode to add to pages to view the form.
add_shortcode('SunsetForm', 'showSunsetForm');

#Form Display

function showSunsetForm() {
    ?>
   <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" /> 

        <div class="body-content">
            <form method="POST" action="<?php uploadSunsetForm(); ?>" enctype="multipart/form-data">
            <table class="sunset-contact-box" >
                <tr><td colspan="4" class="contact-header">Request A Free Quote</td></tr>
                <tr><td colspan="4" class="contact-subheader"><p style="font-size:18px; color: #ff7e00">Fill in the details below,<span style="font-size:18px; color: #000"> and we will contact you shortly.</span></td></tr>
                <input type="hidden" name="post_id" id="post_id" value="55" />
                <tr><td><input type="text" name="yourName" style="width: 100%;" placeholder="YOUR NAME *"></td>
                    <td><input type="text" name="yourEmail" style="width: 100%;" placeholder="YOUR EMAIL *"></td>
                    <td><input type="text" name="yourPhone" style="width: 100%;" placeholder="YOUR PHONE NUMBER *"></td>
                    <td><input type="text" name="yourCompany" style="width: 100%;" placeholder="YOUR COMPANY NAME"></td></tr>
                <tr><td colspan="4"><textarea name="comments" rows="6" placeholder="YOUR MESSAGE"></textarea> </td></tr>
                <tr><td colspan="4"><center><input type="submit" name="submit" value="SEND" ></center></td></tr>
            </table>
                </form>
        </div>


    <?php
}

/**
 *
 */

function uploadSunsetForm()
{
    global $wpdb;
    
    $table = 'wp_sunset_mail';


    $data = array('mailName' => filter_input(INPUT_POST, "yourName"),
        'mailEmail' => filter_input(INPUT_POST, "yourEmail"),
        'mailPhone' => filter_input(INPUT_POST, "yourPhone"),
        'mailCompany' => filter_input(INPUT_POST, "yourCompany"),
        'mailBody' => filter_input(INPUT_POST, "comments")
        );

    $format = array('%s', '%s', '%s', '%s', '%s');

    $setPostID = filter_input(INPUT_POST, 'post_id');

    if ($setPostID) {
        $wpdb->insert($table, $data, $format);
    }


}
